<?php

use ModulesGarden\Servers\ggsmodule\app\controllers\server\admin\Actions;
use ModulesGarden\Servers\ggsmodule\Server;

if(!defined('DS'))define('DS',DIRECTORY_SEPARATOR);

require_once __DIR__.DS.'Loader.php';
new \ModulesGarden\Servers\ggsmodule\Loader();

// Edition name (GoGetSSL Module / TheSSLStore Plugin) - loaded directly, without booting the addon framework
if(file_exists(dirname(__DIR__, 2).DS.'addons'.DS.'ggsmodule'.DS.'app'.DS.'Libs'.DS.'Edition.php'))
{
    require_once dirname(__DIR__, 2).DS.'addons'.DS.'ggsmodule'.DS.'app'.DS.'Libs'.DS.'Edition.php';
}

\ModulesGarden\Servers\ggsmodule\Server::I();



if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function ggsmodule_MetaData() {
    return array(
        'DisplayName' => class_exists('\ModulesGarden\ggsmodule\App\Libs\Edition', false) ? \ModulesGarden\ggsmodule\App\Libs\Edition::name() : 'GoGetSSL Module',
        'APIVersion' => '1.0',
    );
}

function ggsmodule_ConfigOptions() {
    return (new Actions())->ConfigOptions();
}

function ggsmodule_CreateAccount($params) {
    return (new Actions())->CreateAccount($params);
}

function ggsmodule_SuspendAccount($params) {
    return (new Actions())->SuspendAccount($params);
}

function ggsmodule_UnsuspendAccount($params) {
    return (new Actions())->UnsuspendAccount($params);
}

function ggsmodule_ChangePackage($params) {
    return (new Actions())->ChangePackage($params);
}

function ggsmodule_SSLStepOne($params) {
    return (new Actions())->SSLStepOne($params);
}

function ggsmodule_SSLStepTwo($params) {
    return (new Actions())->SSLStepTwo($params);
}

function ggsmodule_SSLStepThree($params) {
    return (new Actions())->SSLStepThree($params);
}

function ggsmodule_TerminateAccount($params) {
    return (new Actions())->TerminateAccount($params);
}

function ggsmodule_AdminCustomButtonArray($params = []) {
    return (new Actions())->AdminCustomButtonArray($params);
}

function ggsmodule_RecheckValidation($params) {
    return (new Actions())->RecheckValidation($params);
}

function ggsmodule_CancelOrder($params) {
    return (new Actions())->CancelOrder($params);
}

function ggsmodule_DownloadAuthFile($params) {
    return (new Actions())->DownloadAuthFile($params);
}

function ggsmodule_ClientAreaCustomButtonArray($params = []) {
    return (new Actions())->ClientAreaCustomButtonArray($params);
}

function ggsmodule_ClientAreaAllowedFunctions() {
    return (new Actions())->ClientAreaAllowedFunctions();
}

function ggsmodule_ClientAreaCustomDownloadCertificate($params) {
    return (new Actions())->DownloadCertificate($params);
}

function ggsmodule_SyncCertificate($params) {
    return (new Actions())->SyncCertificate($params);
}

function ggsmodule_SSLAdminResendApproverEmail($params) {
    return (new Actions())->ResendApproverEmail($params);
}

function ggsmodule_SSLAdminResendCertificate($params) {
    return (new Actions())->ResendCertificate($params);
}

function ggsmodule_Renew($params) {
    return (new Actions())->Renew($params);
}

function ggsmodule_AdminServicesTabFields(array $params) {
    return (new Actions())->AdminServicesTabFields($params);
}

function ggsmodule_AdminServicesTabFieldsSave(array $params) {
    (new \ModulesGarden\Servers\ggsmodule\app\services\AdminServicesTabFields())->save($params);
}

function ggsmodule_SSLAdminGetCertificate($params) {
    return (new Actions())->GetCertificate($params);
}

function ggsmodule_ClientAreaCustomReissueCertificate($params) {
    return (new Actions())->ReissueCertificate($params);
}

function ggsmodule_ClientAreaCustomContactDetails($params) {
    return (new Actions())->ContactDetails($params);
}

function ggsmodule_ClientArea(array $params) {
    
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
