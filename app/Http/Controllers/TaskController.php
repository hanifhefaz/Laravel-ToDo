<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index')->with(['tasks'=> $tasks]);
    }

    public function store(Request $request)
    {
        $attrs = request()->validate(['body'=>'required|max:255']);
                Task::create(
            [
                'user_id' => auth()->id(),
                'body'=>$attrs['body']

            ]);
        return redirect('/tasks');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {

        request()->validate(['body'=>'required|max:255']);
        $task->update(['body' => $request->body]);
        return redirect('/tasks');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function delete(Task $task)
    {
        try {
            $task->delete();
        } catch (\Exception $e) {
        }
        return redirect('/tasks');
    }
    public function completed(Task $task)
    {
        $task = Task::find($task['id']);
        $task->completed = true;
        $task->save();
        return redirect('/tasks');




    }
    public function incomplete(Task $task)
    {
        $task = Task::find($task['id']);
        $task->completed = false;
        $task->save();
        return redirect('/tasks');
    }


}
