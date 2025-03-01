@extends('layout.index')

@section('content')
<div class="container" style="max-width: 600px">
    <h2>Edit Task</h2>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required>
            <label for="title" class="form-label">Deadline</label>
            <input type="datetime-local" name="deadline" class="form-control" id="deadline" value="{{ $task->deadline }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="/" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
