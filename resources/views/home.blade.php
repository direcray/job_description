@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">首頁</div>

                <div class="card-body">
                @if(\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8 col-md-offset-4">
                            <a href="{{url('/create/job_description')}}" class="btn btn-success">新增工作說明</a>
                            <a href="{{url('/job_descriptions')}}" class="btn btn-default">工作說明清單</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
