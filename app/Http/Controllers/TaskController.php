<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = Project::getAll();
        if ($projects->isEmpty()) {
            return view('tasks.index')->with([
                'projects' => collect([]),
                'selected' => null,
                'tasks' => collect([]),
            ]);
        } else {
            $selected = $request->get('project_id', $projects->first()?->id);

            if (!$selected) {
                $selected = null; 
            } else {
                $tasks = Task::getByProjectId($selected);
            }

            return view('tasks.index')->with([
                'projects' => $projects,
                'selected' => $selected,
                'tasks' => $tasks ?? collect([]),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->project_id !== null) {
            $projectId = $request->project_id;
            $title = $request->title;
            $priority = Task::getPriority($projectId);

            $task = Task::createNew(
                $title,
                $projectId,
                $priority
            );

            return response()->json($task);

        } else {
            return response()->json(['error' => 'Project ID is required'], 400);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->title
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['success' => true]);
    }

    public function reorder(Request $request)
    {
        foreach ($request->tasks as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}
