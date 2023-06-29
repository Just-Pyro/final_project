<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <x-header/>
    <div class="container">
        <div class="card shadow">
            <div class="card-title">
                <h3 class="m-3">Edit Post</h3>
            </div>
            <div class="card-body">
                <form action="/edit-post/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control mb-2">
                    <textarea name="body" class="form-control mb-2">{{ $post->body }}</textarea>
                    <button class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>