<?php

namespace Framework\Http\Render;

use Framework\Base\Render\Render;
use Framework\Base\Response\ResponseInterface;

/**
 * Class Json
 * @package Framework\Base\Render
 */
class Json extends Render
{
    /**
     * @param ResponseInterface $response
     *
     * @return string
     */
    public function render(ResponseInterface $response): string
    {
        $responseBody = $response->getBody();

        http_response_code($response->getCode());

        $headers = $response->getHeaders();
        header('Content-type: application/json');

        foreach ($headers as $key => $value) {
            header($key . ': ' . $value);
        }

        $rendered = json_encode($responseBody, JSON_PRETTY_PRINT);

        echo $rendered;

        return $rendered;
    }
}
