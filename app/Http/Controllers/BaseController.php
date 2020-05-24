<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Jenssegers\Agent\Agent;

class BaseController extends Controller
{
    public $slider = false;
    public function __construct()
    {
        View::share('slider', $this->slider);
        View::share('agent', new Agent());
    }
}
