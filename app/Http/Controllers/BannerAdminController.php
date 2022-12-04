<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerAddRequest;
use App\Models\Banner;
use App\Traits\deleteModelTrait;
use App\Traits\StorageImageTraits;
use AWS\CRT\Log;
use Illuminate\Http\Request;

class BannerAdminController extends Controller
{
    use deleteModelTrait;
    use StorageImageTraits;

    private $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function index()
    {
        $banners = $this->banner->latest()->paginate(5);
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.add');
    }

    public function store(BannerAddRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'descriptions' => $request->descriptions
            ];
            $dataImageBanner = $this->storageTraitUpload($request, 'image_path', 'banner');
            if (!empty($dataImageBanner)) {
                $dataInsert['image_name'] = $dataImageBanner['file_name'];
                $dataInsert['image_path'] = $dataImageBanner['file_path'];
            }
            $this->banner->create($dataInsert);
            return redirect()->route('banner.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $banner = $this->banner->find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        try {
            $datUpdate = [
                'name' => $request->name,
                'descriptions' => $request->descriptions
            ];
            $dataImageBanner = $this->storageTraitUpload($request, 'image_path', 'banner');
            if (!empty($dataImageBanner)) {
                $datUpdate['image_name'] = $dataImageBanner['file_name'];
                $datUpdate['image_path'] = $dataImageBanner['file_path'];
            }
            $this->banner->find($id)->update($datUpdate);
            return redirect()->route('banner.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->banner);
    }
}
