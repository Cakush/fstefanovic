<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list(){
        return view("product-list", [
            "products" => Product::all(),
            "current_user" => Auth::user(),
        ]);
    }

    public function contact(){
        return view('contact');
    }

    public function add(){
        return view("product-create", [
            "categories" => Category::all()
        ]);
    }

    public function create(Request $request){

            $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        
        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->category_id = $validated['category_id'];
        $product->user_id = Auth::id();
        $product->price = $validated['price'];
        $product->save();

        return redirect()->route('product.list')->with('success', 'Proizvod je uspešno sačuvan!');
    }

    public function edit($id){
        $user = Auth::user();
        if ($user->role->name !== 'admin' && $user->role->name !== 'edit') {
            return view('product-list');
        }

        $product = Product::find($id);

        return view("product-edit", [
            "product" => $product,
            "categories" => Category::all()
        ]);
    }

    public function update(Request $request, $id){

        $user = Auth::user();
        if ($user->role->name !== 'admin' && $user->role->name !== 'edit') {
            return view('product-list');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::find($id);
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->category_id = $validated['category_id'];
        $product->save();

        return redirect()->route('product.list')->with('success', 'Proizvod je uspešno izmenjen!');
    }

    public function delete($id){

        $user = Auth::user();
        if ($user->role->name !== 'admin') {
            return view('product-list');
        }

        return view("product-delete",[
            "product" => Product::find($id)
        ]);
    }

    public function destroy($id){
        $user = Auth::user();
        if ($user->role->name !== 'admin') {
            return view('product-list');
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.list')->with('success', 'Proizvod je uspešno obrisan!');
    }

    public function single($id){
    $product = Product::with(['comments.user', 'category'])->findOrFail($id);
    return view("product-single", [
        "product" => $product
    ]);
}
}
