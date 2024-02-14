<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::all();
        $users = User::all();
        return view('backend.tasks.index', compact('tasks', 'users', 'projects', 'users'));
    }

    public function create()
    {
        $projects = Project::all();
        $tasks = Task::all();
        $users = User::all();
        return view('backend.tasks.create', compact('tasks', 'users', 'projects', 'users'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|in:Not Started,In Progress,Completed',
        ]);

        Task::create([
            'project_id' => $request->project_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('backend.tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();
        return view('backend.tasks.edit', compact('task', 'projects', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|in:Not Started,In Progress,Completed',
        ]);

        $task->update([
            'project_id' => $request->project_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
