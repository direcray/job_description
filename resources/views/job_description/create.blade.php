@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新增資料</div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <div class="card-body">
                    <form method="post" action="{{url('/create/job_description')}}">
                    <div class="form-group">
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            <label for="name">姓名:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="job_date">登錄日期:</label>
                            <input type="text" class="form-control" name="job_date"/>
                        </div>
                        <div class="form-group">
                            <label for="emdn">EMDN:</label>
                            <input type="text" class="form-control" name="emdn"/>
                        </div>
                        <div class="form-group">
                            <label for="start_date">開始日期:</label>
                            <input type="text" class="form-control" name="start_date"/>
                        </div>
                        <div class="form-group">
                            <label for="department">部門:</label>
                            <input type="text" class="form-control" name="department"/>
                        </div>
                        <div class="form-group">
                            <label for="title">職稱:</label>
                            <input type="text" class="form-control" name="title"/>
                        </div>
                        <div class="form-group">
                            <label for="level">階級:</label>
                            <input type="text" class="form-control" name="level"/>
                        </div>
                        <div class="form-group">
                            <label for="substitute">職代:</label>
                            <input type="text" class="form-control" name="substitute"/>
                        </div>
                        <button type="submit" class="btn btn-primary">新增</button>
                        <a href="{{url('/job_descriptions')}}" class="btn btn-default">工作說明清單</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
