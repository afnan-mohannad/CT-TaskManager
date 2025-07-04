@extends('layouts.app')

@section('content')   

<h1>Simple Task Manager</h1>
<hr>
<div class="row pt-3">
    <div class="col-md-8 mb-3">
        <form id="projectsForm" method="GET">
            <select name="project_id" class="form-select" onchange="this.form.submit()">
                    @forelse($projects as $project)
                        <option value="{{ $project->id }}" {{ ($selected == $project->id) ? 'selected' : '' }}>{{ $project->title }}</option>
                    @empty
                        <option value="">No Projects</option>
                    @endforelse
            </select>
        </form>
    </div>
    @if(isset($projects) && $projects->count() > 0)
        <div class="col-md-4 mb-3">
            <button class="btn btn-info" onclick="openAddTaskModal()">Add New Task</button>
            <span class="text-muted ms-2">#1 priority goes at top, #2 next down.</span>
        </div>
    @endif
</div>
<hr>
@if(isset($projects) && $projects->count() > 0)
<div class="row pt-3">
    <h2>Tasks for project: {{ $projects->firstWhere('id', $selected)->title ?? 'All Projects' }}</h2>
    <ul class="list-group" id="taskListing">
        @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center task-item" draggable="true" data-id="{{ $task->id }}">
                <span class="task-name">{{ Str::words($task->title,10) }}</span>
                <div>
                    <button class="btn btn-sm btn-primary me-2" onclick="openEditTaskModal({{ $task->id }}, '{{ $task->title }}')">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteTask({{ $task->id }})">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endif
@include('layouts.partials.modal')

@endsection
