<?php

use CodeIgniter\Services;
use Config\App;
use Config\Autoload;

define('ENVIRONMENT', 'testing'     . DIRECTORY_SEPARATOR);
define('BASEPATH',    'system'      . DIRECTORY_SEPARATOR);
define('APPPATH',     'application' . DIRECTORY_SEPARATOR);
define('WRITEPATH',   'writable'    . DIRECTORY_SEPARATOR);
define('CI_DEBUG',    1);

require BASEPATH . 'Autoloader/Autoloader.php';
require APPPATH  . 'Config/Constants.php';
require APPPATH  . 'Config/Autoload.php';
require APPPATH  . 'Config/Services.php';

class_alias('Config\Services', 'CodeIgniter\Services');

$loader = Services::autoloader();
$loader->initialize(new Autoload());
$loader->register();

require BASEPATH . 'Common.php';
Services::exceptions(new App(), true)->initialize();
