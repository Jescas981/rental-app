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
        if ($this->method() === "POST") {
            return filter_input_array(INPUT_POST, HTML_SPECIALCHARS);
        } else {
            return filter_input_array(INPUT_POST, HTML_SPECIALCHARS);
        }
    }
};
