<?php

namespace JgutZdtAdditions\Collector;

use ZendDeveloperTools\Collector\CollectorInterface;
use Zend\Mvc\MvcEvent;

/**
 * Environment data Collector.
 */
class EnvironmentCollector implements CollectorInterface
{
    /**
     * Environment data.
     *
     * @var array
     */
    protected $environmentData;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'zdtadditions-environment';
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority()
    {
        return 1;
    }

    /**
     * @inheritdoc
     */
    public function collect(MvcEvent $mvcEvent)
    {
        $date = new \DateTime();

        $this->environmentData = array(
            'environment'    => getenv('APPLICATION_ENV') ?: 'default',
            'timezone'       => $date->getTimeZone()->getName(),
            'locale'         => \Locale::getDefault(),
            'php_extensions' => get_loaded_extensions(),
        );
    }

    /**
     * Get environment.
     *
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environmentData['environment'];
    }

    /**
     * Get timezone.
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->environmentData['timezone'];
    }

    /**
     * Get default locale.
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->environmentData['locale'];
    }

    /**
     * Get PHP loaded extensions.
     *
     * @return string
     */
    public function getPhpExtensions()
    {
        return $this->environmentData['php_extensions'];
    }
}
