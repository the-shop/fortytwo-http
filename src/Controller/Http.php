<?php

namespace Framework\Http\Controller;

use Framework\Base\Application\BaseController;
use Framework\Http\Request\HttpRequestInterface;
use Framework\Http\Request\Request;

/**
 * Class Http
 * @package Framework\Http\Controller
 */
class Http extends BaseController
{
    /**
     * @return HttpRequestInterface
     */
    public function getRequest(): HttpRequestInterface
    {
        /* @var Request $request */
        $request = $this->getApplication()
                        ->getRequest();

        return $request;
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        return $this->getRequest()
                    ->getPost();
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->getRequest()
                    ->getQuery();
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->getRequest()
                    ->getFiles();
    }
}
