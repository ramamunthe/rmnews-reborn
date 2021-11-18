<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::orderBy('id', 'desc')->paginate(5),
            'categories' => Category::all()
        ];
        return view('admin.post', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ];
        return view('admin.post_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $attr = $request->all();
        $imgpath = $request->file('image')->store('images', 'public');
        $attr['image'] = $imgpath;
        $attr['slug'] = Str::slug(request('title'));
        $post = Post::create($attr);
        $post->tags()->attach(request('tags'));
        session()->flash('success', 'Post added successfully!');
        return redirect()->to(route('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'post' => $post
        ];
        return view('admin.post_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'categories' => Category::all(),
            'post' => $post,
            'tags' => Tag::all(),
        ];

        return view('admin.post_edit', $data);
    }


    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $attr = $request->all();

        if (request()->file('image')) {
            Storage::delete($post->image);
            $imgpath = $request->file('image')->store('images', 'public');
        } else {
            $imgpath = $post->image;
        }
        $attr['slug'] = Str::slug(request('title'));
        $attr['image'] = $imgpath;
        $post->update($attr);
        $post->tags()->sync(request('tags'));
        session()->flash('success', 'Post update successfully!');
        return redirect()->to(route('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'Post deleted successfully!');
        return redirect()->to(route('post'));
    }
    public function uploadImage(Request $request)
    {

        $imgpath = $request->file('file')->store('images', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
