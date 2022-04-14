<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBrandPost;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
class BrandController extends Controller
{
    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function index()
    {
        $data = [];
        $data['brands'] = DB::table('brands')
                        ->orderBy('created_at', 'DESC')
                        ->orderBy('status' , 'ASC')
                        ->simplePaginate(2);
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

    public function delete(Request $request)
    {
        $brandId = $request->id;
        $brandId = is_numeric($brandId) && $brandId > 0 ? $brandId : 0;
        
        $del = $this->brand->deleteBrand($brandId);
        if($del){
            return 'success';
        }
        return 'error';
    }

    public function isActive(Request $request)
    {
        // kiểm tra xử lý phải bằng ajax không?
        if($request->ajax())
        {
            $brandId = $request->brandId;
            $brandId = is_numeric($brandId) && $brandId > 0 ? $brandId : 0;
            $brandStatus = $request->brandStatus;
            $brandStatus = $brandStatus == 1 || $brandStatus == 0 ? $brandStatus : -1;

            $isActive = $this->brand->changeStatus($brandId, $brandStatus); // 1 kich hoat, 0 khong kich hoat
            if($isActive){
                return json_encode(['state' => 'success', 'status' => $brandStatus]);
            }
            return json_encode(['state' => 'error', 'status' => []]);
        }
    }
}
