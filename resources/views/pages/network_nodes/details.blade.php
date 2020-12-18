<?php
    $numberSuccessTarget = 0;
    foreach ($network_node->evaluations as $evaluation) {
        if ($evaluation->value >= 70) {
            $numberSuccessTarget += 1;
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
                    <h3 class="mb-4">{{$network_node->address}}</h3>
                    <div class="table-responsive">
                        <table id="recent-purchases-listing" class="table text-center">
                            <thead>
                                <tr class="table-info">
                                    <th>STT</th>
                                    <th>Tiêu chí</th>
                                    <th>Giá trị</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($network_node->evaluations as $key => $evaluation)

                                    <tr class="{{ $evaluation->value >= 70 ? 'table-success' : ''}}">
                                        <td>{{$key + 1}}</td>
                                        <td>{{ $evaluation->label }}</td>
                                        <td>{{ $evaluation->value }}%</td>
                                    </tr>
                                @endforeach
                                <tr class="table-info">
                                    <th></th>
                                    <th>Tổng số tiêu chí đạt</th>
                                    <th>{{ $numberSuccessTarget }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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