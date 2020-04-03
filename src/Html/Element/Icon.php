<?php

/**
 * Icon.php
 *
 * create icon element, use <i> tag
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
 * Class Icon
 * @package Brnbio\LaravelHtml\Html\Element
 */
class Icon extends AbstractElement
{
    /**
     * @var string
     */
    protected $defaultTemplate = '<i class="{{icon}}"></i>';

    /**
     * @var string[]
     */
    protected $icon = [];

    /**
     * Icon constructor.
     * @param string $icon
     */
    public function __construct(string $icon)
    {
        parent::__construct();
        $this->icon[] = Str::contains($icon, 'fa-') ? $icon : 'fa-' . $icon;
    }

    /**
     * @return HtmlString
     */
    public function render(): HtmlString
    {
        return $this->templater
            ->formatTemplate($this->getTemplate(), [
                'icon' => implode(' ', $this->icon)
            ]);
    }
}
