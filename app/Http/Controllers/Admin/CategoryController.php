<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Carbon::now()->timestamp . '-' . Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/categories/'), $imageName);
            }
            Category::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'image' => $imageName,
            ]);
            return redirect()->route('admin.categories.index');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            if ($request->hasFile('image')) {
                if (File::exists('uploads/categories/' . $category->image) && $category->image != null) {
                    unlink('uploads/categories/' . $category->image);
                }
                $image = $request->file('image');
                $imageName = Carbon::now()->timestamp . '-' . Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/categories/'), $imageName);

                $category->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $imageName,
                ]);
            }
            return redirect()->route('admin.categories.index');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (File::exists('uploads/categories/' . $category->image) && $category->image != null) {
            unlink('uploads/categories/' . $category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
