<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductProperties;
use DB;
use Exception;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unique_name' => 'required',
            'price' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $product = Product::create($request->all());

            foreach ($request->file('files') as $file) {
                $newImgName = time() . '.' . $file->extension();
                $file->move(public_path() . '/uploads/img/', $newImgName);

                ProductProperties::create(['product_id' => $product->id, 'image' => $newImgName]);
            }

            DB::commit();
            return response()->json(['status' => 'success']);

        } catch (Exception $exception) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $exception->getMessage()], 400);
        }
    }

    public function search($q)
    {
        $query = Product::query();

        if ($this == $that) {
            $query = $query->where('this', 'that');
        }

        if ($this == $another_thing) {
            $query = $query->where('this', 'another_thing');
        }

        if ($this == $yet_another_thing) {
            $query = $query->orderBy('this');
        }

        $results = $query->get();

        $products = Product::where('name', 'like', "%{$q}%")->get();
        return response()->json($products);
    }
}
