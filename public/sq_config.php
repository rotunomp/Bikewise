<?php
if (!defined(_SQ_AUTHZ_URL)) {
    define('_SQ_AUTHZ_URL', "/oauth2/authorize") ;
}
// Create and configure a new API client object
$defaultApiConfig = new \SquareConnect\Configuration();
$defaultApiConfig->setAccessToken(getAccessToken());

$defaultApiClient = new \SquareConnect\ApiClient($defaultApiConfig);
?>

