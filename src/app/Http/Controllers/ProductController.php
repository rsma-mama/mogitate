<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Season;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        //キーワード検索
        if ($request->keyword)
        {
            $query->where('name', 'like','%' . $request->keyword . '%');
        }
        //並び替え
        if ($request->sort === 'high')
        {
            $query->orderBy('price', 'desc');
        }
        elseif($request->sort === 'low'){
            $query->orderBy('price', 'asc');
        }


        $products = $query->paginate(6)->appends($request->query());

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.register');
    }

    public function store(ProductRequest $request)
    {
        $path = $request->file('image')->store('image', 'public');
        $product= Product::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'image'=> $path,
            'description' => $request->description,
        ]);

        $product->seasons()->sync($request->season ?? []);
        
        return redirect('/products');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.detail',compact('product'));

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $seasons = Season::all();
        return view('products.update', compact('product', 'seasons'));
    }


    public function update(ProductRequest $request, $id)
    {
        
        $product = Product::findOrFail($id);
        
        if($request->hasFile('image')){
            $path = $request->file('image')->store('image', 'public');
            $product->image = $path;
        }
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            ]);
        
        $product->seasons()->sync($request->season ?? []);

        return redirect('/products')->with('success', '更新しました');
    }

    public function search(Request $request)
    {
        $products = Product::query()
        // 部分一致
        ->when($request->filled('keyword'), function($query) use ($request){
            $query->where('name', 'like', '%' . $request->keyword . '%');
        })
        // 並び替え
        ->when($request->sort === 'high', function($query){
            $query->orderBy('price', 'desc');
        })
        ->when($request->sort === 'low', function($query){
            $query->orderBy('price', 'asc');
        })
        ->paginate(6);

        return view('products.index', compact('products'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product -> delete();

        return redirect('/products');
    }
}

