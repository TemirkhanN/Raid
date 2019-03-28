<?php

declare(strict_types=1);

namespace Raid\App\Command;

class ColoredCliFormatter
{
    public static function red(string $text): string
    {
        return sprintf("\033[31m %s \033[0m", $text);
    }

    public static function black(string $text): string
    {
        return sprintf("\033[30m %s \033[0m", $text);
    }

    public static function green(string $text): string
    {
        return sprintf("\033[32m %s \033[0m", $text);
    }

    public static function blue(string $text): string
    {
        return sprintf("\033[34m %s \033[0m", $text);
    }
}
