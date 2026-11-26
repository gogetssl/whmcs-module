<?php

namespace GGSModule\Server\app\Client\Parts;

use GGSModule\Server\app\models\whmcs\Client;
use GGSModule\Server\app\models\whmcs\Service;
use GGSModule\Server\app\models\whmcs\SSL;
use GGSModule\App\Models\Whmcs\Invoice;

/**
 * SSL certificate of a service: status pages, downloads, reissue, validation, renewal invoice, CSR tools.
 * Part of the client area controller (clientarea\home): the methods keep their names, so the page URLs are unchanged.
 */
trait SslCertificatePages
{
    use SslStatusPages;
    use SslDownloadActions;
    use SslReissueActions;
    use SslValidationActions;
    use SslServiceActions;


}
