<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
    <a href="{{ route('posts.index') }}">Main Page</a>

    <div>
        <h3> {{$post->title}} <a href="{{route('posts.edit',$post->id)}}">Edit</a></h3>
        <p>{{$post->content}}</p>
    </div>

    <form action="{{route('posts.destroy',$post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">DELETE</button>
    </form>
    <br>
    @foreach($post->comments as $comment)
        <a href="{{route('comments.edit',$comment->id)}}">{{$comment->text}}</a>
        <br>
        <img height="120px" src="{{asset('/storage/images/comments/'.$comment->image)}}" alt="">

        <form action="{{route('comments.destroy',$comment->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">remove comment {{$comment->text}}</button>
        </form>
    @endforeach
<br>

    <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <textarea name="text" cols="20" rows="2"></textarea>
        <input name="post_id" value="{{$post->id}}" type="hidden">
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
            <input class="form-control" name="image" type="file" id="formFileMultiple" multiple>
        </div>
        <button type="submit">Save</button>

    </form>
</body>
</html>
