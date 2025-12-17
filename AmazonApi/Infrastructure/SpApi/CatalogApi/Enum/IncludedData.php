<?php
namespace AmazonApi\Infrastructure\SpApi\CatalogApi\Enum;

enum IncludedData:string{
    case ATTRIBUTES = "attributes";
    case CLLASSIFICATIONS = "classifications";
    case DEMENTIONS = "dimensions";
    case IDENTIFIERS = "identifiers";
    case IMAGES = "images";
    case PRODUCT_TYPES = "productTypes";
    case RELATIONSHIPS = "relationships";
    case SALES_RANKES = "salesRanks";
    case SUMMARIES = "summaries";
    case VENDOR_DETAILS = "vendorDetails";
}
