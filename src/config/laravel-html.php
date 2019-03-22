<?php

/**
 * laravel-html.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-22
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    */
    'templates' => [
        \Brnbio\LaravelHtml\Html\Element\Link::class => '<a href="{{url}}"{{attrs}}>{{text}}</a>',
    ],
];
