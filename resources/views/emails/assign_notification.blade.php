<!DOCTYPE html>
<html>
<head>
    <title>Task Assigned</title>
</head>
<body>
    <h1>Task Assigned</h1>
    <p>Hello {{ $assignedUser->name }},</p>
    <p>You have been assigned a task:</p>
    <p>Title: {{ $todo->title }}</p>
    <p>Description: {{ $todo->description }}</p>
    <p>Status: {{ $todo->status }}</p>
    <p>Click <a href="{{ route('todos.show', $todo->id) }}">here</a> to view the task.</p>
    <p>Thank you!</p>
</body>
</html>
