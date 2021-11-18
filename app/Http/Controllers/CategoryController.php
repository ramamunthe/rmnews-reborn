<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $data = [
            'categories' => Category::orderBy('id', 'desc')->paginate(5),

        ];
        return view('admin.category', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $attr = $request->all();;
        $attr['slug'] = Str::slug(request('title'));
        Category::create($attr);
        session()->flash('success', 'Category added successfully!');
        return redirect()->to(route('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $attr = $request->all();;
        $attr['slug'] = Str::slug(request('title'));
        $category->update($attr);
        session()->flash('success', 'Category update successfully!');
        return redirect()->to(route('category'));
    }


    public function destroy(Category $category)
    {
        $post = Post::where('category_id', $category->id)->first();
        if ($post === null) {
            $category->delete();
        } else {
            Storage::delete($post->image);
            $post->tags()->detach();
            $post->delete();
        };


        session()->flash('success', 'Category deleted successfully!');
        return redirect()->to(route('category'));
    }
}
