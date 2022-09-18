<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
Index
<div class="row">
    @foreach($posts as $post)
        <div class="card col-4 mx-4 mx-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></h5>
                <p class="card-text">{{$post->content}}</p>
                <img height="120px" src="{{asset('/storage/images/posts/'.$post->image)}}" alt="">
                <a href="{{route('posts.edit',$post->id)}}">Edit</a>
            </div>

        </div>
    @endforeach
</div>
<div>
    <a href="{{ route('posts.create') }}">Create Post</a>
</div>
</body>
</html>
