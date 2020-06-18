<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\BookRequest;


//
//use http\Env\Request;
//use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * @param int $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $user_id)
    {
        if($user_id > 0) {
            $book = Book::where('user_id', $user_id)->get();
            if(empty($book->toArray())) {
//                return abort(404);
                return response()->json([],404);
            }
            return response()->json($book);
        }
        return response()->json([],404);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all_book()
    {
            $book = Book::all();
            return response()->json($book);
    }

    /**
     * @param BookRequest $request
     * @return mixed
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());
        return response()->json($book, 201);
    }

    /**
     * @param BookRequest $request
     * @param Book $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBookRequest $request, int $id)
    {
        if(!empty($id)) {

            $book = Book::findOrFail($id);
            return response()->json($request->validated()); exit();
            $book->fill($request->only([
                'user_id',
                'name',
                'quantity_page',
                'book_cover',
                'author_id'])
            );

            $book->save();
            return response()->json($book);
        }
        return response()->json('', 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if(!empty($id)) {
            $book = Book::findOrFail($id);
            if($book->delete()) return response(null, 204);
        }
        return response(null, 404);

    }
}
