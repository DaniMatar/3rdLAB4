<?php

require_once("Shape.php");
require_once("Resizable.php");



class Triangle extends Shape implements iResizeable
{

    private $base;
    private $height;
    private $area;
    private $resizeVal;

    public function __construct($in_name,$in_base, $in_height)
    {
        parent::__construct($in_name);
        $this->base = $in_base;
        $this->height = $in_height;

    }

    public function calculateArea()
    {
        $area = ((($this->base)*($this->height))/2);
        return $area;
    }

    // Interface method
    public function resize($resize, $area)
    {
        $resize = $resize / 100;
        return $area * $resize;
    }
}