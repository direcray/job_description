@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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

            <div class="card">
                <div class="card-header">修改基本資料</div>

                <div class="card-body">
                    {{csrf_field()}}
                    <div class="row">                    
                        <div class="form-group col-md-3">
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            <label for="name">姓名:</label>
                            <input type="text" class="form-control" name="name" value="{{$job_description->name}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="emdn">EMDN:</label>
                            <input type="text"  class="form-control" name="emdn" value="{{$job_description->emdn}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="job_date">登錄日:</label>
                            <input type="text"  class="form-control" name="job_date" value="{{$job_description->job_date}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="start_date">開始日:</label>
                            <input type="text"  class="form-control" name="start_date" value="{{$job_description->start_date}}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="department">部門:</label>
                            <input type="text"  class="form-control" name="department" value="{{$job_description->department}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="title">職稱:</label>
                            <input type="text"  class="form-control" name="title" value="{{$job_description->title}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="level">階級:</label>
                            <input type="text"  class="form-control" name="level" value="{{$job_description->level}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="substitute">代理人:</label>
                            <input type="text"  class="form-control" name="substitute" value="{{$job_description->substitute}}" />
                        </div>
                    </div>
                </div>
            </div>
            <br><input type="button" class="btn btn-primary add_row" id="add_row" value="新增一項工作說明"><br><br>
            @foreach ($job_description_details as $detail)
            <div class="card" style="margin-bottom: 30px;">
                <div class="card-header">修改工作說明資料</div>

                <div class="card-body">
                    <input type="hidden" name="detail_id[]" value="{{$detail->id}}">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="type[]">類型:</label>
                            <input type="text" class="form-control" name="type[]" value="{{$detail->type}}" placeholder="職務/每日/每週/每月/每季/每年/目標/其他"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="category[]">類別:</label>
                            <input type="text" class="form-control" name="category[]" value="{{$detail->category}}" placeholder="執行/稽查/規劃/管理/其他"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="depart[]">部門:</label>
                            <input type="text" class="form-control" name="depart[]" value="{{$detail->department}}" placeholder="部門"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="is_used[]">角色:</label>
                            <select class="form-control" name="role[]">
                                <option value="A" {{ ($detail->role == "A" ? "selected" : "") }}>當責</option>
                                <option value="R" {{ ($detail->role == "R" ? "selected" : "") }}>負責</option>
                                <option value="C" {{ ($detail->role == "C" ? "selected" : "") }}>被諮詢</option>
                                <option value="I" {{ ($detail->role == "I" ? "selected" : "") }}>被知會</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="subject[]">主題:</label>
                            <input type="text" class="form-control" name="subject[]" value="{{$detail->subject}}" placeholder="主題"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="description[]">說明:</label>
                            <textarea class="form-control" name="description[]" placeholder="說明">{{$detail->description}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="target[]">目標:</label>
                            <input type="text" class="form-control" name="target[]" value="{{$detail->target}}" placeholder="目標"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="result[]">達成率:</label>
                            <input type="text" class="form-control" name="result[]" value="{{$detail->result}}" placeholder="達成率"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="is_used[]">是否使用:</label>
                            <select class="form-control" name="is_used[]">
                                <option value="Y" {{ ($detail->is_used == "Y" ? "selected" : "") }}>是</option>
                                <option value="N" {{ ($detail->is_used == "N" ? "selected" : "") }}>否</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="note[]">備註:</label>
                            <textarea class="form-control" name="note[]" placeholder="備註">{{$detail->note}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <input type="button" class="btn btn-primary add_row" id="add_row1" value="新增一項工作說明"><br><br>
            <button type="submit" class="btn btn-primary">確認修改</button>
            <a href="{{url('/job_descriptions')}}" class="btn btn-default">工作說明清單</a>
            </form>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".add_row").click(function() {
          $('.card:last').clone(true).insertAfter('.card:last');
          $('.card:last').find('hidden').val('');
          $('.card:last').find('input').val('');
          $('.card:last').find('textarea').val('');
          return false;
        });
    });
</script>
@endsection