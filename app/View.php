<?php

namespace App;

class View
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function render()
    {
        ob_start();

        require PATH_VIEW . $this->path . '.php';

        return ob_get_clean();
    }

    public static function make(string $path): static
    {
        return new static($path);
    }

    public function __toString(): string
    {
        return $this->render();
    }
}