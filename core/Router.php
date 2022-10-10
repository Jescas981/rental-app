<?php

namespace Core;

class Router
{
    private Request $request;
    private Response $response;

    public function __construct(private array $routes)
    {
        $this->request = new Request();
        $this->response = new Response();
    }

    public function resolve()
    {
        foreach ($this->routes as $route) {
            $route->load($this->request, $this->response);
            if ($route->matches()) {
                echo $route->callHandler();
            }
        }
    }
};
