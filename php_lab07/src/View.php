<?php

namespace User\PhpLab07;
final class View
{
    public function __construct(
        private readonly string $template,
        private readonly array  $data = [])
    {
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function getData(): array
    {
        return $this->data;
    }
}

