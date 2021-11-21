<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['post_date'] = Carbon::now();

        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        $post->save();

        //Prima di poter creare un collegamento con la tabella ponte devo creare e salvare il post (e il suo id) e poi... 
        if(array_key_exists('tags', $data)) $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();

        //Per poter visualizzare i tags come array nella edit svolgiamo la "logica" nel controller
        //Convert the collection to an array of tag ids to use it in the edit.
        $tagIds = $post->tags->pluck('id')->toArray();

        return view('admin.posts.edit', compact('post', 'tags', 'tagIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data['post_date'] = Carbon::now();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        $post->update();

        // Se ci sono dei tags popolati if(array_key_exists('tags', $data)), prendili (post->tags())
        // e inseriscili come UNICI valori possibili dentro al nostro ogetto sync($data['tags'])
        if(array_key_exists('tags', $data)) $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->tags) $post->tags()->detach();

        $post->delete();
        
        return redirect()->route('admin.posts.index')
            ->with('deleted_title', $post->title)->with('alert_message', "The post \"$post->title\" was deleted successfully.");
    }
}
