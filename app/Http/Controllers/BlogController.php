<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->limit(20)->get();

        // return count($blogs);
        return view('blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $image = $request->file('image');
        $baseUrl = 'http://127.0.0.1:8000/storage/images/';
        $filename = time() . '.' . auth()->user()?->id . '.' . $image->getClientOriginalExtension();
        $path = storage_path('app/public/images/' . $filename);

        Image::make($image)->resize(500, 300)->save($path);

        $blog = $user->blogs()->create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'imageUrl' => $baseUrl . $filename,
        ]);

        return redirect()->route('blogs.show', ['blog' => $blog]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::with('user')->find($id);
        return view('blogs.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required',
        ]);

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;

        if ($request->file('image')) {
            $image = $request->file('image');
            $baseUrl = 'http://127.0.0.1:8000/storage/images/';
            $filename = time() . '.' . auth()->user()?->id . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/public/images/' . $filename);

            Image::make($image)->resize(500, 300)->save($path);

            $blog->imageUrl = $baseUrl . $filename;
        }

        $blog->save();

        return redirect()->route('blogs.show', ['blog' => $blog]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return view('blogs.index');
    }
}
