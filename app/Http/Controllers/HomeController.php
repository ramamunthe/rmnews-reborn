<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
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
            'tanding' => Post::inRandomOrder()->limit(3)->get(),
            'categories' => Category::get()
        ];
        return view('pages.home', $data);
    }

    public function categories(Category $category)
    {
        $data = [
            'category' => $category,
            'posts' => $category->posts,
            'categories' => Category::get()
        ];
        return view('pages.show_by_category', $data);
    }

    public function search()
    {
        $query = request('query');
        $data = [
            'posts' => Post::where("title", "like", "%$query%")->latest()->paginate(3),
            'categories' => Category::get(),
            'query' => $query
        ];

        return view('pages.search', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'post' => $post,
            'lates' => Post::orderBy('id', 'desc')->limit(3)->get(),
            'categories' => Category::get()
        ];
        return view('pages.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
