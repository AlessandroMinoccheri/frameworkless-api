<?php

declare(strict_types=1);

namespace Treblle;

class Router
{
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    private array $handlers;
    /**
     * @var callable
     */
    private $notFoundHandler;

    public function get(string $path, string $handler): void
    {
        $this->handlers[] = Handler::create(self::METHOD_GET, $path, $handler);
    }

    public function post(string $path, string $handler): void
    {
        $this->handlers[] = Handler::create(self::METHOD_POST, $path, $handler);
    }

    public function run(string $method, string $path): void
    {
        $requestUri = parse_url($path);
        $requestPath = $requestUri['path'];

        $callback = null;
        /** @var Handler $handler */
        foreach ($this->handlers as $handler) {
            if ($handler->getPath() === $requestPath && $method === $handler->getMethod()) {
                $callback = $handler->getCallback();
            }
        }

        if (null === $callback) {
            $callback = $this->notFoundHandler;
        }

        if (is_string($callback)) {
            $parts = explode('::', $callback);
            $class = $parts[0];
            $handler = new $class;

            $method = $parts[1];
            $callback = [$handler, $method];
        }

        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }

    public function addNotFoundHandler(callable $handler): void
    {
        $this->notFoundHandler = $handler;
    }
}
