<?php

namespace App;

class View
{
    private string $path;
    private ?array $params;

    public function __construct(string $path, ?array $params)
    {
        $this->path = $path;
        $this->params = $params;
    }

    public function render()
    {
        ob_start();

        if ($this->params) extract($this->params);

        require PATH_VIEW . $this->path . '.php';

        return ob_get_clean();
    }

    public static function make(string $path, ?array $params = null): static
    {
        return new static($path, $params);
    }

    public function __toString(): string
    {
        return $this->render();
    }
}