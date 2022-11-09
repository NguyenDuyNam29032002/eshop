<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recursive;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        $data = $this->category->all();
//        foreach ($data as $value) {
//            if ($value ['parent_id'] == 0) {
//                echo "<option>" . ' ' . $value['name'] . "</option>";
//
//                foreach ($data as $value2) {
//                    if ($value2['parent_id'] == $value['id']) {
//                        echo "<option>" . '-' . ' ' . $value2['name'] . "</option>";
//
//                        foreach ($data as $value3) {
//                            if ($value3['parent_id'] == $value2['id']) {
//                                echo "<option>" . '--' . ' ' . $value3['name'] . "</option>";
//                            }
//                        }
//                    }
//                }
//            }
//        }
        $recursive = new Recursive($data);
        $htmlOptions = $recursive->categoryRecursive();
        return view('category.add', compact('htmlOptions'));
    }


}
