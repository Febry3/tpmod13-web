<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'user_id',
    ];

    protected $table = 'tasks';

    protected $primaryKey = 'task_id';

    public static function getAllTask()
    {
        return Task::all();
    }

    public static function getAllTaskByUser($user_id)
    {

        return Task::where('user_id', $user_id)->get();
    }

    public static function getTask($id)
    {
        $task = Task::where('task_id', $id)->first();

        if ($task) {
            return $task;
        }
        return null;
    }

    public static function createTask(Request $request)
    {
        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user()->id,
        ]);

        return $task;
    }

    public static function updateTask(Request $request, $id)
    {
        $task = Task::where('task_id', $id)->first();

        if ($task) {
            $task->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'user_id' => $task->user_id,
            ]);
            return $task;
        }
        return null;
    }

    public static function deleteTask($id)
    {
        $task = Task::where('task_id', $id)->first();;
        if ($task) {
            $task->delete();
            return $task;
        }

        return null;
    }
}
