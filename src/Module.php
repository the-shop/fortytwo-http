<?php

namespace Framework\Http;

use Framework\Base\Module\BaseModule;

/**
 * Class Module
 * @package Framework\Http
 */
class Module extends BaseModule
{
    /**
     * @inheritdoc
     */
    public function loadConfig()
    {
        // Let's read all files from module config folder and set to Configuration
        $configDirPath = realpath(dirname(__DIR__)) . '/config/';
        $this->setModuleConfiguration($configDirPath);
    }


    /**
     * @inheritdoc
     */
    public function bootstrap()
    {
        $application = $this->getApplication();

        $appConfig = $application->getConfiguration();

        // Add routes to dispatcher
        if (
            empty($routes = $appConfig->getPathValue('routes')) === false
        ) {
            $application->getDispatcher()
                        ->addRoutes($routes);
        }
    }
}
