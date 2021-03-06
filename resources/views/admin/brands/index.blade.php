@extends('admin.layout-admin')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $title }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('main-content')
<div class="row">
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('admin.brand.create') }}" class="btn btn-sm btn-success">Add Brand</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th style="width: 80px">Image</th>
              <th>Brand</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($brands as $brand)
              <tr>
                <td>{{ $brand->id }}</td>
                <td>
                  <img src="{{ asset('admins/uploads/images/' . $brand->image) }}" 
                  alt="{{ $brand->image }}"
                  style="width: 80px">
                </td>
                <td>{{ $brand->name }}</td>
                <td style="width: 100px; text-align: center;">
                  @if ($brand->status === 1)
                    <a href="javascript:void(0)" 
                    class="btn btn-sm btn-secondary isActive" 
                    data-id="{{ $brand->id }}"
                    data-status="0">Actived</a>
                  @else
                    <a href="javascript:void(0)" 
                    class="btn btn-sm btn-default isActive"
                    data-id="{{ $brand->id }}"
                    data-status="1">Deactive</a>
                  @endif
                </td>
                <td style="width: 140px; text-align: center;">
                  <a href="javascript:void(0);" 
                  class="btn btn-sm btn-danger btnDelete" 
                  data-id="{{ $brand->id }}">Delete</a>
                  <a href="" class="btn btn-sm btn-primary">Edit</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        {{ $brands->links() }}
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
@endsection

@push('script')
  <script>
      let urlDelBrand = "{{ route('admin.brand.delete') }}";
      let IsActiveBrand = "{{ route('admin.brand.is.active') }}";
  </script>
  <script src="{{ asset('admins/js/admin/brands.js') }}"></script>
@endpush
