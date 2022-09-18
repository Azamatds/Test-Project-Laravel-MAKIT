<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view("posts.index",["posts"=>$posts]);
    }


    public function create()
    {
        return view("posts.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required', 'unique:posts', 'max:255'],
            'content'=>['required','max:512'],
        ]);
        $input = $request->all();
        if ($request->hasFile('image')){
            $des_path = 'public/images/posts';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($des_path,$image_name);

            $input['image'] = $image_name;
        }
        Post::create($input);
        session()->flash('message',$input['title'].'successfully saved');

//        Post::create([
//            "title"=>$request->input("title"),
//            "content"=>$request->input("content"),
//            "image"=>$input
//        ]);
        return redirect()->route('posts.index');

    }

    public function show($id)
    {
        $post =Post::find($id);
        return view("posts.show",['post'=>$post]);
    }


    public function edit($id)
    {
        $posts = Post::find($id);
        return view("posts.edit",['post'=>$posts]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post =Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
