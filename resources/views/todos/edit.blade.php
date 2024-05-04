@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit TODO</h1>
        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $todo->title }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $todo->description }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="open" {{ $todo->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in_progress" {{ $todo->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update TODO</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection