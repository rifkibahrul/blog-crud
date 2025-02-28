<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('date', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => now(),
            'username' => Auth::user()->username,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::user()->role == 'author' && Auth::user()->username !== $post->username) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki izin untuk mengedit post ini.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);

        if (Auth::user()->role == 'author' && Auth::user()->username !== $post->username) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki izin untuk mengedit post ini.');
        }

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::user()->role == 'author' && Auth::user()->username !== $post->username) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki izin untuk menghapus post ini.');
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}
