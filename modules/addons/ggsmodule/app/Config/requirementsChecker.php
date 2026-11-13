<?php
// phpcs:ignoreFile

use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\ClassExists;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\DirectoryExists;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\ExtensionExists;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\FileExists;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\FunctionExists;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\IsReadable;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\IsWritable;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\MethodExists;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\PhpMinVersion;
use ModulesGarden\ggsmodule\Packages\RequirementsChecker\Checkers\WhmcsMinVersion;

return [
    /*new PhpMinVersion('7.2.0'),
    new WhmcsMinVersion('8.9.0'),
    new MethodExists('SimpleXMLElement', 'attributes'),
    new DirectoryExists('/var/www'),
    new FileExists('/var/www/html/index.php'),
    new FunctionExists('exec'),
    new ClassExists('SimpleXMLElement'),
    new ExtensionExists('mysqli'),
    new IsWritable('/var/www'),
    new IsReadable('/var/www')*/
];

