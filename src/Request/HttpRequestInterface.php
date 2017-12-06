<?php

namespace Framework\Http\Request;

use Framework\Base\Request\RequestInterface;

/**
 * Interface RequestInterface
 * @package Framework\Http\Request
 */
interface HttpRequestInterface extends RequestInterface
{
    /**
     * @return array
     */
    public function getServer(): array;

    /**
     * @param array $serverInformationMap
     *
     * @return HttpRequestInterface
     */
    public function setServer(array $serverInformationMap = []): HttpRequestInterface;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @param string $method
     *
     * @return HttpRequestInterface
     */
    public function setMethod(string $method): HttpRequestInterface;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param string $ip
     *
     * @return HttpRequestInterface
     */
    public function setClientIp(string $ip): HttpRequestInterface;

    /**
     * @return string|null
     */
    public function getClientIp(): string;

    /**
     * @return array
     */
    public function getQuery(): array;

    /**
     * @param array $query
     *
     * @return HttpRequestInterface
     */
    public function setQuery(array $query): HttpRequestInterface;

    /**
     * @return array
     */
    public function getPost(): array;

    /**
     * @param array $post
     *
     * @return HttpRequestInterface
     */
    public function setPost(array $post): HttpRequestInterface;

    /**
     * @return array
     */
    public function getCookies(): array;

    /**
     * @param array $cookies
     *
     * @return HttpRequestInterface
     */
    public function setCookies(array $cookies): HttpRequestInterface;

    /**
     * @return array
     */
    public function getFiles(): array;

    /**
     * @param array $files
     *
     * @return HttpRequestInterface
     */
    public function setFiles(array $files): HttpRequestInterface;

}
