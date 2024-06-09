<?php

namespace Framework;

class Request
{
    public function __construct(
        public string $uri,
        public string $method,
        public array $get,
        public array $post,
        public array $cookie,
        public array $server
    )
    {

    }

    public static function createFromGlobals(): static
    {
        return new static(
            $_SERVER["REQUEST_URI"],
            $_SERVER["REQUEST_METHOD"],
            $_GET,
            $_POST,
            $_COOKIE,
            $_SERVER
        );
    }
}