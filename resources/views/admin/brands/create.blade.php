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
          <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Brand</a></li>
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (!empty($msg))
            {!! $msg !!}
        @endif

        <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="brandName">Brand Name</label>
                                <input type="text" class="form-control" id="brandName" name="brandName">
                            </div>
                            <div class="form-group">
                                <label for="brandImg">Brand Image</label>

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="brandImg" name="brandImg">
                                        <label class="custom-file-label" for="brandImg">Choose file</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="brandStatus">Brand Status</label>
                                <select class="form-control" name="brandStatus" id="brandStatus">
                                    <option value="">Please a choose</option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div> <!-- end col-12.col-sm-12.col-md-6.col-lg-6.col-xl-6 -->
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="brandDesc">Brand Description</label>
                                <textarea class="form-control" name="brandDesc" id="brandDesc"rows="8" style="resize: none"></textarea>
                            </div>
                        </div> <!-- end col-12.col-sm-12.col-md-6.col-lg-6.col-xl-6 -->
                    </div> <!-- end .row -->
                </div> <!-- end .card-body -->
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success" id="btnAddBrand" name="btnAddBrand">Add</button>
                </div>
            </div> <!-- end .card -->
        </form> <!-- end form -->
    </div>
</div>
<!-- /.row -->
@endsection