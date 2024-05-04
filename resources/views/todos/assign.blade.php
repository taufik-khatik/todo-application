@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Assign TODO</h1>
        <form action="{{ route('todos.assign', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-5">
                <label for="assigned_user_id">Assign To</label>
                <select name="assigned_user_id" id="assigned_user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $todo->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign TODO</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection