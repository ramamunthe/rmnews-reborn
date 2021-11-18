<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tags' => Tag::orderBy('id', 'desc')->paginate(5),

        ];
        return view('admin.tag', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $attr = $request->all();;
        $attr['slug'] = Str::slug(request('title'));
        Tag::create($attr);
        session()->flash('success', 'Tag added successfully!');
        return redirect()->to(route('tag'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $attr = $request->all();;
        $attr['slug'] = Str::slug(request('title'));
        $tag->update($attr);
        session()->flash('success', 'Tag update successfully!');
        return redirect()->to(route('tag'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->posts()->detach();
        $tag->delete();
        session()->flash('success', 'Tag deleted successfully!');
        return redirect()->to(route('tag'));
    }
}
