<?php
/**
 * ZdtRequest Module (https://github.com/juliangut/zdtRequest)
 *
 * @link https://github.com/juliangut/zdtRequest for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace JgutZdtAdditions;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src',
                ),
            ),
        );
    }
}
