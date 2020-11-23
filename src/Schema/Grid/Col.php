<?php

namespace Twigger\Blade\Schema\Grid;

use Twigger\Blade\Foundation\SchemaDefinition;

/**
 * Class Col
 * @package Twigger\Blade\Schema\Grid
 */
abstract class Col extends SchemaDefinition
{

    public $cols;

    public function __construct($cols)
    {
        $this->cols = $cols;
    }

    public static function tag(): string
    {
        return 'col';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Grid\Col::class;
    }

    public function colClass()
    {
        $classes = [];
        if($this->cols) {
            $classes[] = 'col-' . $this->cols;
        } if($this->has('sm')) {
            $classes[] = 'col-sm-' . $this->get('sm');
        } if($this->has('md')) {
            $classes[] = 'col-md-' . $this->get('md');
        } if($this->has('lg')) {
            $classes[] = 'col-lg-' . $this->get('lg');
        } if($this->has('xl')) {
            $classes[] = 'col-xl-' . $this->get('xl');
        }
        return implode(' ', $classes);
    }
}
