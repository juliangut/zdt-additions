<?php
/**
 * ZdtAdditions Module (https://github.com/juliangut/zdt-additions)
 *
 * @link https://github.com/juliangut/zdt-additions for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace JgutZdtAdditions\Collector;

use ZendDeveloperTools\Collector\CollectorInterface;
use Zend\Mvc\MvcEvent;

/**
 * Request data Collector.
 */
class RequestCollector implements CollectorInterface
{
    /**
     * Request data.
     *
     * @var array
     */
    protected $requestData;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'zdtadditions-request';
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority()
    {
        return 1;
    }

    /**
     * {@inheritdoc}
     */
    public function collect(MvcEvent $mvcEvent)
    {
        $this->requestData = array(
            '_GET'    => $_GET,
            '_POST'   => $_POST,
            '_COOKIE' => $_COOKIE,
        );
    }

    /**
     * Request data.
     *
     * @return array
     */
    public function getRequest()
    {
        return $this->requestData;
    }

    /**
     * Get requests contents.
     *
     * @return array
     */
    public function getGet()
    {
        return $this->get('_GET');
    }

    /**
     * Post requests contents.
     *
     * @return array
     */
    public function getPost()
    {
        return $this->get('_POST');
    }

    /**
     * Cookies contents.
     *
     * @return array
     */
    public function getCookie()
    {
        return $this->get('_COOKIE');
    }

    /**
     * Gather requests contents.
     *
     * @return array
     */
    protected function get($data)
    {
        return $this->requestData[$data];
    }
}
