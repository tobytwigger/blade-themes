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
    private $sm;
    private $md;
    private $lg;
    private $xl;

    /**
     * Col constructor.
     * @param $cols
     * @param null $sm
     * @param null $md
     * @param null $lg
     * @param null $xl
     */
    public function __construct($cols, $sm = null, $md = null, $lg = null, $xl = null)
    {
        $this->cols = $cols;
        $this->sm = $sm;
        $this->md = $md;
        $this->lg = $lg;
        $this->xl = $xl;
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
