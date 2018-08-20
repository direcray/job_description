@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">修改工作說明</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                        <form method="post" action="{{action('JobDescriptionController@update', $id)}}" >
                            {{csrf_field()}}
                            <!--<input name="_method" type="hidden" value="PATCH">-->
                            <div class="form-group">
                                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                                <label for="name">姓名:</label>
                                <input type="text" class="form-control" name="name" value="{{$job_description->name}}" />
                            </div>
                            <div class="form-group">
                                <label for="emdn">EMDN:</label>
                                <input type="text"  class="form-control" name="emdn" value="{{$job_description->emdn}}" />
                            </div>
                            <div class="form-group">
                                <label for="job_date">登錄日:</label>
                                <input type="text"  class="form-control" name="job_date" value="{{$job_description->job_date}}" />
                            </div>
                            <div class="form-group">
                                <label for="start_date">開始日:</label>
                                <input type="text"  class="form-control" name="start_date" value="{{$job_description->start_date}}" />
                            </div>
                            <div class="form-group">
                                <label for="department">部門:</label>
                                <input type="text"  class="form-control" name="department" value="{{$job_description->department}}" />
                            </div>
                            <div class="form-group">
                                <label for="title">職稱:</label>
                                <input type="text"  class="form-control" name="title" value="{{$job_description->title}}" />
                            </div>
                            <div class="form-group">
                                <label for="level">階級:</label>
                                <input type="text"  class="form-control" name="level" value="{{$job_description->level}}" />
                            </div>
                            <div class="form-group">
                                <label for="substitute">代理人:</label>
                                <input type="text"  class="form-control" name="substitute" value="{{$job_description->substitute}}" />
                            </div>
                            <button type="submit" class="btn btn-primary">確認修改</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
