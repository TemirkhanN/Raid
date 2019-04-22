<?php

declare(strict_types=1);

namespace Raid\App\Command;

/**
 * Console text color formatter
 */
class ConsoleColorFormatter
{
    /**
     * Changes text color to red
     *
     * @param string $text
     *
     * @return string
     */
    public static function red(string $text): string
    {
        return sprintf("\033[31m %s \033[0m", $text);
    }

    /**
     * Changes text color to black
     *
     * @param string $text
     *
     * @return string
     */
    public static function black(string $text): string
    {
        return sprintf("\033[30m %s \033[0m", $text);
    }

    /**
     * Changes text color to green
     *
     * @param string $text
     *
     * @return string
     */
    public static function green(string $text): string
    {
        return sprintf("\033[32m %s \033[0m", $text);
    }

    /**
     * Changes text color to blue
     *
     * @param string $text
     *
     * @return string
     */
    public static function blue(string $text): string
    {
        return sprintf("\033[34m %s \033[0m", $text);
    }
}
