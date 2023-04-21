<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //Dashboard
    public function index()
    {
        return Inertia::render('App/Dashboard', [
            'tasks' => Task::latest()->where('user_id', auth()->user()->id)->get()
        ]);
    }
}