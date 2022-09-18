<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request){
        if ($request->hasFile('image')){
            $des_path = 'public/images/comments';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($des_path,$image_name);

            $request['image'] = $image_name;
            if (!$request->input('text')) {
                Comment::create([
                    'image' => $image_name,
                    'post_id' => $request->input('post_id'),
                ]);
            }else{
                Comment::create([
                    'text' => $request->input('text'),
                    'post_id' => $request->input('post_id'),
                    'image' => $image_name
                ]);
            }
        }else{
            Comment::create([
                'text' => $request->input('text'),
                'post_id' => $request->input('post_id'),
            ]);
        }
        return redirect()->back()->with('message','Comment is created');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        return view("comments.edit",['comment'=>$comment]);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->update([
            'text' => $request->input('text'),
        ]);

        return redirect()->route('posts.show',$comment->id);
    }
    public function destroy($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('message','Comment is deleted');
    }

}
