<?php

namespace Twigger\Blade\Schema\Grid;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class Col extends SchemaDefinition
{

    public $cols;
    public $sm;
    public $md;
    public $lg;
    public $xl;

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
        dd($this);
        $classes = [];
        if($this->cols) {
            $classes[] = 'col-' . $this->cols;
        } if($this->sm) {
            $classes[] = 'col-sm-' . $this->sm;
        } if($this->md) {
            $classes[] = 'col-md-' . $this->md;
        } if($this->lg) {
            $classes[] = 'col-lg-' . $this->lg;
        } if($this->xl) {
            $classes[] = 'col-xl-' . $this->xl;
        }
        return implode(' ', $classes);
    }
}
