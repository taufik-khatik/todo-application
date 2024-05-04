@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 d-flex">
            <h1 class="me-auto">My Todos</h1>
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('todos.create') }}" class="btn btn-primary my-auto">Create New Todo</a>
            @endif
        </div>
        <table class="table table-bordered table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th style="width: 5%">Sr. No.</th>
                    <th style="width: 20%">Title</th>
                    <th style="width: 40%">Description</th>
                    <th style="width: 10%">Assigned To</th>
                    <th style="width: 10%">Created At</th>
                    <th style="width: 5%">Status</th>
                    <th style="width: 20%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $key => $todo)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>{{ $todo->user->name ?? 'N/A' }}</td>
                        <td>{{ $todo->created_at->format('Y-m-d H:i:s') }}</td>
                        <td><span class="badge bg-{{ $todo->status == 'open' ? 'success' : ($todo->status == 'in_progress' ? 'warning' : 'secondary') }}">{{ $todo->status }}</span></td>
                        <!-- <td>{{ $todo->status }}</td> -->
                        <td>
                            @if (auth()->user()->role === 'admin' || $todo->user_id == Auth::user()->id)
                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary mb-1">Edit</a>
                                <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-secondary mb-1">View</a>
                                @if (auth()->user()->role === 'admin')
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Are you sure! you want to delete this todo?')">Delete</button>
                                    </form>
                                    @if ($todo->status == 'open')            
                                        <a href="{{ route('todos.assign.view', $todo->id) }}" class="btn btn-info mb-1">Assign</a>
                                    @endif
                                @endif
                            @else
                                <span>{{ $todo->status }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection