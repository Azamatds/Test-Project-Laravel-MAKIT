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

<div class="container w-50 mt-5">
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputText" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputText" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputContent" class="form-label">Content</label>
            <input type="text" class="form-control" id="exampleInputContent" name="content">
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Image</label>
            <input class="form-control" name="image" type="file" id="formFileMultiple" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>

</div>



{{--<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">--}}
{{--    @csrf--}}
{{--    title: <input type="text" name="title">--}}
{{--    content: <input type="text" name="content">--}}
{{--    <div class="mb-3">--}}
{{--        <label for="formFileMultiple" class="form-label">Multiple files input example</label>--}}
{{--        <input class="form-control" name="image" type="file" id="formFileMultiple" multiple>--}}
{{--    </div>--}}
{{--    <button>Submit</button>--}}
{{--</form>--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>
