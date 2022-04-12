<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBrandPost;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $data['title'] = 'Brands';
        return view('admin.brands.index', $data);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Create Brand';
        $data['msg'] = $request->session()->get('messages');
        return view('admin.brands.create', $data);
    }

    public function store(StoreBrandPost $request, Brand $brand)
    {
        // validation
        // dd($request->all());
        
        // upload file
        if($request->hasFile('brandImg'))
        {
            $file = $request->file('brandImg');
            $imageName = time() . '-' .$file->getClientOriginalName();
            $file->move(public_path('admins/uploads/images/'), $imageName);
        }

        // insert
        $insBrand = $brand->addBrand(
            $request->brandName,
            $request->brandDesc,
            $imageName,
            $request->brandStatus
        );

        // $insBrand = true;

        if($insBrand){
            $request->session()->flash('messages', '
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Thêm Thành Công!</h5>
            </div>');
            return redirect()->route('admin.brand.create');
        }
        return back()->with('messages', '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Thêm Thất Bại!</h5>
        </div>');
    }

    public function edit($id)
    {

    }

    public function update()
    {

    }

    public function delete($id)
    {

    }
}
