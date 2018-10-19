<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')
            ->orderBy('name', 'asc')
            ->get();

        $view = view('categories/index', [
            'categories' => $categories
        ]);

        return $view;
    }

    public function create()
    {
        $category = new Category;

        return view('categories/edit')->with(compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
 
        return view('categories/edit')->with(compact('category'));
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => "required|unique:categories,name,{$id},id"
        ]);
         
        $category = Category::findOrNew($id);
         
        $category->fill($request->only([
            'name'
        ]));
         
        $category->save();
         
        session()->flash('success_message', 'The category was successfully saved.');
         
        return redirect()->route('categories.edit', ['id' => $category->id]);
        
    }
}
