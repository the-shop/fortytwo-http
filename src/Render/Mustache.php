<?php

namespace Framework\Http\Render;

use Framework\Base\Render\Render;
use Framework\Base\Render\RenderInterface;
use Framework\Base\Response\ResponseInterface;
use Mustache_Engine;

/**
 * Class Mustache
 * @package Framework\Http\Render
 */
class Mustache extends Render
{
    /**
     * @var null
     */
    private $templateName = '';

    /**
     * @param ResponseInterface $response
     *
     * @return string
     */
    public function render(ResponseInterface $response): string
    {
        $rootPath = str_replace('public', '', getcwd());
        $mustacheEngine = new Mustache_Engine(
            [
                'loader' => new \Mustache_Loader_FilesystemLoader(
                    $rootPath . getenv('MUSTACHE_TEMPLATES_DIR_PATH'),
                    [
                        'extension' => getenv('MUSTACHE_FILE_EXTENSION')
                    ]
                )
            ]
        );

        $responseBody = $response->getBody();

        http_response_code($response->getCode());

        header('Content-type: text/html');

        $rendered = $mustacheEngine->render($this->getTemplateName(), $responseBody);

        echo $rendered;

        return $rendered;
    }

    /**
     * @return string
     */
    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    /**
     * @param string $templateName
     *
     * @return RenderInterface
     */
    public function setTemplateName(string $templateName): RenderInterface
    {
        $this->templateName = $templateName;

        return $this;
    }
}
