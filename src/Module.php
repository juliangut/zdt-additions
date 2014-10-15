<?php
/**
 * ZdtAdditions Module (https://github.com/juliangut/zdt-additions)
 *
 * @link https://github.com/juliangut/zdt-additions for the canonical source repository
 * @license https://raw.githubusercontent.com/juliangut/zdt-additions/master/LICENSE
 */

namespace JgutZdtAdditions;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/../autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
}
