<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Show</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('posts.index')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('posts.index')}}">Main Page</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

  <div class="container w-70 mt-4">
      <div>
          <h3> {{$post->title}} <a href="{{route('posts.edit',$post->id)}}" >Edit</a></h3>
          <p>{{$post->content}}</p>
      </div>

      <form action="{{route('posts.destroy',$post->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">DELETE</button>
      </form>
      <br>
      <div class="container d-flex">
      @foreach($post->comments as $comment)
              <div class="card" style="width: 18rem;">
                  <div class="card-body">
                      @if($comment->image)
                          <img height="120px" src="{{asset('/storage/images/comments/'.$comment->image)}}" class="card-img-top" alt="-">
                      @endif
                      <a class="btn btn-info mt-3" href="{{route('comments.edit',$comment->id)}}">{{$comment->text}}</a>
                      <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button  class="btn btn-secondary mt-3" type="submit">remove comment {{$comment->text}}</button>
                      </form>
                  </div>
              </div>

      @endforeach
      </div>
      <br>

      <div class="container mt-4">
          <p>Add comment</p>
          <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <textarea name="text" cols="20" rows="2"></textarea>
              <input name="post_id" value="{{$post->id}}" type="hidden">
              <div class="mb-3 w-50">
                  <label for="formFileMultiple" class="form-label">Image</label>
                  <input class="form-control" name="image" type="file" id="formFileMultiple" multiple>
              </div>
              <button class="btn btn-secondary" type="submit">Save</button>

          </form>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>
