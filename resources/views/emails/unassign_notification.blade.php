<!DOCTYPE html>
<html>
<head>
    <title>Task Unassigned</title>
</head>
<body>
    <h1>Task Unassigned</h1>
    <p>Hello {{ $previousAssignedUser->name }},</p>
    <p>The task you were assigned has been unassigned:</p>
    <p>Title: {{ $todo->title }}</p>
    <p>Description: {{ $todo->description }}</p>
    <p>Status: {{ $todo->status }}</p>
    <p>Click <a href="{{ route('todos.show', $todo->id) }}">here</a> to view the task.</p>
    <p>Thank you!</p>
</body>
</html>
