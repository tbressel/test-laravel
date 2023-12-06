<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [   
            'tasks' => Task::where('task_stat', 0)->orderBy('task_name', 'desc')->get()
        ];
        return view('tasklist', $data);
    }


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taskadd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'taskname_field' => 'required|max:50',
        ]);

        $task = new Task();
        $task->task_name = $request->input('taskname_field');
        $task->save();
        return redirect()->route('task.list')->with('notif', 'La tâche a été créée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('taskedit', [
            'task' => Task::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'taskname_field' => 'required|max:50|min:5',
            ],
            [
                'taskname_field.required' => 'Le champ ne doit pas être vide',
                'taskname_field.max' => 'Il y a trop de caractères',
                'taskname_field.min' => 'Il n\'y a pas assez de caractèes',
            ]
        );

        $task = Task::find($id);
        $task->task_name = $request->input('taskname_field');
        $task->save();
        return redirect()->route('task.list')->with('notif', 'La tâche a été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.list')->with('notif', 'La tâche a été supprimée');
    }


    /**
     * Update task to done
     *
     * @param string $id
     * @return void
     */
    public function done(string $id)
    {
        $task = Task::find($id);
        $task->update(['task_stat' => 1]);
        return redirect('/tasklist/');
    }
    /**
     * Update task to undone
     *
     * @param string $id
     * @return void
     */
    public function undone(string $id)
    {
        $task = Task::find($id);
        $task->update(['task_stat' => 0]);
        return redirect('/tasklist/');
    }
}
