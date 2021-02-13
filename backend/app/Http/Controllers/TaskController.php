<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function getList()
    {
        $tasks = Task::all();
        return $tasks;
    }

    public function add(Request $request)
    {
        $task = new Task();
        $task->title = $request->title ?? '';
        $task->deadline = $request->deadline ?? Carbon::now();
        $task->save();

        $tasks = Task::all();
        return $tasks;
    }
}