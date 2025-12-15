<?php
namespace AmazonApi\Infrastructure\SpApi\Shared;

use AmazonApi\Shared\Envloader;
use Dotenv\Dotenv;
use InvalidArgumentException;
use RuntimeException;
use Throwable;
use Exception;
use HttpClient\Infrastructure\Enum\ContentType;
use HttpClient\Infrastructure\Enum\RequestType;
use HttpClient\Infrastructure\HttpClient;
use HttpClient\Infrastructure\ValueObject\HttpParams;

class SpApiClient
{
    private static ?string $accessToken = null; // アクセストークンをシングルトンとして管理

    // 環境変数を static プロパティにする
    private static string $refreshToken;
    private static string $clientID;
    private static string $clientSecret;
    private const AMAZON_REFRESH_TOKEN_ENV_KEY = "AMAZON_REFRESH_TOKEN";
    private const AMAZON_CLIENT_ID_ENV_KEY = "AMAZON_CLIENT_ID";
    private const AMAZON_CLIENT_SECRET_ENV_KEY = "AMAZON_CLIENT_SECRET";
    private const AMAZON_JP_ENDPOINT = "https://sellingpartnerapi-fe.amazon.com";

    private static HttpClient $httpClient;

    public function __construct(?HttpClient $httpClient = null)
    {
        // static プロパティに環境変数を設定
        self::$refreshToken = Envloader::getEnv(self::AMAZON_REFRESH_TOKEN_ENV_KEY);
        self::$clientID = EnvLoader::getEnv(self::AMAZON_CLIENT_ID_ENV_KEY);
        self::$clientSecret = EnvLoader::getEnv(self::AMAZON_CLIENT_SECRET_ENV_KEY);
        self::$httpClient ??= new HttpClient();
    }

    /**
     * APIリクエストを送信する（429 の場合は指数バックオフ, 403 の場合はトークン再取得）
     */
    public function request(string $uri, array|HttpParams $params, bool $isPost = false): array
    {
        $uri = self::AMAZON_JP_ENDPOINT.$uri;
        $attempt = 0;  // 試行回数
        $token = self::getAccessToken(); // シングルトンのアクセストークンを取得
        $headers = [
            "Content-Type: application/json",
            "x-amz-access-token: $token"
        ];

        while ($attempt < 10) {
            try {
                // HTTPリクエスト送信
                $response = $isPost
                    ? self::$httpClient->request(RequestType::POST,$uri,   $params,ContentType::JSON,$headers)
                    : self::$httpClient->request(RequestType::GET,$uri,   $params,ContentType::JSON,$headers);

                $httpStatus = $response->code();

                // 429: 頻度制限エラー → 再試行
                if ($httpStatus === 429) {
                    $waitTime = min(pow(2, $attempt), 20); // min(2^(n-1), 20) 秒待機
                    sleep($waitTime);
                    print("接続待機中......".PHP_EOL);
                    $attempt++;
                    continue; // 再試行
                }

                // 403: アクセストークンを更新してリトライ
                if ($httpStatus === 403) {
                    self::$accessToken = null; // キャッシュを破棄
                    $token = self::getAccessToken(); // 新しいトークンを取得
                    $headers[1] = "x-amz-access-token: $token"; // トークンをヘッダーに反映
                    $attempt++;
                    continue; // 再試行
                }

                // HTTP ステータスコードのチェック
                if ($httpStatus < 200 || $httpStatus >= 300) {
                    $detail = json_encode($response->body(), JSON_UNESCAPED_UNICODE);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        $errMsg = json_last_error_msg();
                        $detail = "(JSON encode error: {$errMsg})";
                    }
                    throw new Exception(
                        "HTTPエラー: {$httpStatus} detail: {$detail}",
                    );
                }

                return $response->json(); // 正常レスポンス
            } catch (Throwable $e) {
                throw new Exception("リクエストの送信時にエラーが発生しました。\n detail: {$e->getMessage()}",$e->getCode(),$e);
            }
        }

        // 10回試行しても成功しなかった場合は例外をスロー
        throw new Exception(
            "最大リトライ回数に達しました。".json_encode($response)
        );
    }


    /**
     * アクセストークンを取得（シングルトン）
     */
    private static function getAccessToken(): string
    {
        if (self::$accessToken !== null) {
            return self::$accessToken; // 既存のトークンを使用
        }

        $params = [
            "grant_type" => "refresh_token",
            "refresh_token" => self::$refreshToken,
            "client_id" => self::$clientID,
            "client_secret" => self::$clientSecret,
        ];

        try {
            // HTTPリクエスト送信
            $response = self::$httpClient->request(
                RequestType::POST,
                "https://api.amazon.com/auth/o2/token",
                $params,
                ContentType::JSON,
            );

            // HTTP ステータスコードのチェック
            if ($response->code() !== 200) {
                throw new Exception(
                    "アクセストークン取得失敗。HTTPコード: {$response->code()},レスポンス{$response->body()}",
                );
            }

            // 必須キーの検証
            if (!isset($response->json()['access_token'])) {
                throw new Exception(
                    "APIレスポンスに 'access_token' がありません。レスポンス:{$response->body()}"
                );
            }

            self::$accessToken = $response->json()['access_token']; // キャッシュに保存
            return self::$accessToken;
        } catch (Throwable $e) {
            throw new Exception("アクセストークンの取得中にエラーが発生しました。detail: {$e->getMessage()}",$e->getCode(),$e); // ✅ staticメソッドとして呼び出し
        }
    }

}


// if(basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])){
// }
