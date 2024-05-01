<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class siteController extends Controller
{
    public function index()
    {

        return view('welcome');
    }
    public function service_provider()
    {
        return view('site.service_provider.index');
    }
}
