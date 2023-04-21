<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AppController extends Controller
{
    //Dashboard
    public function index()
    {
        return Inertia::render('App/Dashboard');
    }
}
