<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Productcode;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // ajax code

    public function getProductcodesByCategory($category_id)
    {
        $productcodes = Productcode::where('category_id', $category_id)->select('id', 'product_code')->get();

        return response()->json($productcodes);
    }

    public function getProductcodeDetails($id)
    {
        $product = Productcode::findOrFail($id);

        return response()->json([
            'product_name' => $product->product_name,
            'pcs_per_bundle' => $product->pcs_per_bundle,
            'pcs_m_per_kg' => $product->pcs_m_per_kg,
        ]);
    }

    public function addcatagory()
    {
        $categories = Category::all();

        return view('inventory.catagory')->with(compact('categories'));
    }

    public function storecatagory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->only('name'));

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function addproductcode()
    {
        $catagories = Category::all();
        $productcode = Productcode::with('category')->get();

        return view('inventory.productcode')->with(compact('catagories', 'productcode'));
    }

    public function storeProductcode(Request $request)
    {
        // dd($request->all());
       
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_code' => 'required|unique:productcodes,product_code',
            'product_name' => 'required|string|max:255',
            'pcs_per_bundle' => 'required|string|max:255',
            'pcs_or_kg' => 'required|string|max:255',
        ]);
        // dd($validate);

        Productcode::create([
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'pcs_per_bundle' => $request->pcs_per_bundle,
            'pcs_m_per_kg' => $request->pcs_or_kg,
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function addproduct()
    {
        $categories = Category::all();

        return view('inventory.addproduct')->with(compact('categories'));
    }

    public function storeproduct(Request $request)
    {
        // Validate
        $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'product_id'      => 'required|exists:productcodes,id',
            'length_rmt'      => 'nullable|numeric',
            'quantity_pcs'    => 'nullable|integer',
            'quantity_rmt'    => 'nullable|numeric',
            'no_bundles'      => 'nullable|string',
            'in_kg'           => 'nullable|numeric',
            'purchase_price'  => 'nullable|numeric',
            'gst'             => 'nullable|numeric',
            'hsn_code'        => 'nullable|string',
            'selling_price'   => 'nullable|numeric',
            'total_price'     => 'nullable|numeric',
            'low_stock'       => 'nullable|integer',
        ]);

         $product = Product::create($request->all());

         return redirect()->route('product.add');
    }

    public function listproduct()
    {
        $products = Product::with('category','productcode')->get();
        return view('inventory.productlist')->with(compact('products'));
    }

    public function supplyorder()
    {
        return view('inventory.supplyorder');
    }
}
