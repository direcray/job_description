@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-12">
                @if(\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">工作說明列表</div>

                <div class="card-body">
                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>姓名</td>
                                    <td>登錄日</td>
                                    <td>EMDN</td>
                                    <td>開始日</td>
                                    <td>部門</td>
                                    <td>職稱</td>
                                    <td>階級</td>
                                    <td>代理人</td>
                                    <td colspan="2">動作</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($job_descriptions as $job_description)
                                <tr>
                                    <td>{{$job_description->id}}</td>
                                    <td>{{$job_description->name}}</td>
                                    <td>{{$job_description->job_date}}</td>
                                    <td>{{$job_description->emdn}}</td>
                                    <td>{{$job_description->start_date}}</td>
                                    <td>{{$job_description->department}}</td>
                                    <td>{{$job_description->title}}</td>
                                    <td>{{$job_description->level}}</td>
                                    <td>{{$job_description->substitute}}</td>
                                    <td><a href="{{action('JobDescriptionController@edit', $job_description->id)}}" class="btn btn-primary">修改</a></td>
                                    <td>
                                        <form action="{{action('JobDescriptionController@destroy', $job_description->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">刪除</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-4">
                            <a href="{{url('/create/job_description')}}" class="btn btn-success">新增工作說明</a>
                            <a href="{{url('/job_descriptions')}}" class="btn btn-default">工作說明清單</a>
                            <button class="btn btn-danger" type="submit" onclick="$(this).hide()">消失</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
