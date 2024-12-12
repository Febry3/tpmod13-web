<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public static function index(Request $request)
    {
        $tasks = Task::getAllTaskByUser($request->user()->id);
        return view('index', ['tasks' => $tasks])->with('message', session('message'));
    }
    public static function store(Request $request)
    {
        Task::createTask($request);
        return redirect('/')->with('message', 'Task Added Successfully');
    }
    public static function edit(Request $request, $id)
    {
        $message = 'Task Edited Successfully';
        $task = Task::updateTask($request, $id);
        if ($task == null) {
            $message = 'fail';
        }

        return redirect('/')->with('message', $message);
    }

    public static function update($id)
    {
        $task = Task::getTask($id);
        return view('edit', ['task' => $task]);
    }

    public static function destroy($id)
    {
        $message = 'Task Deleted Successfully';
        $task = Task::deleteTask($id);
        if ($task == null) {
            $message = 'fail';
        }

        return redirect('/')->with('message', $message);
    }
}
