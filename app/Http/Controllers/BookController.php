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

        $arr_req = $request->validated();
        $arr_req['book_cover'] = $this->base64_to_file($arr_req['book_cover'] );
        $book = Book::create($arr_req);
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

            $book->fill($request->only([
                'user_id',
                'name',
                'quantity_page',
                'book_cover',
                'author_id'])
            );
            $book->book_cover = $this->base64_to_file($request->validated()->book_cover);
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
            unlink(env('PATH_IMAGE').$book->book_cover);
            if($book->delete()) return response(null, 204);
        }
        return response(null, 404);
    }

    /**
     * @param $base64_string
     * @param $output_file
     * @return mixed
     */
    function base64_to_file($base64_string) {
        $output_file = md5("".rand(1,999).time().date("ssiihhDDmmYYYY").rand(1,999)).".png";
        $ifp = fopen(env('PATH_IMAGE').$output_file, "w");
        chmod(''.env('PATH_IMAGE').$output_file, 0777);
        $data = explode(',', $base64_string);
        fwrite($ifp, base64_decode($data[0]));
        fclose($ifp);
        return $output_file;
    }

}
