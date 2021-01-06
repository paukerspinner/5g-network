@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-8 m-auto grid-margin stretch-card">
                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="card-title">Xuất dữ liệu</h4>
                        <form class="forms-sample" action="/network-nodes/export" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Điểm cần xuất dữ liệu</label>
                                    <select name="network_node_id" class="form-control" required>
                                        @foreach($network_nodes as $network_node)
                                            <option value="{{$network_node->id}}">{{ $network_node->address }}</option>
                                        @endforeach
                                    </select>
                              </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary text-center">Xuất dữ liệu</button>
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