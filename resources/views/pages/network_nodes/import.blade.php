@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-8 m-auto grid-margin stretch-card">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="card-title">Tải lên dữ liệu</h4>
                        <form class="forms-sample" action="/network-nodes/import" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tệp dữ liệu</label>
                                <input type="file" name="file" accept=".csv" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="*.scv">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Tải lên</button>
                                    </span>
                                </div>
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="reset_data">
                                        Bạn có muốn xóa dữ liệu cũ
                                    </label>
                                </div>
                                @if($errors->has('file'))
                                    <small class="text-danger">
                                        @foreach($errors->get('file') as $file_error)
                                            {{ $file_error }}
                                        @endforeach
                                    </small>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary text-center">Lưu lại</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
    
@endsection

@section('script')

@endsection