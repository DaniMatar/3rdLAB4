<?php

require_once("Shape.php");
require_once("Resizable.php");



class Circle extends Shape implements iResizeable
{

    private $radius;
    private $area;
    private $resizeVal;

    public function __construct($in_name, $in_radius)
    {
        parent::__construct($in_name);
        $this->radius = $in_radius;

    }

    public function calculateArea()
    {
        $area = $this->radius = (($this->radius)*($this->radius)) *(3.1415926535);
        return $area;
    }


    // Interface method
    public function resize($resize, $area)
    {
        $resize = $resize / 100;
        return $area * $resize;
    }


}