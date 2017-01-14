<?php

use CodeIgniter\Services;
use Config\App;
use Config\Autoload;
use Kahlan\Filter\Filter;
use Kahlan\Reporter\Coverage;
use Kahlan\Reporter\Coverage\Driver\Xdebug;

define('ENVIRONMENT', 'testing');
define('BASEPATH',    'system/');
define('APPPATH',     'application/');
define('WRITEPATH',   'writable/');
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

$config = new App();
Services::exceptions($config, true)->initialize();


Filter::register('kahlan.coverage', function($chain) {

    if (!extension_loaded('xdebug')) {
        return;
    }

    $reporters = $this->reporters();
    $coverage = new Coverage([
        'verbosity' => $this->commandLine()->get('coverage'),
        'driver'    => new Xdebug(),
        'path'      => 'application',
        'colors'    => !$this->commandLine()->get('no-colors'),
    ]);

    $reporters->add('coverage', $coverage);
});
Filter::apply($this, 'coverage', 'kahlan.coverage');
