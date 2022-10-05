<?php
class test
{

    private $test;

    private function __construct($test)
    {
        $this->test = $test;
    }

    public function getTest()
    {
        return $this->test;
    }
}