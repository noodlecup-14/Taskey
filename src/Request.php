<?php

namespace Framework;

class Request {
    public string $method;

    public string $path;

    /** @var string[] */
    public array $queryParameters;

    /** @var string[] */
    public array $postParameters;

    /**
     * @param string $method
     * @param string $path
     * @param string[] $queryParameters
     * @param string[] $postParameters
     */
    public function __construct(
        string $method,
        string $path,
        array $queryParameters,
        array $postParameters,
    ) {
        $this->method = $method;
        $this->path = $path;
        $this->queryParameters = $queryParameters;
        $this->postParameters = $postParameters;
    }

//    public function getMethod(): string {
//        return $this->method;
//    }
//
//    public function getPath(): string {
//        return $this->path;
//    }
//
//    public function getQueryParameters(): array {
//        return $this->queryParameters;
//    }
//
//    public function getPostParameters(): array {
//        return $this->postParameters;
//    }
}
