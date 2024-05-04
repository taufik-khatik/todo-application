<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssignNotification;
use App\Mail\UnassignNotification;
use Illuminate\Support\Facades\Session;


class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:open,in_progress,completed',
        ]);

        // Add 'created_by' field to the $validatedData array
        $validatedData['created_by'] = auth()->user()->id;

        Todo::create($validatedData);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    public function show($id)
    {
        $todo = Todo::findOrFail($id); // Find the todo by ID
        return view('todos.show', compact('todo'));
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id); // Find the todo by ID
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:open,in_progress,completed',
        ]);

        // Add 'updated_by' field to the $validatedData array
        $validatedData['updated_by'] = auth()->user()->id;

        $todo = Todo::findOrFail($id); // Find the todo by ID
        $todo->update($validatedData);

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id); // Find the todo by ID
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }

    public function assignView($id)
    {
        $todo = Todo::findOrFail($id);
    
        // Get all users
        $users = User::all();

        return view('todos.assign', compact('todo', 'users'));
    }

    public function assign(Request $request, $id)
    {
        // Check if the user has permission to assign tasks
        // $this->authorize('assign', Todo::class); 

        // Validate the request
        $validatedData = $request->validate([
            'assigned_user_id' => 'required|exists:users,id',
        ]);

        $todo = Todo::findOrFail($id);

        // Get the current assigned user
        $previousAssignedUser = $todo->user;

        // Update the task's assigned user
        $todo->user_id = $validatedData['assigned_user_id'];
        $todo->save();

        // Get the updated task with the newly assigned user
        $todo = Todo::findOrFail($id);

        // Send email notifications
        $this->sendAssignNotification($todo, $previousAssignedUser);

        return redirect()->route('todos.index')->with('success', 'Todo assigned successfully.');
    }

    private function sendAssignNotification($todo, $previousAssignedUser)
    {
        // Get the assigned user details
        $assignedUser = User::findOrFail($todo->user_id);

        // Send email to the new assigned user
        Mail::to($assignedUser->email)->send(new AssignNotification($todo, $assignedUser));

        // Send email to the previous assigned user (if any)
        if ($previousAssignedUser && $previousAssignedUser->id !== $assignedUser->id) {
            Mail::to($previousAssignedUser->email)->send(new UnassignNotification($todo, $previousAssignedUser));
        }
    }


    



}