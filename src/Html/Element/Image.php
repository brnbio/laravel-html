<?php

/**
 * Image.php
 *
 * create image element
 *
 * @copyright   Copyright (c) brnbio (https://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2020-04-03
 */

declare(strict_types=1);

namespace Brnbio\LaravelHtml\Html\Element;

use Brnbio\LaravelHtml\Html\AbstractElement;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

/**
 * Class Image
 * @package Brnbio\LaravelHtml\Html\Element
 */
class Image extends AbstractElement
{
    /**
     * @var string
     */
    protected $defaultTemplate = '<img src="{{src}}" {{attrs}}>';

    /**
     * @var string
     */
    protected $src;

    /**
     * Image constructor.
     * @param string $src
     * @param array $attributes
     */
    public function __construct(string $src, array $attributes = [])
    {
        parent::__construct();
        $this->src = trim($src);
        $this->attributes = $this->validateAttributes($attributes + $this->defaultOptions);
    }

    /**
     * @return HtmlString
     */
    public function render(): HtmlString
    {
        return $this->templater
            ->formatTemplate($this->getTemplate(), [
                'src' => $this->src,
                'attrs' => $this->templater->formatAttributes($this->attributes),
            ]);
    }

    /**
     * @param array $attributes
     */
    protected function addAdditionalAllowedAttributes(array $attributes = []): void
    {
        parent::addAdditionalAllowedAttributes([
            self::ATTRIBUTE_HEIGHT,
            self::ATTRIBUTE_WIDTH,
            self::ATTRIBUTE_ALT,
        ]);
    }
}
