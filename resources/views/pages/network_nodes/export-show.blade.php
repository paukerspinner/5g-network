<?php
    $numberFailTarget = 0;
    foreach ($network_node->evaluations as $evaluation) {
        if ($evaluation->value < 70) {
            $numberFailTarget += 1;
        }
    }
?>

@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="mb-4">{{ $network_node->address }}</h3>
                        <h4 class="mb-4">Chất lượng đạt: 
                            @if ($network_node->enable_embb)
                                {{ 'EMBB' }}
                            @else
                                <small class="text-danger">không đạt chất lượng</small>
                            @endif
                            @if ($network_node->enable_mmtc)
                                {{ ', MMTC'}}
                            @endif
                            @if ($network_node->enable_urllc)
                                {{ ', URLLC.'}}
                            @endif
                        </h4>
                        @if ($numberFailTarget > 0)
                            <div class="table-responsive">
                                <table id="recent-purchases-listing" class="table">
                                    <thead>
                                        <tr class="table-info text-center">
                                            <th>Tiêu chí chưa đạt</th>
                                            <th>Giá trị {{ count($network_node->evaluations) == 0 }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($network_node->evaluations as $evaluation)
                                        @if ($evaluation->value < 70)
                                            <tr>
                                                <td>{{ $evaluation->label }}</td>
                                                <td class="text-center">{{ $evaluation->value }}</td>
                                            </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-success">* Tất cả các tiêu chí đạt chuẩn</p>
                        @endif
                        
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