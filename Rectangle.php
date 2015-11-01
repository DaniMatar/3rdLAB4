<?php

require_once("Shape.php");
require_once("Resizable.php");;
class Rectangle extends Shape implements iResizeable
{

    private $length;
    private $width;
    private $area;
    private $resizeVal;

    public function __construct($in_name, $in_length, $in_width)
    {
        parent::__construct($in_name);
        $this->length = $in_length;
        $this->width = $in_width;

    }

    public function calculateArea()
    {
        $area = $this->length * $this->width;
        return $area;
    }

    // Interface method
    public function resize($resize, $area)
    {
        return $area;
    }
}