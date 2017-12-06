<?php

namespace Framework\Http\Request;

use Framework\Base\Request\Request as BaseRequest;
use Framework\Base\Request\RequestInterface;

/**
 * Class Request
 * @package Framework\Http\Request
 */
class Request extends BaseRequest implements HttpRequestInterface
{
    /**
     * @var array
     */
    private $queryParams = [];

    /**
     * @var array
     */
    private $postParams = [];

    /**
     * @var array
     */
    private $fileParams = [];

    /**
     * @var array
     */
    private $cookies = [];

    /**
     * @var string
     */
    private $method = 'GET';

    /**
     * @var array
     */
    private $serverInformation = [];

    /**
     * @var null|string
     */
    private $clientIp = null;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return HttpRequestInterface
     */
    public function setMethod(string $method): HttpRequestInterface
    {
        $this->method = strtoupper($method);

        return $this;
    }

    /**
     * @param string $uri
     *
     * @return RequestInterface
     */
    public function setUri(string $uri): RequestInterface
    {
        // Normalize $uri, prepend with slash if not there
        if (strlen($uri) > 0 && $uri[0] !== '/') {
            $uri = '/' . $uri;
        }

        // Strip query string (?foo=bar)
        if (($pos = strpos($uri, '?')) !== false) {
            $uri = substr($uri, 0, $pos);
        }

        parent::setUri($uri);

        return $this;
    }

    /**
     * @return array
     */
    public function getServer(): array
    {
        return $this->serverInformation;
    }

    /**
     * @param array $serverInformationMap
     *
     * @return HttpRequestInterface
     */
    public function setServer(array $serverInformationMap = []): HttpRequestInterface
    {
        $this->serverInformation = $serverInformationMap;

        $requestMethod = isset($serverInformationMap['REQUEST_METHOD']) === true
            ? strtoupper($serverInformationMap['REQUEST_METHOD']) : 'GET';

        $this->setMethod($requestMethod);

        return $this;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->queryParams;
    }

    /**
     * @param array $get
     *
     * @return HttpRequestInterface
     */
    public function setQuery(array $get = []): HttpRequestInterface
    {
        $this->queryParams = $get;

        return $this;
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        return $this->postParams;
    }

    /**
     * @param array $post
     *
     * @return HttpRequestInterface
     */
    public function setPost(array $post = []): HttpRequestInterface
    {
        $this->postParams = $post;

        return $this;
    }

    /**
     * @return array
     */
    public function getCookies(): array
    {
        return $this->cookies;
    }

    /**
     * @param array $cookies
     *
     * @return HttpRequestInterface
     */
    public function setCookies(array $cookies = []): HttpRequestInterface
    {
        $this->cookies = $cookies;

        return $this;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->fileParams;
    }

    /**
     * @param array $files
     *
     * @return HttpRequestInterface
     */
    public function setFiles(array $files = []): HttpRequestInterface
    {
        $this->fileParams = $files;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        if (function_exists('getallheaders') === true) {
            if (getallheaders() !== false) {
                return getallheaders();
            }
        }

        return [];
    }

    /**
     * @return string
     */
    public function getClientIp(): string
    {
        return $this->clientIp;
    }

    /**
     * @param string $ip
     *
     * @return HttpRequestInterface
     */
    public function setClientIp(string $ip): HttpRequestInterface
    {
        $this->clientIp = $ip;

        return $this;
    }
}
