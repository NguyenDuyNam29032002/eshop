<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use App\Models\Menu;
use App\Traits\deleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    use deleteModelTrait;

    private $menuRecursive;
    private $menu;

    public function __construct(MenuRecursive $menuRecursive, Menu $menu)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->paginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menus.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('menus.index');
    }

    public function edit(Request $request, $id)
    {
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecursive->menuRecursiveEdit($menuFollowIdEdit->parent_id);
        return view('admin.menus.edit', compact('optionSelect', 'menuFollowIdEdit'));
    }

    public function update(Request $request, $id)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('menus.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->menu);
    }
}
