<?php

namespace Framework\Http\Test;

use Framework\Base\Test\UnitTest as TestCase;
use Framework\Http\Request\Request;

class UnitTest extends TestCase
{
    /**
     * @param string $method
     * @param string $path
     * @param array  $parameters
     * @param array  $files
     *
     * @return \Framework\Base\Response\ResponseInterface
     */
    public function makeHttpRequest(
        string $method,
        string $path,
        array $parameters = [],
        array $files = []
    )
    {
        // Normalize input
        $method = strtoupper($method);

        // Build basic http request
        $request = new Request();
        $request->setMethod($method)
                ->setUri($path);

        switch ($method) {
            case 'DELETE':
            case 'PATCH':
            case 'PUT':
            case 'POST':
                $request->setPost($parameters);
                $request->setFiles($files);
                break;

            default:
                $request->setQuery($parameters);
        }

        return $this->runApplication($request)
                    ->getResponse();
    }
}
