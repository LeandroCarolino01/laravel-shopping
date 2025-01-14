<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Book;

class BookController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        return view('products', compact('books'));
     
    }

    public function bookCart() {
        return view('cart');
    }

    public  function addBooktoCart($id){
        $book = Book::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $book->name,
                "quantity" => 1,
                "price" => $book->price,
                "image" => $book->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Book has been added');
    }

    public function deleteProduct(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted');
        }
    }
}
