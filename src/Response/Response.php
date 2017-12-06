<?php

namespace Framework\Http\Response;

use Framework\Base\Response\Response as BaseResponse;

/**
 * Class Response
 * @package Framework\Http\Response
 */
class Response extends BaseResponse implements HttpResponseInterface
{
    /**
     * @var array
     */
    private $headers = [];

    /**
     * Response constructor.
     */
    public function __construct()
    {
        $this->setCode(200);
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     *
     * @return HttpResponseInterface
     */
    public function addHeaders(array $headers): HttpResponseInterface
    {
        foreach ($headers as $name => $value) {
            $this->addHeader($name, $value);
        }

        return $this;
    }

    /**
     * @param string $headerName
     * @param string $headerValue
     *
     * @return HttpResponseInterface
     */
    public function addHeader(string $headerName, string $headerValue): HttpResponseInterface
    {
        $this->headers[$headerName] = $headerValue;

        return $this;
    }
}
