<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('tasks.create', compact('categories', 'tags'));
    }

    public function store(CreateTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $task->tags()->attach($request->input('tags'));
        session()->flash('success', 'Задача успешно создана.');

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::with(['category', 'tags', 'comments'])->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('tasks.edit', compact('task', 'categories', 'tags'));
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        $task->tags()->sync($request->input('tags'));
        session()->flash('success', 'Задача успешно обновлена.');
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function addComment(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->comments()->create($request->all());
        return redirect()->route('tasks.show', $taskId);
    }
}