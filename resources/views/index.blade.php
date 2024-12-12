<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="100vh">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="my-4">Selamat Datang, {{ Auth::user()->username }}</h3>
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
        @if (isset($message) && $message !== 'fail')
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">Add New Task</h5>
            <div class="card-body">
                <form action="/tasks" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Task Name</label>
                        <input name="name" type="text" class="form-control" id="name"
                            aria-describedby="name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                    </div>
                    <button class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container pt-3">

        @if (count($tasks) === 0)
            <div class="alert alert-info" role="alert">
                No task available
            </div>
        @else
            @foreach ($tasks as $task)
                <a href="/tasks/{{ $task->task_id }}/edit" class="text-decoration-none text-reset">
                    <div class="container border rounded py-2 d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="fw-semibold m-0">{{ $task->name }}</p>
                            <p class="m-0">{{ $task->description }}</p>
                        </div>
                        @if ($task->status === 'Pending')
                            <span class="badge text-bg-warning text-white h-100 p-2">Pending</span>
                        @else
                            <span class="badge text-bg-success text-white h-100 p-2">Completed</span>
                        @endif
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</body>

</html>
