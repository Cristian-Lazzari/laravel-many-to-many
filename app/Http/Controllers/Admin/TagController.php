<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    private $validations = [
        'name'          => 'required|string|min:5|max:100',
        'description'   => 'required|string',
    ];

    public function index()
    {
        $tags = Tag::paginate(5);

        return view('admin.tags.index', compact('tags'));
    }
    
    
    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $request->validate($this->validations);
        
        $data = $request->all();
        
        $newTag = new Tag();
        
        $newTag->name          = $data['name'];
        $newTag->description   = $data['description'];

        $newTag->save();
        
        
		return redirect()->route('admin.tags.show', ['tag' => $newTag->id]);
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }
    
    public function edit(Tag $Tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate($this->validations);
        
        $data = $request->all();

        
        $tag->name          = $data['name'];
        $tag->description   = $data['description'];

        $tag->update();
        
        
		return to_route('admin.tags.index', ['tag' => $tag]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return to_route('admin.tags.index')->with('delete_success', $tag);
    }
}
