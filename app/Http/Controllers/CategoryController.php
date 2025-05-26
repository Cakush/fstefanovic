<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function add()
    {
        $user = Auth::user();
        if ($user->role->name !== 'admin') {
            return view('product-list');
        }
        return view('category-add');
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        if ($user->role->name !== 'admin') {
            return view('product-list');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('product.list')->with('success', 'Kategorija je uspešno dodata!');
    }

    public function delete(Request $request){
        $user = Auth::user();
        if ($user->role->name !== 'admin') {
            return view('product-list');
        }

        return view('category-delete', [
            "category" => $request->category
        ]);
    }

    public function destroy(Request $request){
    $user = Auth::user();
    if ($user->role->name !== 'admin') {
        return view('product-list');
    }

    $request->validate([
        'category_id' => 'required|exists:categories,id',
    ]);

    $category = Category::findOrFail($request->category_id);

    if ($category->products()->count() > 0) {
        return redirect()->route('category.delete')->with('error', 'Ne možete obrisati kategoriju koja ima proizvode.');
    }

    $category->delete();

    return redirect()->route('product.list')->with('success', 'Kategorija je uspešno obrisana!');
    }
}
