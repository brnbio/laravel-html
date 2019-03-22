<?php

/**
 * helpers.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-22
 */

declare(strict_types=1);

if (! function_exists('html')) {
    /**
     * @return \Brnbio\LaravelHtml\Html\Helper
     */
    function html(): \Brnbio\LaravelHtml\Html\Helper
    {
        return \Brnbio\LaravelHtml\Html\Helper::getInstance();
    }
}
