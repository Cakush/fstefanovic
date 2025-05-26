<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function list($id)
    {
        $product = Product::findOrFail($id);
        $comments = $product->comments; 

        return view('comment-list', [
            'product' => $product,
            'comments' => $comments
        ]);
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        Comment::create([
            'comment' => $validated['comment'],
            'product_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('product.single', $id)->with('success', 'Komentar je dodat!');
    }

    public function delete($id) {
        $user = Auth::user();
        if ($user->role->name !== 'admin') {
            return view('product-list');
        }

        $comment = Comment::findOrFail($id);
        return view('comment-delete', [
            'comment' => $comment
        ]);
    }

    public function destroy($id) {
        $user = Auth::user();
        if ($user->role->name !== 'admin') {
            return view('product-list');
        }

        $comment = Comment::findOrFail($id);
        $productId = $comment->product_id;
        $comment->delete();

        return redirect()->route('product.single', $productId)->with('success', 'Komentar je uspešno obrisan!');
    }
}
