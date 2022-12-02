<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerAddRequest;
use Illuminate\Http\Request;

class BannerAdminController extends Controller
{
    public function index()
    {
        return view('admin.banner.index');
    }
    public function create()
    {
        return view('admin.banner.add');
    }
    public function store(BannerAddRequest $request)
    {
        dd('1');
    }
}
