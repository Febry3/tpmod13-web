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
    <div class="container w-25">
        <div class="card">
            <h5 class="card-header">Register</h5>
            <div class="card-body">
                <form action="/register" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="name"
                            aria-describedby="name">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="name"
                            aria-describedby="name">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-primary">Register</button>
                        <a href="/login">Login?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
