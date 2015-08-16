<?php

namespace blog\Http\Controllers;

use Illuminate\Http\Request;

use blog\Http\Requests;
use blog\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index() {
        return view("admin.dashboard");
    }
}
