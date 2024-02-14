<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $karyawan = User::all();
        $task = Task::all();
        return view('backend.dashboard', compact('projects', 'karyawan', 'task'));
    }
}
