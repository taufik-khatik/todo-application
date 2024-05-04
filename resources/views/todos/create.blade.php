@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New TODO</h1>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required disabled>
                    <option value="open" selected>Open</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create TODO</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection