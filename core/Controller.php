<?php

namespace Core;

class Controller
{
    public function __construct()
    {
    }

    protected function render(string $view, array $args = [])
    {
        return [$view, $args];
    }
};
