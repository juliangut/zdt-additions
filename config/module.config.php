<?php
/**
 * ZdtAdditions Module (https://github.com/juliangut/zdt-additions)
 *
 * @link https://github.com/juliangut/zdt-additions for the canonical source repository
 * @license https://raw.githubusercontent.com/juliangut/zdt-additions/master/LICENSE
 */

return array(
    'service_manager' => array(
        'invokables' => array(
            'Jgut\Zf\ZdtAdditions\RequestCollector'     => 'Jgut\Zf\ZdtAdditions\Collector\RequestCollector',
            'Jgut\Zf\ZdtAdditions\EnvironmentCollector' => 'Jgut\Zf\ZdtAdditions\Collector\EnvironmentCollector',
        ),
    ),

    'view_manager' => array(
        'template_map' => array(
            'zend-developer-tools/toolbar/zdtadditions-request'
                => __DIR__ . '/../view/zend-developer-tools/toolbar/request.phtml',
            'zend-developer-tools/toolbar/zdtadditions-environment'
                => __DIR__ . '/../view/zend-developer-tools/toolbar/environment.phtml',
        ),
    ),

    'zenddevelopertools' => array(
        'profiler' => array(
            'collectors' => array(
                'zdtadditions-request'     => 'Jgut\Zf\ZdtAdditions\RequestCollector',
                'zdtadditions-environment' => 'Jgut\Zf\ZdtAdditions\EnvironmentCollector',
            ),
        ),
        'toolbar' => array(
            'entries' => array(
                'zdtadditions-request'     => 'zend-developer-tools/toolbar/zdtadditions-request',
                'zdtadditions-environment' => 'zend-developer-tools/toolbar/zdtadditions-environment',
            ),
        ),
    ),
);
