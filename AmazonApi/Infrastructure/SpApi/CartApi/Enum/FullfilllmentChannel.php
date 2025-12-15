<?php
namespace AmazonApi\Infrastructure\SpApi\CartApi\Enum;

enum FullfilllmentChannel:string{
    case FBA = "Amazon";
    case FBM = "Merchant";
}
