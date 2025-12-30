<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->isAdmin()) {
            $blogs = Blog::latest()->paginate(6);
        } else {
            $blogs = Blog::where('doctor_id', auth()->user()->doctor->id)->latest()->paginate(6);
        }
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'content'     => $request->content,
            'image'       => $imagePath,
            'doctor_id'   => auth()->user()->doctor->id ?? null,
            'is_published' => true,
        ]);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    // ✅ EDIT
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    // ✅ UPDATE
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        $blog->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog updated successfully');
    }

    // ✅ DELETE
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success', 'Blog deleted successfully');
    }
}
