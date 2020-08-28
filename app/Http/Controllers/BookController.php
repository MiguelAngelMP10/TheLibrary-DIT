<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Http\Requests\CreateUpdateRequest;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = Book::query();

        if ($request->has("buscarPor")) {
            if ($request->has("valorBusqueda")) {
                $buscarPor =  $request->input('buscarPor');
                $valorBusqueda = $request->input('valorBusqueda');
                if ($buscarPor == 'mostrarTodos') {
                    $builder = Book::query();
                } else {
                    $operador = is_numeric($valorBusqueda) ? '=' : 'like';
                    $busqueda = is_numeric($valorBusqueda) ? $valorBusqueda : "%$valorBusqueda%";
                    $builder->where($buscarPor, $operador, $busqueda);
                }
            }
        }

        $books = $builder->paginate();
        return view('Books.index', ['Books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Books.create', [
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateRequest $request)
    {

        try {
            $book = new Book();

            $book->name = $request->name;
            $book->author = $request->author;
            $book->publishedDate = $request->publishedDate;
            $book->category_id = $request->category_id;
            $book->user_id = $request->user_id;
            $book->statusPrestamo = $request->statusPrestamo;

            $book->save();
            return redirect()->route('book.index')->with('success', 'Registro añadido correctamente');
        } catch (QueryException $e) {
            return redirect()->route('book.index')->with('danger', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Books.show', ['book' => Book::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Books.edit', [
            'book' => Book::find($id),
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \$id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateRequest $request, $id)
    {
        try {
            Book::where('id', '=', $id)
                ->update([
                    'name' => $request->name,
                    'author' => $request->author,
                    'publishedDate' => $request->publishedDate,
                    'category_id' => $request->category_id,
                    'user_id' => $request->user_id,
                    'statusPrestamo' => $request->statusPrestamo
                ]);

            return redirect()->route('book.index')->with('success', 'Registro actualizo correctamente');
        } catch (QueryException $e) {
            dd($request->author);
            return redirect()->route('book.index')->with('danger', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        alert()->success('Registro eliminado con éxito')->showConfirmButton('Aceptar');
        return redirect()->route('book.index');
    }
}