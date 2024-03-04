<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('images', 'categories')->paginate();
        return view('admin.products.index', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $data = $request->except('images', 'selectedCategories');
            $data['slug'] = Str::slug($request->title);
            $data['in_stock'] = $request->quantity > 0 ? 1 : 0;
            $product = Product::create($data);

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                foreach ($images as $i => $image) {
                    $imageName = $request->title . '-' . $i . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/products/' . $data['slug'] . '/'), $imageName);

                    $image = new Image;
                    $image->name = $imageName;
                    $product->images()->save($image);
                }
            }

            foreach ($request->selectedCategories as $i => $category) {
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $category
                ]);
            }

            return redirect()->route('admin.products.index');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $data = $request->except('images', 'selectedCategories');
            $data['slug'] = Str::slug($request->title);
            $data['in_stock'] = $request->quantity > 0 ? 1 : 0;
            $product->update($data);

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                foreach ($images as $i => $image) {
                    if (File::exists('uploads/products/' . $data['slug'] . '/' . $image->name) && $image->name != null) {
                        File::deleteDirectory('uploads/products/' . $data['slug']);
                    }
                    $imageName = $request->title . '-' . $i . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/products/' . $data['slug'] . '/'), $imageName);

                    $image = new Image;
                    $image->name = $imageName;
                    $product->images()->save($image);
                }
            }

            foreach ($request->selectedCategories as $i => $category) {
                ProductCategory::where('product_id', $product->id)->delete();
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $category
                ]);
            }

            return redirect()->route('admin.products.index');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Product $product)
    {
        if (!empty($product->images)) {
            $images = $product->images;
            foreach ($images as $i => $image) {
                if (File::exists('uploads/products/' . $data['slug'] . '/' . $image->name) && $image->name != null) {
                    File::deleteDirectory('uploads/products/' . $data['slug']);
                }
                $product->delete();
                return redirect()->route('admin.products.index');

            }
        }

    }
}
