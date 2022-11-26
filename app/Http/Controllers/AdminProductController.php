<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Category;
use App\Traits\StorageImageTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    use StorageImageTraits;
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $htmlOptions = $this->getCategory($parent_id = '');
        return view('admin.product.add', compact('htmlOptions'));
    }

    public function getCategory($parentID)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOptions = $recursive->categoryRecursive($parentID);
        return $htmlOptions;
    }

    public function store(Request $request)
    {
        $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');

        dd($dataUpload);
    }

}
