<?php

namespace User\PhpLab07;
class HtmlEscaper
{
    public function escape(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES);
    }
}