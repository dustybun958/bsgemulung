<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        return view('admin.developer.index'); // Gantilah 'admin.developer.index' dengan nama file blade yang sesuai
    }
}
