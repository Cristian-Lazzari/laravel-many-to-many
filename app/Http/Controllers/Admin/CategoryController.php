<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // private $validations = [
    //     'name'          => 'required|string|min:5|max:100',
    //     'description'   => 'required|string',
    // ];

    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.categories.index', compact('categories'));
    }
    
    
    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        //$request->validate($this->validations);
        
        $data = $request->all();
        
        $newCategory = new Category();
        
        $newCategory->name          = $data['name'];
        $newCategory->description   = $data['description'];

        $newCategory->save();
        
        
		return redirect()->route('admin.categories.show', ['category' => $newCategory->id]);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }
    
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        //$request->validate($this->validations);
        
        $data = $request->all();

        
        $category->name          = $data['name'];
        $category->description   = $data['description'];

        $category->update();
        
        
		return to_route('admin.categories.index', ['category' => $category]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.categories.index')->with('delete_success', $category);
    }

}
