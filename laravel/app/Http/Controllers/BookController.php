<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Jobs\SendNewBookNotification;

class BookController extends Controller
{
    public function __construct(Book $book)
    {
        $this->book = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->book->all();
        return response()->json($books, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->book->rules(), $this->book->feedback());
        //stateless

        $book = $this->book->create($request->all());
        SendNewBookNotification::dispatch($book);
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->book->find($id);
        if ($book === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($book, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = $this->book->find($id);

        if ($book === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }
        if ($request->method() === 'PATCH') {
            $dynamicRules = array();

            foreach ($book->rules() as $input => $rule) {
                if (array_key_exists($input, $request->all())) {
                    $dynamicRules[$input] = $rule;
                }
            }
            $request->validate($dynamicRules, $book->feedback());
        } else {
            $request->validate($book->rules(), $book->feedback());
        }
        $book->update($request->all());
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->book->find($id);

        if ($book === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $book->delete();
        return response()->json(['msg' => 'O livro foi removida com sucesso!'], 200);
    }
    public function lastbook()
    {
        $lastBooks = $this->book->orderByDesc('id')->take(5)->get();
        if ($lastBooks->isEmpty()) {
            return response()->json(['erro' => 'Não foi possível encontrar livros'], 404);
        }
        return response()->json($lastBooks, 200);
    }
}
