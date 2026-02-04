<?php

namespace Framework;

class Response {
    public int $responseCode;

    public string $body;

    // ?: could potentially be null
    public ?string $headers;

    public function __construct(
        string $body,
        int $responseCode = 200,
        ?string $headers = null,
    ) {
        $this->body = $body;
        $this->responseCode = $responseCode;
        $this->headers = $headers;
    }

    public function echo(): void {
        if ($this->headers) {
            header($this->headers);
        }
        http_response_code($this->responseCode); // built-in function
        echo $this->body;
    }
}