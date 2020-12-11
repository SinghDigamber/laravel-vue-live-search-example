<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Facades\App\Repository\Posts;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {   
        return view('welcome');
    }

    public function getBooks(Request $request)
    {
        $data = Book::where('name', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data); 
    }
}
