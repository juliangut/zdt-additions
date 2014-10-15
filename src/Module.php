<?php
/**
 * ZdtAdditions Module (https://github.com/juliangut/zdt-additions)
 *
 * @link https://github.com/juliangut/zdt-additions for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
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
