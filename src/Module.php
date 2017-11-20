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
    public function bootstrap()
    {
        // Let's read all files from module config folder and set to Configuration
        $configDirPath = realpath(dirname(__DIR__)) . '/config/';
        $this->setModuleConfiguration($configDirPath);
    }
}
