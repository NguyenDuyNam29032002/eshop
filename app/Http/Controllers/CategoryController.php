<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recursive;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $htmlOptions = $this->getCategory($parent_id = '');
        return view('category.add', compact('htmlOptions'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function getCategory($parentID)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOptions = $recursive->categoryRecursive($parentID);
        return $htmlOptions;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOptions = $this->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'htmlOptions'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
