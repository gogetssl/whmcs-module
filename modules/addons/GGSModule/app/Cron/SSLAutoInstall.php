<?php

namespace GGSModule\App\Cron;

use GGSModule\App\Libs\AutoInstall\AutoInstallHelpers;
use GGSModule\App\Models\CronCheck;
use GGSModule\App\Kernel\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * SSL AutoInstall (cPanel) queue: validation file upload, DNS -> email switch, installation and automatic reissue.
 * Recommended: every 5 minutes
 *   php -q {WHMCS}/modules/addons/GGSModule/cron/cron.php SSLAutoInstall
 */
class SSLAutoInstall extends Command
{
    protected $name = 'SSLAutoInstall';

    protected $description = 'SSL AutoInstall (cPanel) queue.';

    protected $help = '';

    protected function setup()
    {
    }

    protected function process(InputInterface $input, OutputInterface $output, SymfonyStyle $io)
    {
        $io->title('SSL AutoInstall (cPanel)');

        $errorToDB = '';
        try
        {
            $errorToDB = AutoInstallHelpers::processQueue();
        }
        catch(\Throwable $e)
        {
            $errorToDB = $e->getMessage();
            $io->write('Error: ' . $e->getMessage());
        }

        CronCheck::updateOrCreate(
            ['type' => 'SSLAutoInstall'],
            ['last_run' => date('Y-m-d H:i:s'), 'last_error' => $errorToDB]
        );

        $io->success('Finished!');
    }
}
