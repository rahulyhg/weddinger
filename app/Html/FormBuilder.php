<?php namespace App\Html;

use Request;

class FormBuilder extends \Collective\Html\FormBuilder
{

    public function active_if()
    {
        foreach (func_get_args() as $pattern) {
            if (Request::route()->getPath() == $pattern) {
                return "active";
            }
        }
    }
}
