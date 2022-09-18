<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('posts.update',$post->id)}}" method="post">
    @csrf
    @method('PUT')
    title: <input type="text" name="title" value="{{$post->title}}">
    content: <input type="text" name="content" value="{{$post->content}}">
    <button>Update</button>
</form>

</body>
</html>
