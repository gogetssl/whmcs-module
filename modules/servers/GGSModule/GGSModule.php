<?php

use GGSModule\Server\app\controllers\server\admin\Actions;
use GGSModule\Server\Server;

if(!defined('DS'))define('DS',DIRECTORY_SEPARATOR);

require_once __DIR__.DS.'Loader.php';
new \GGSModule\Server\Loader();

// Edition name (GoGetSSL Module / TheSSLStore Plugin) - loaded directly, without booting the addon framework
if(file_exists(dirname(__DIR__, 2).DS.'addons'.DS.'GGSModule'.DS.'app'.DS.'Libs'.DS.'Support'.DS.'Edition.php'))
{
    require_once dirname(__DIR__, 2).DS.'addons'.DS.'GGSModule'.DS.'app'.DS.'Libs'.DS.'Support'.DS.'Edition.php';
}

\GGSModule\Server\Server::I();

// files updated by copying, without the addon upgrade: the database changes (App\Database\Schema) are applied here
// too; once current it is one query per request
try
{
    if(class_exists('\GGSModule\App\Database\Schema'))
    {
        \GGSModule\App\Database\Schema::migrate();
    }
}
catch(\Throwable $e)
{
    // the service actions go on; the next request tries again
}


if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

/**
 * The answer for a call the module must not run as an ordinary service; null for any other:
 *  - a WHMCS product addon (App\Libs\Certificates\AddonCertificates): WHMCS passes the parent service, the certificate lives on the
 *    addon's own certificate service
 *  - a certificate kept as a record of the legacy module (App\Libs\Certificates\RecordOnly)
 */
function GGSModule_recordOnlyGuard($function, $params) {
    if(!empty($params['addonId']) && class_exists('\GGSModule\App\Libs\Certificates\AddonCertificates')) {
        return \GGSModule\App\Libs\Certificates\AddonCertificates::guard($function, (array)$params);
    }
    try {
        return class_exists('\GGSModule\App\Libs\Certificates\RecordOnly') ? \GGSModule\App\Libs\Certificates\RecordOnly::guard($function, $params) : null;
    } catch(\Throwable $e) {
        return null;
    }
}

function GGSModule_MetaData() {
    return array(
        'DisplayName' => class_exists('\GGSModule\App\Libs\Support\Edition', false) ? \GGSModule\App\Libs\Support\Edition::name() : 'GoGetSSL Module',
        'APIVersion' => '1.0',
    );
}

function GGSModule_ConfigOptions() {
    return (new Actions())->ConfigOptions();
}

function GGSModule_CreateAccount($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('CreateAccount', $params)) !== null) return $recordOnly;
    return (new Actions())->CreateAccount($params);
}

function GGSModule_SuspendAccount($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('SuspendAccount', $params)) !== null) return $recordOnly;
    return (new Actions())->SuspendAccount($params);
}

function GGSModule_UnsuspendAccount($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('UnsuspendAccount', $params)) !== null) return $recordOnly;
    return (new Actions())->UnsuspendAccount($params);
}

function GGSModule_ChangePackage($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('ChangePackage', $params)) !== null) return $recordOnly;
    return (new Actions())->ChangePackage($params);
}

function GGSModule_SSLStepOne($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('SSLStepOne', $params)) !== null) return $recordOnly;
    return (new Actions())->SSLStepOne($params);
}

function GGSModule_SSLStepTwo($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('SSLStepTwo', $params)) !== null) return $recordOnly;
    return (new Actions())->SSLStepTwo($params);
}

function GGSModule_SSLStepThree($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('SSLStepThree', $params)) !== null) return $recordOnly;
    return (new Actions())->SSLStepThree($params);
}

function GGSModule_TerminateAccount($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('TerminateAccount', $params)) !== null) return $recordOnly;
    return (new Actions())->TerminateAccount($params);
}

function GGSModule_AdminCustomButtonArray($params = []) {
    if(($recordOnly = GGSModule_recordOnlyGuard('AdminCustomButtonArray', $params)) !== null) return $recordOnly;
    return (new Actions())->AdminCustomButtonArray($params);
}

function GGSModule_RecheckValidation($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('RecheckValidation', $params)) !== null) return $recordOnly;
    return (new Actions())->RecheckValidation($params);
}

function GGSModule_CancelOrder($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('CancelOrder', $params)) !== null) return $recordOnly;
    return (new Actions())->CancelOrder($params);
}

function GGSModule_DownloadAuthFile($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('DownloadAuthFile', $params)) !== null) return $recordOnly;
    return (new Actions())->DownloadAuthFile($params);
}

function GGSModule_ClientAreaCustomButtonArray($params = []) {
    if(($recordOnly = GGSModule_recordOnlyGuard('ClientAreaCustomButtonArray', $params)) !== null) return $recordOnly;
    return (new Actions())->ClientAreaCustomButtonArray($params);
}

function GGSModule_ClientAreaAllowedFunctions() {
    return (new Actions())->ClientAreaAllowedFunctions();
}

function GGSModule_ClientAreaCustomDownloadCertificate($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('ClientAreaCustomDownloadCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->DownloadCertificate($params);
}

function GGSModule_SyncCertificate($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('SyncCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->SyncCertificate($params);
}

function GGSModule_SSLAdminResendApproverEmail($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('SSLAdminResendApproverEmail', $params)) !== null) return $recordOnly;
    return (new Actions())->ResendApproverEmail($params);
}

function GGSModule_SSLAdminResendCertificate($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('SSLAdminResendCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->ResendCertificate($params);
}

function GGSModule_Renew($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('Renew', $params)) !== null) return $recordOnly;
    return (new Actions())->Renew($params);
}

function GGSModule_AdminServicesTabFields(array $params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('AdminServicesTabFields', $params)) !== null) return $recordOnly;
    return (new Actions())->AdminServicesTabFields($params);
}

function GGSModule_AdminServicesTabFieldsSave(array $params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('AdminServicesTabFieldsSave', $params)) !== null) return $recordOnly;
    (new \GGSModule\Server\app\services\AdminServicesTabFields())->save($params);
}

function GGSModule_SSLAdminGetCertificate($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('SSLAdminGetCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->GetCertificate($params);
}

function GGSModule_ClientAreaCustomReissueCertificate($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('ClientAreaCustomReissueCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->ReissueCertificate($params);
}

function GGSModule_ClientAreaCustomContactDetails($params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('ClientAreaCustomContactDetails', $params)) !== null) return $recordOnly;
    return (new Actions())->ContactDetails($params);
}

function GGSModule_ClientArea(array $params) {
    if(($recordOnly = GGSModule_recordOnlyGuard('ClientArea', $params)) !== null) return $recordOnly;
    
    if(!empty($_REQUEST['json']))
    {
        // Response is always a json_encode()d string (see Server::getJSONClientAreaPage), never HTML
        header('Content-Type: application/json; charset=utf-8');
        header('X-Content-Type-Options: nosniff');
        $jsonResponse = Server::getJSONClientAreaPage($params, $_REQUEST);
        echo $jsonResponse;
        die();
    }

    return Server::getHTMLClientAreaPage($params, $_REQUEST);
}
