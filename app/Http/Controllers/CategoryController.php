<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\HasNotificable;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use HasNotificable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);

        return view('categories.index', compact('categories'));
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
    public function store(Request $request)
    {
        $categoriaValida = $request->validate([
            'name'  => 'required|max:128|unique:categories,name',
        ]);

        if (Category::create($categoriaValida) ){
            $this->HandleNotification(message: "Categoria criada com sucesso");
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $categoriaValida = $request->validate([
            'name'  => 'required|max:128|unique:categories,name',
        ]);

        if ($category->update($categoriaValida) ){
            $this->HandleNotification(message: "Categoria editada com sucesso");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
