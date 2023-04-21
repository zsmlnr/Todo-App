<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskContoller extends Controller
{
    //Return Board Page with the Tasks
    public function index()
    {
        return Inertia::render('App/Tasks/Board', [
            'tasks' => Task::latest()->where('user_id', auth()->user()->id)->get()
        ]);
    }
    //Return Create a new Task page
    public function create()
    {
        return Inertia::render('App/Tasks/AddTask', [
            'categories' => [
                'Work',
                'Home',
                'Education',
                'Finance',
                'Health',
                'Family',
                'Friends'
            ],
            'priorities' => [
                'High',
                'Medium',
                'Normal',
                'Low'
            ]
        ]);
    }
    public function store(Request $request)
    {
        //Form Validation
        $form = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'deadline' => 'required',
            'description' => 'required'
        ]);
        //Set status to pending
        $form['status'] = 'pending';
        //Give task to the authorized user
        $form['user_id'] = auth()->user()->id;
        //Create Task
        Task::create($form);
        //Return to the Tasks with a message
        return redirect()->route('board')->with('message', 'New Task created."');
    }
    public function done(Task $task)
    {
        $task->update(['status' => 'done']);
        return redirect()->back()->with('message', 'Task has been deleted.');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('message', 'Task has been deleted.');
    }
}