<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @auth
    <x-header />
    <div class="container">
        <div class="posting-section p-3 mt-2 rounded-2 shadow">
            <h3>Make a Post</h3>
            <form action="/createPost" method="POST">
                @csrf
                <input type="text" class="form-control mb-2" name="title" placeholder="Title">
                <textarea name="body" class="form-control mb-2" placeholder="content..."></textarea>
                <button class="btn btn-primary">Save Post</button>
            </form>
        </div>

        <div class="shadow p-3 mt-4">
            <div class="row">
                <div class="col">
                    <h3 class="mt-2" style="text-shadow: 0 2px 2px rgba(0, 0, 0, .5);">All Posts</h3>
                </div>
                <div class="col"></div>
                <div class="col-2">
                    <a href="/show-all-post">See all post from all users</a>
                </div>
            </div>
            @foreach ($posts as $post)
            <div class="card my-3 shadow">
                <div class="card-title">
                    <div class="row mx-1">
                        <div class="col-11">
                            <h2 class="mt-2 mx-4 p-0" style="display: inline-block">{{ $post['title'] }}</h2>
                            <p style="display: inline-block">by {{ $post->userRelation->name }}</p>
                        </div>
                        <div class="col-1 px-0 mt-2">
                            <a class="mx-1" href="/edit-post/{{ $post->id }}">Edit</a>
                            <form style="display:inline-block;" action="/delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-2 mx-4">{{ $post['body'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        @else
        <div class="header m-0">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/logo.ico') }}" alt="logo" width="30" height="24"> Register | Login
                    </a>
                </div>
            </nav>
        </div>
    <div class="container">
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h1>Register</h1>
                            <form action="/register" method="POST">
                                @csrf
                                <input name="name" type="text" class="form-control mb-2" placeholder="Name">
                                <input name="email" type="text" class="form-control mb-2" placeholder="Email">
                                <input name="password" type="password" class="form-control mb-2" placeholder="Password">
                                <button class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h1>Login</h1>
                            <form action="/login" method="POST">
                                @csrf
                                <input name="loginName" type="text" class="form-control mb-2" placeholder="Name">
                                <input name="loginPassword" type="password" class="form-control mb-2" placeholder="Password">
                                <button class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>