<?php

/**
 * Helper.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-22
 */

declare(strict_types=1);

namespace Brnbio\LaravelHtml\Html;

use Brnbio\LaravelHtml\Html\Element\Icon;
use Brnbio\LaravelHtml\Html\Element\Image;
use Brnbio\LaravelHtml\Html\Element\Link;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

/**
 * Class Helper
 * @package Brnbio\LaravelHtml\Html
 */
class Helper
{
    /**
     * @var Helper
     */
    protected static $instance;

    /**
     * @return Helper
     */
    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param string $url
     * @param string|null $text
     * @param array $attributes
     * @return HtmlString
     */
    public function link(string $url, ?string $text = null, array $attributes = []): HtmlString
    {
        if ($text === null) {
            $text = $url;
        }

        return Element\Link::create($url, $text, $attributes)->render();
    }

    /**
     * @param string $url
     * @param string|null $text
     * @param array $attributes
     * @return HtmlString
     */
    public function postlink(string $url, ?string $text = null, array $attributes = []): HtmlString
    {
        $formHelper = \Brnbio\LaravelForm\Form\Helper::getInstance();
        $formId = 'html-postlink-' . Str::uuid()->toString();
        $onclick = 'document.getElementById("' . $formId . '").submit();';
        if (!empty($attributes['confirm'])) {
            $onclick = "if(confirm('" . e($attributes['confirm']) . "')){" . $onclick . "}else{return false;}";
        }

        $link = $this->link($url, $text, $attributes + [
            'onclick' => 'event.preventDefault();' . $onclick
        ]);
        $form = $formHelper->create(null, ['action' => $url, 'id' => $formId, 'style' => 'display: none;']) . $formHelper->end();

        return new HtmlString($link . $form);
    }

    /**
     * @param string $icon
     * @return HtmlString
     */
    public function icon(string $icon): HtmlString
    {
        return Icon::create($icon)->render();
    }

    /**
     * @param string $src
     * @param array $attributes
     * @return HtmlString
     */
    public function image(string $src, array $attributes = []): HtmlString
    {
        if (!Str::contains($src, ['http:', 'https:'])) {
            $src = asset($src);
        }

        return Image::create($src, $attributes)->render();
    }
}
