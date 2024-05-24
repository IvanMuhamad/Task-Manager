<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tasks;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = tasks::all();
        return view('task', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'string',
            'image' => 'nullable|image|mimes:png,jpg|max:2048',
        ]);

        $task = new Task();
        $task->nama = $request->nama;
        $task->deskripsi= $request->deskripsi;
        $task->status= $request->status;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tasks', 'public');
            $task->image = $path;
        }

        $task->save();

        return redirect()->route('task');
    }
}
