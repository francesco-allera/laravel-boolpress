<?php

namespace App\Http\Controllers;

use App\Author;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /* INDEX */
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    /* CREATE */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('post.create', compact('authors', 'tags'));
    }

    /* STORE */
    public function store(Request $request)
    {
        $path = $request->file('picture')->store('public');
        dd($path);
        $data = $request->all();

        if (!Author::find($data['author_id'])) dd('Errore nell\'id autore');

        $this->formValidation($request);

        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();

        $newPost->tags()->attach($data ['tags']);

        $postStored = Post::orderBy('id', 'desc')->first();

        return redirect()->route('posts.show', $postStored);
    }

    /* SHOW */
    public function show(Post $post)
    {
        $comments = DB::table('comments')->where('post_id', $post->id)->get();

        return view('post.show', compact('post', 'comments'));
    }


    /* Forms Validator */
    private function formValidation(Request $request)
    {
        $request->validate([
            'author_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'text' => 'required|string|max:100',
            'picture' => 'required|string|max:2048',
            'tags' => 'required|min:1'
        ]);
    }
}
