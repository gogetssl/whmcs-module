<?php

use ModulesGarden\Servers\GGSModule\app\controllers\server\admin\Actions;
use ModulesGarden\Servers\GGSModule\Server;

if(!defined('DS'))define('DS',DIRECTORY_SEPARATOR);

require_once __DIR__.DS.'Loader.php';
new \ModulesGarden\Servers\GGSModule\Loader();

// Edition name (GoGetSSL Module / TheSSLStore Plugin) - loaded directly, without booting the addon framework
if(file_exists(dirname(__DIR__, 2).DS.'addons'.DS.'GGSModule'.DS.'app'.DS.'Libs'.DS.'Edition.php'))
{
    require_once dirname(__DIR__, 2).DS.'addons'.DS.'GGSModule'.DS.'app'.DS.'Libs'.DS.'Edition.php';
}

\ModulesGarden\Servers\GGSModule\Server::I();



if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function GGSModule_MetaData() {
    return array(
        'DisplayName' => class_exists('\ModulesGarden\GGSModule\App\Libs\Edition', false) ? \ModulesGarden\GGSModule\App\Libs\Edition::name() : 'GoGetSSL Module',
        'APIVersion' => '1.0',
    );
}

function GGSModule_ConfigOptions() {
    return (new Actions())->ConfigOptions();
}

function GGSModule_CreateAccount($params) {
    return (new Actions())->CreateAccount($params);
}

function GGSModule_SuspendAccount($params) {
    return (new Actions())->SuspendAccount($params);
}

function GGSModule_UnsuspendAccount($params) {
    return (new Actions())->UnsuspendAccount($params);
}

function GGSModule_ChangePackage($params) {
    return (new Actions())->ChangePackage($params);
}

function GGSModule_SSLStepOne($params) {
    return (new Actions())->SSLStepOne($params);
}

function GGSModule_SSLStepTwo($params) {
    return (new Actions())->SSLStepTwo($params);
}

function GGSModule_SSLStepThree($params) {
    return (new Actions())->SSLStepThree($params);
}

function GGSModule_TerminateAccount($params) {
    return (new Actions())->TerminateAccount($params);
}

function GGSModule_AdminCustomButtonArray($params = []) {
    return (new Actions())->AdminCustomButtonArray($params);
}

function GGSModule_RecheckValidation($params) {
    return (new Actions())->RecheckValidation($params);
}

function GGSModule_CancelOrder($params) {
    return (new Actions())->CancelOrder($params);
}

function GGSModule_DownloadAuthFile($params) {
    return (new Actions())->DownloadAuthFile($params);
}

function GGSModule_ClientAreaCustomButtonArray($params = []) {
    return (new Actions())->ClientAreaCustomButtonArray($params);
}

function GGSModule_ClientAreaAllowedFunctions() {
    return (new Actions())->ClientAreaAllowedFunctions();
}

function GGSModule_ClientAreaCustomDownloadCertificate($params) {
    return (new Actions())->DownloadCertificate($params);
}

function GGSModule_SyncCertificate($params) {
    return (new Actions())->SyncCertificate($params);
}

function GGSModule_SSLAdminResendApproverEmail($params) {
    return (new Actions())->ResendApproverEmail($params);
}

function GGSModule_SSLAdminResendCertificate($params) {
    return (new Actions())->ResendCertificate($params);
}

function GGSModule_Renew($params) {
    return (new Actions())->Renew($params);
}

function GGSModule_AdminServicesTabFields(array $params) {
    return (new Actions())->AdminServicesTabFields($params);
}

function GGSModule_AdminServicesTabFieldsSave(array $params) {
    (new \ModulesGarden\Servers\GGSModule\app\services\AdminServicesTabFields())->save($params);
}

function GGSModule_SSLAdminGetCertificate($params) {
    return (new Actions())->GetCertificate($params);
}

function GGSModule_ClientAreaCustomReissueCertificate($params) {
    return (new Actions())->ReissueCertificate($params);
}

function GGSModule_ClientAreaCustomContactDetails($params) {
    return (new Actions())->ContactDetails($params);
}

function GGSModule_ClientArea(array $params) {
    
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
