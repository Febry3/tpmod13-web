<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="height: 100vh" class="d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="card">
            <h5 class="card-header">Edit Task</h5>
            <div class="card-body">
                <form action="/tasks/{{ $task->task_id }}/edit" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Task Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="name"
                            value="{{ $task->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5">{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Status</label>
                        <select class="form-select" aria-label="status" name="status">
                            <option selected>{{ $task->status }}</option>
                            @if ($task->status === 'Pending')
                                <option value="Completed">Completed</option>
                            @else
                                <option value="Pending">Pending</option>
                            @endif
                        </select>
                    </div>
                    <div class="d-flex justify-content-end pt-3">
                        <div>
                            <a href="/" class="btn btn-secondary">Cancel</a>
                            <button class="btn btn-primary">Edit Task</button>
                        </div>
                    </div>
                </form>

                <form action="/tasks/{{ $task->task_id }}/edit" method="POST" class="mt-3">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
