<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public $menus;
    public function __construct()
    {
        $this->menus['menu'] = Menu::orderBy('order')->get();
    }
}
