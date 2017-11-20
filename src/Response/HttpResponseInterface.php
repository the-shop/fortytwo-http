<?php

namespace Framework\Http\Response;

use Framework\Base\Response\ResponseInterface;

/**
 * Interface HttpResponseInterface
 * @package Framework\Http\Response
 */
interface HttpResponseInterface extends ResponseInterface
{
    /**
     * @param array $headers
     *
     * @return \Framework\Http\Response\HttpResponseInterface
     */
    public function addHeaders(array $headers): HttpResponseInterface;

    /**
     * @param string $headerName
     * @param string $headerValue
     *
     * @return \Framework\Http\Response\HttpResponseInterface
     */
    public function addHeader(string $headerName, string $headerValue): HttpResponseInterface;

    /**
     * @return array
     */
    public function getHeaders(): array;
}
