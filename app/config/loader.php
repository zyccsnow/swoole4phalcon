<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Swoole4phalcon\Models' => APP_PATH . '/common/models/',
    'Swoole4phalcon'        => APP_PATH . '/common/library/',
    'Swoole4phalcon\Extension'        => APP_PATH . '/common/ext/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Swoole4phalcon\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Swoole4phalcon\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
