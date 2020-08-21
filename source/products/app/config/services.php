<?php
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
\Ubiquity\orm\DAO::start();
<<<<<<< HEAD
Router::start();
=======
Router::startRest();
>>>>>>> upstream/master
Router::addRoute("_default", "controllers\\IndexController");
\Ubiquity\assets\AssetsManager::start($config);
