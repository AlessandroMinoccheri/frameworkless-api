<?php

declare(strict_types=1);

namespace Treblle;

class Handler
{
    public function __construct(
        private string $method,
        private string $path,
        private string $callback
    )
    {
        $this->callback = $callback;
    }

    public static function create(string $method, string $path, string $callback): self
    {
        return new self ($method, $path, $callback);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getCallback(): string
    {
        return $this->callback;
    }
}
