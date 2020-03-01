<?php


namespace App;


interface View
{
//    function render();
    public function render(Array $dataview, string $template);
//    public function json(Array $dataview);
}