<?php

namespace Core;

class Route
{
    private Request $request;
    private Response $response;

    public function __construct(private string $path, private string $method, private string|array $handler)
    {
    }

    public function load(Request &$request, Response &$response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public static function get(string $path, string|array $handler): Route
    {
        return new Route($path, 'GET', $handler);
    }

    public static function post(string $path, string|array $handler): Route
    {
        return new Route($path, 'POST', $handler);
    }

    public function matches(): bool
    {
        if ($this->path === $this->request->path() && $this->method === $this->request->method()) return true;
        return false;
    }

    public function callHandler()
    {
        if (is_string($this->handler)) {
            return $this->render($this->handler);
        } elseif (is_array($this->handler)) {
            $this->handler[0] = new $this->handler[0]($this);
            [$view, $args] = call_user_func($this->handler, $this->request, $this->response);
            return $this->render($view, $args);
        }
    }

    public function render(string $view, array $args = [])
    {
        return $this->renderWithTemplate($view, 'main', $args);
    }

    public function renderWithTemplate(string $view, string $template, array $args = [])
    {
        foreach ($args as $arg) {
            $$arg = $arg;
        }

        ob_start();
        include __DIR__ . '/../app/views/templates/' . $template . '.php';
        $template = ob_get_clean();
        ob_start();
        include __DIR__ . '/../app/views/' . $view . '.php';
        $view = ob_get_clean();
        return str_replace('{{template}}', $view, $template);
    }
};
