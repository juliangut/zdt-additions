<?php
/**
 * Zend Developer Tools Additions (https://github.com/juliangut/zdt-additions)
 *
 * @link https://github.com/juliangut/zdt-additions for the canonical source repository
 * @license https://raw.githubusercontent.com/juliangut/zdt-additions/master/LICENSE
 */

namespace Jgut\Zf\ZdtAdditions\Collector;

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
        $request = $mvcEvent->getApplication()->getRequest();

        $this->requestData = array(
            '_GET'    => (array) $request->getQuery(),
            '_POST'   => (array) $request->getPost(),
            '_COOKIE' => (array) $request->getCookie(),
            '_FILE'   => (array) $request->getFiles(),
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
     * Files contents.
     *
     * @return array
     */
    public function getFile()
    {
        return $this->get('_FILE');
    }

    /**
     * Gather requests contents.
     *
     * @return array|null
     */
    protected function get($data)
    {
        return isset($this->requestData[$data]) ? $this->requestData[$data] : null;
    }
}
