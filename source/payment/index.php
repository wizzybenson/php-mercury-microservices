<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS.'app'.DS);
<<<<<<< HEAD
$config=include_once ROOT.'config/config.php';
require_once ROOT.'./../vendor/autoload.php';
require_once ROOT.'config/services.php';
\Ubiquity\controllers\Startup::run($config);
=======
$config=include ROOT.'config/config.php';
require ROOT.'./../vendor/autoload.php';
require ROOT.'config/services.php';
\Ubiquity\controllers\Startup::run($config);
>>>>>>> upstream/master
