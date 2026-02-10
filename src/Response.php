<?php

namespace Framework;

class Response
{
    public int $responseCode = 200;

    public string $body;

    // ?: could potentially be null
    public ?string $headers;

    public function __construct(
        string $body = "",
        int $responseCode = 200,
        ?string $headers = null,
    ) {
        $this->body = $body;
        $this->responseCode = $responseCode;
        $this->headers = $headers;
    }

    /**
     * Send the response to the client.
     */
    public function echo(): void
    {
        if ($this->headers !== null) {
            header($this->headers);
        }
        http_response_code($this->responseCode);
        echo $this->body;
    }
}
