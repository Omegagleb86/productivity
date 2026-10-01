<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('tasks', [
            'tasks' => Task::paginate($perpage)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task_create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'status' => 'required|integer|in:0,1,2',
            'score_points' => 'required|integer|min:1',
            'importance' => 'boolean',
            'urgency' => 'boolean',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date|after_or_equal:date_start',
        ]);

        $task = new Task($validated);
        $task->save();

        return redirect('task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('task', [
            'task' => Task::where('id', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! Gate::allows('edit-task', Task::all()->where('id', $id)->first())) {
            return redirect('/error')->with('message', 'У вас нет разрешения на изменение карточки номера ' . $id);
        }

        return view('task_edit', [
            'task' => Task::all()->where('id', $id)->first(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'status' => 'required|integer|in:0,1,2',
            'score_points' => 'required|integer|min:1',
            'importance' => 'boolean',
            'urgency' => 'boolean',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date|after_or_equal:date_start',
        ]);

        $task = Task::all()->where('id', $id)->first();
        $task->name = $validated['name'];
        $task->category_id = $validated['category_id'];
        $task->status = $validated['status'];
        $task->score_points = $validated['score_points'];
        $task->importance = $validated['importance'] ?? false;
        $task->urgency = $validated['urgency'] ?? false;
        $task->date_start = $validated['date_start'];
        $task->date_end = $validated['date_end'];
        $task->save();

        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('destroy-task', Task::all()->where('id', $id)->first())) {
            return redirect('/error')->with('message', 'У вас нет разрешения на удаления карточки номер ' . $id);
        }

        Task::destroy($id);
        return redirect('task');
    }
}
