<?php

namespace Core;

class Request
{
    public function path(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        $pos = strpos($path, '?');
        if ($pos) {
            $path = substr($path, 0, $pos);
        }
        return $path;
    }

    public function method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function body()
    {
    }
};
