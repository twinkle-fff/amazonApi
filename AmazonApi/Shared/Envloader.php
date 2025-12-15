<?php
namespace AmazonApi\Shared;

use Dotenv\Dotenv;
use Exception;
use Throwable;

/**
 * 環境変数（.env）を読み込み、値を取得するユーティリティクラス
 *
 * - dotenv を用いて環境変数をロードする
 * - env ファイルパス・ファイル名が変わった場合は再ロードする
 */
class Envloader
{
    /**
     * デフォルトの env ファイル名
     */
    private const DEFAULT_ENV_FILE_NAME = '.env.local';

    /**
     * 現在ロードされている env ファイルのパス
     */
    private static string $envFilePath;

    /**
     * 現在ロードされている env ファイル名
     */
    private static string $envFileName;

    /**
     * Dotenv インスタンス
     */
    private static Dotenv $dotenv;

    /**
     * 環境変数を取得する
     *
     * @param string      $key         取得したい環境変数キー
     * @param string|null $envFilePath env ファイルの配置ディレクトリ（省略時は getcwd()）
     * @param string|null $envFileName env ファイル名（省略時は DEFAULT_ENV_FILE_NAME）
     *
     * @return string
     *
     * @throws Exception 指定したキーが存在しない場合
     */
    public static function getEnv(
        string $key,
        ?string $envFilePath = null,
        ?string $envFileName = null
    ): string {
        self::loadEnv($envFilePath, $envFileName);

        $value = $_ENV[$key] ?? ($_SERVER[$key] ?? null);

        if ($value === null) {
            throw new Exception(
                sprintf(
                    'Environment variable "%s" is not defined (path=%s, file=%s)',
                    $key,
                    self::$envFilePath,
                    self::$envFileName
                )
            );
        }

        return $value;
    }

    /**
     * env ファイルをロードする
     *
     * @param string|null $envFilePath env ファイルの配置ディレクトリ
     * @param string|null $envFileName env ファイル名
     *
     * @return void
     *
     * @throws Exception env ファイルのロードに失敗した場合
     */
    private static function loadEnv(
        ?string $envFilePath,
        ?string $envFileName
    ): void {
        $envFilePath ??= getcwd();
        $envFileName ??= self::DEFAULT_ENV_FILE_NAME;

        // 初回 or パス / ファイル名が変わった場合のみ再ロード
        if (
            !isset(self::$dotenv)
            || self::$envFilePath !== $envFilePath
            || self::$envFileName !== $envFileName
        ) {
            self::$envFilePath = $envFilePath;
            self::$envFileName = $envFileName;

            try {
                self::$dotenv = Dotenv::createImmutable(
                    self::$envFilePath,
                    self::$envFileName
                );
                self::$dotenv->load();
            } catch (Throwable $e) {
                throw new Exception(
                    sprintf(
                        'Failed to load env file (path=%s, file=%s): %s',
                        self::$envFilePath,
                        self::$envFileName,
                        $e->getMessage()
                    ),
                    0,
                    $e
                );
            }
        }
    }
}
