<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images', 'variants')->get();

        return view('pages.product.index', [
            'type_menu' => 'product',
            'products' => $products,
        ]);
    }

    public function create(Request $request)
    {
        $parentCategories = Category::whereNull('parent_id')->get();

        return view('pages.product.create', [
            'type_menu' => 'product',
            'parentCategories' => $parentCategories,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/product_images', $imageName);
                $productImage = ProductImage::create([
                    'product_id' => $product->id,
                    'path' => 'product_images/' . $imageName,
                ]);
                $uploadedImages[] = $productImage;
            }
        }

        $variants = $request->variant;

        foreach ($variants as $variantData) {
            ProductVariant::create([
                'product_id' => $product->id,
                'variant_name' => $variantData['name'],
                'price' => $variantData['price'],
                'stock' => $variantData['stock'],
            ]);
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
