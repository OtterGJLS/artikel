<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Posts::where('user_id', auth()->user()->id)->get()
        ]);
        dd("hasil:", $posts);
    }
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        

        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Posts::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New Posts has been added!');
    }

    public function show(Posts $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
        dd("hasil:", $post);
    }

    public function edit(Posts $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Posts $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'category_id' => 'required',
            'image' => 'image|file|max:10024',
            'body' => 'required'
        ]);


        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Posts::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Posts has been updated!');
    }

    public function destroy(Posts $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }
        Posts::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Posts has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Posts::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}