<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResources;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResources::collection(Post::all());
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'des'=> 'required',
        ]);

        $post = new Post([
            'title' => $request->title,
            'des' => $request->des,
        ]);
            $post->save();
            return response()->json([
                'data' => 'Data Saved Successfully'
            ]);
    }


    public function edit($id)
    {
        return new PostResources(Post::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'des'=> 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->des = $request->des;
        $post->save();
            return response()->json([
                'data' => 'Data Update successfully!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json([
            'data' => 'Data Delete successfully!'
        ]);
    }
}
