<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\StoreBookRequest;
use http\Exception;
use Illuminate\Database\QueryException;


class BookController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['all_book', 'base64_to_file']]);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $user_id = auth()->user()->id;
        if($user_id > 0) {
            $book = Book::where('user_id', $user_id)->get();
            if(empty($book->toArray())) {
                return response()->json([],404);
            }
            return response()->json($book);
        }
        return response()->json(['Error 404'],404);
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
        try {
            $book = Book::create($arr_req);
        } catch ( QueryException $e) {
            return response()->json(['Error Create new book'], 400);
        }
        return response()->json($book, 201);
    }


    /**
     * @param StoreBookRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreBookRequest $request, int $id)
    {
        if(!empty($id)) {
            $book = $this->findBook($id);
            if(!empty($book)) {
                $arr_req = $request->validated();
                if(!empty($arr_req)) {
                    $arr_req['book_cover'] = $this->base64_to_file($arr_req['book_cover'] );
                }
                $book->fill($arr_req);
                $book->save();
                return response()->json($book);
            }

        }
        return response()->json('Not Found Book', 404);

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if(!empty($id)) {
            $book = $this->findBook($id);
            if(!empty($book)) {
                unlink(env('PATH_IMAGE').$book->book_cover);
                if($book->delete()) return response(null, 204);
            }
        }
        return response('Not Found Book', 404);
    }

    /**
     * @param $base64_string
     * @return string
     */
    protected function base64_to_file($base64_string) {
        $output_file = md5("".rand(1,999).time().date("ssiihhDDmmYYYY").rand(1,999)).".png";
        $ifp = fopen(env('PATH_IMAGE').$output_file, "w");
        chmod(''.env('PATH_IMAGE').$output_file, 0777);
        $data = explode(',', $base64_string);
        fwrite($ifp, base64_decode($data[0]));
        fclose($ifp);
        return $output_file;
    }

    /**
     * @param int $id
     * @return mixed
     */
    protected function findBook(int $id) {
        $book = Book::find($id);
        if(empty($book)){
            return null;
        }
        return $book;
    }
}
