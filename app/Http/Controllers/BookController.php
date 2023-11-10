<?php

namespace App\Http\Controllers;
use App\Http\Requests\BooksPostRequest;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * @throws NotFound
     */
    public function show(Book $book)
    {
        try {
            return response()->json($book);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

    }

    public function store(BooksPostRequest $request)
    {
        try {
            $data = $request->validated();
            $book = Book::create($data);
            return response()->json([
                "message" => "Book Added.",
                "book" => $book
            ],200);
        }
        catch (\Exception $e) {
            return $e;
        }

    }

    public function updateBook(BooksPostRequest $request,Book $book)
    {
        $data = $request->validated();
        if($data){
             $book->name = is_null($data['name']) ? $book->name : $data['name'];
             $book->author = is_null($data['author']) ? $book->author : $data['author'];
             $book->publish_date = is_null($data['publish_date']) ? $book->publish_date : $data['publish_date'];
             $book->user_id = Auth::user()->id;
             $book->save();
             return response()->json([
                "message" => "Book Updated.",
                "book" => $book
             ],200);
        }else{
            return response()->json([
                "message" => "Book Not Found."
            ],404);
        }
    }

    public function destroy(Book $book){
        try {
            $book->delete();
            return response()->json([
                "message" => "Book Deleted."
            ],200);
        } catch (\Exception $e) {
            return $e;
        }
    }

}
