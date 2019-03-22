<?php

/**
 * HtmlServiceProvider.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-22
 */

declare(strict_types=1);

namespace Brnbio\LaravelHtml;

use Illuminate\Support\ServiceProvider;

/**
 * Class HtmlServiceProvider
 *
 * @package Brnbio\LaravelHtml
 */
class HtmlServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            $this->getConfigFile() => config_path($this->getPackageName() . '.php'),
        ]);
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            $this->getConfigFile(),
            $this->getPackageName()
        );
    }

    /**
     * @return string
     */
    private function getConfigFile(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $this->getPackageName() . '.php';
    }

    /**
     * @return string
     */
    private function getPackageName(): string
    {
        return 'laravel-html';
    }
}
