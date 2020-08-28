<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class CategoryController extends Controller
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
    public function index()
    {
        $categories =  Category::paginate();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateCategoryRequest $request)
    {
        try {
            $category = new Category();

            $category->name = $request->name;
            $category->description = $request->description;

            $category->save();
            return redirect()->route('category.index')->with('success', 'Registro añadido correctamente');
        } catch (QueryException $e) {
            return redirect()->route('category.index')->with('danger', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('categories.show', ['category' => Category::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('categories.edit', ['category' => Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Id
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            Category::where('id', '=', $id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description
                ]);
            return redirect()->route('category.index')->with('success', 'Registro actualizo correctamente');
        } catch (QueryException $e) {
            return redirect()->route('category.index')->with('danger', $e->getMessage());
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
        Category::find($id)->delete();
        alert()->success('Registro eliminado con éxito')->showConfirmButton('Aceptar');
        return redirect()->route('category.index');
    }
}