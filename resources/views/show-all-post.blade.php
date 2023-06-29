<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <x-header/>
    <div class="container">
        <div class="all-posts shadow p-3 mt-4">
            <h3 class="mt-2" style="text-shadow: 0 2px 2px rgba(0, 0, 0, .5);">All Posts</h3>
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
                    <hr>
                    <div class="comment-section p-3" style="background-color:rgb(241, 241, 241);">
                        <div class="d-grid">
                            <h4 class="mx-auto">Comments</h4>
                        </div>
                        <div class="comments">
                            @auth
                            @if($post->postComments->count() > 0)
                                @foreach($post->postComments as $comment)
                                    <div class="my-1 p-3 shadow-sm" style="border:1px solid lightgray; border-radius: 3px;">
                                        <p class="fw-bold my-0">{{$comment->User->name }}</p>
                                        <p class="fst-italic my-0 mx-3">{{ $comment->comment }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p>No comments</p>
                            @endif
                            @endauth
                        </div>
                        <form action="/show-all-post/{{ $post->id }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="comment" class="form-control" placeholder="comment...">
                                <button class="btn btn-primary">Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>