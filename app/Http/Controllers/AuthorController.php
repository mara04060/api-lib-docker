<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\User;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\BookRequest;



class AuthorController extends Controller
{
    /**
     * @param User $user_id
     * @return mixed
     */
    public function index()
    {
            $author = Author::all();
            return response()->json($author);

    }

    /**
     * @param int $author_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function author_in_books(int $author_id)
    {
        $book = Book::where('author_id', $author_id)->get();
        return response()->json($book, 200);
    }


}
