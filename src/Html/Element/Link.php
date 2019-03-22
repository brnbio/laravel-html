<?php

/**
 * Link.php
 *
 * html link
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-22
 * @link        https://www.w3.org/TR/html/textlevel-semantics.html#the-a-element
 */

declare(strict_types=1);

namespace Brnbio\LaravelHtml\Html\Element;

use Brnbio\LaravelHtml\Html\AbstractElement;
use Illuminate\Support\HtmlString;

/**
 * Class Link
 * @package Brnbio\LaravelHtml\Html\Element
 */
class Link extends AbstractElement
{
    /**
     * @var string
     */
    protected $defaultTemplate = '<a href="{{url}}"{{attrs}}>{{text}}</a>';

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $text;

    /**
     * Link constructor.
     * @param string $url
     * @param string $text
     * @param array $attributes
     */
    public function __construct(string $url, string $text, array $attributes = [])
    {
        parent::__construct();

        $this->url = trim($url);
        $this->text = trim($text);
        $this->attributes = $this->validateAttributes($attributes + $this->defaultOptions);
    }

    /**
     * @return HtmlString
     */
    public function render(): HtmlString
    {
        return $this->templater
            ->formatTemplate($this->getTemplate(), [
                'url' => $this->url,
                'text' => $this->text,
                'attrs' => $this->templater->formatAttributes($this->attributes),
            ]);
    }

    /**
     * @param array $attributes
     */
    protected function addAdditionalAllowedAttributes(array $attributes = []): void
    {
        parent::addAdditionalAllowedAttributes([
            self::ATTRIBUTE_DOWNLOAD,
            self::ATTRIBUTE_HREF,
            self::ATTRIBUTE_HREFLANG,
            self::ATTRIBUTE_REL,
            self::ATTRIBUTE_ROLE,
            self::ATTRIBUTE_TARGET,
            self::ATTRIBUTE_TYPE,
            self::ATTRIBUTE_EVENTS_CLICK,
        ]);
    }

    /**
     * @param array $attributesValues
     */
    protected function addAdditionalAllowedAttributesValues(array $attributesValues = []): void
    {
        parent::addAdditionalAllowedAttributesValues([
            self::ATTRIBUTE_ROLE => [
                self::ATTRIBUTE_ROLE_LINK,
                self::ATTRIBUTE_ROLE_BUTTON,
                self::ATTRIBUTE_ROLE_CHECKBOX,
                self::ATTRIBUTE_ROLE_RADIO,
                self::ATTRIBUTE_ROLE_SWITCH,
                self::ATTRIBUTE_ROLE_TAB,
                self::ATTRIBUTE_ROLE_TREEITEM,
            ],
        ]);
    }
}
