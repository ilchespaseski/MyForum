<?php

class Router
{

    private $handlerMethods = [];
    const METHOD_POST = "POST";
    const METHOD_GET = "GET";
    private $notFoundHandler;

    private function getCurrentPath(): string
    {
        $path = parse_url($_SERVER["REQUEST_URI"]);
        return $path["path"];
    }

    private function getCurrentMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    private function addHandler(string $method, string $path, $handler)
    {
        $this->handlerMethods[$method . $path] = [
            "path" => $path,
            "method" => $method,
            "handler" => $handler
        ];
    }

    public function get(string $path, $handler)
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }

    public function post(string $path, $handler)
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }

    public function addNotFoundHandler($handler)
    {
        $this->notFoundHandler = $handler;
    }

    public function run()
    {
        $callback = null;
        foreach ($this->handlerMethods as $handler) {
            if ($handler["path"] === $this->getCurrentPath() && $handler["method"] === $this->getCurrentMethod()) {
                $callback = $handler["handler"];
            }
        }

        if (!$callback) {
            header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
            if (!empty($this->notFoundHandler)) {
                $callback = $this->notFoundHandler;
            }
        }

        call_user_func_array($callback, [array_merge($_GET, $_POST)]);
    }
}