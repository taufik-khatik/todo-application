<!-- // show code -->

@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="mb-4 d-flex">
        <h1 class="me-auto">Show TODO</h1>
        <h5 class="mx-2 my-auto">Status - </h5>
        <h4 class="my-auto"><span class="badge bg-{{ $todo->status == 'open' ? 'success' : ($todo->status == 'in_progress' ? 'warning' : 'secondary') }}">{{ $todo->status }}</span></h4>
    </div>
    <div class="form-group mb-4">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" value="{{ $todo->title }}" disabled>
    </div>
    <div class="form-group mb-4">
      <label for="description">Description</label>
      <textarea type="text" class="form-control" id="description" disabled>{{ $todo->description }}</textarea>
    </div>
    <div class="row mb-4">
      <div class="col-md-6">
        <div class="form-group">
          <label for="user_id">Assigned To</label>
          <input type="text" class="form-control" id="user_id" value="{{ $todo->user->name ?? 'N/A' }}" disabled>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="status">Status</label>
          <input type="text" class="form-control" id="status" value="{{ $todo->status }}" disabled>
        </div>
      </div>
    </div>
    @if (auth()->user()->role === 'admin')
      <div class="row mb-4">
        <div class="col-md-6">
          <div class="form-group">
            <label for="created_by">Created By</label>
            <input type="text" class="form-control" id="created_by" value="{{ $todo->creator->name ?? 'N/A' }}" disabled>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="updated_by">Updated By</label>
            <input type="text" class="form-control" id="updated_by" value="{{ $todo->creator->name ?? 'N/A' }}" disabled>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-6">
          <div class="form-group">
            <label for="created_at">Created At</label>
            <input type="text" class="form-control" id="created_at" value="{{ $todo->created_at->format('Y-m-d H:i:s') }}" disabled>
          </div>
        </div>
        <div class="col-md-6 mb-4">  
          <div class="form-group">
            <label for="updated_at">Updated At</label>
            <input type="text" class="form-control" id="updated_at" value="{{ $todo->updated_at->format('Y-m-d H:i:s') }}" disabled>
          </div>
        </div>
      </div>
    @endif

    <div class="mb-4 d-flex">
        <!-- <h1 class="me-auto">Show TODO</h1> -->
        <a href="{{ route('todos.index') }}" class="btn btn-secondary mx-1 my-auto">Back</a>
        @if (auth()->user()->role === 'admin' || $todo->user_id == Auth::user()->id)
          <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary mx-1 my-auto">Edit</a>
          @if (auth()->user()->role === 'admin')
            <a href="{{ route('todos.destroy', $todo->id) }}" class="btn btn-danger mx-1 my-auto" onclick="return confirm('Are you sure you want to delete this todo?')">Delete</a>
          @endif
        @endif
    </div>
    
  </div>
@endsection
