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

            <form method="post" action="{{url('/create/job_description')}}">
            <div class="card">
                <div class="card-header">基本資料</div>

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            
                            <input type="text" class="form-control" name="name" placeholder="姓名"/>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="job_date" placeholder="登錄日"/>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="emdn" placeholder="EMDN"/>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="start_date" placeholder="開始日期"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="department" placeholder="部門"/>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="title" placeholder="職稱"/>
                        </div>
                        <div class="form-group col-md-3">
                            <!--<label for="level">階級:</label>-->
                            <input type="text" class="form-control" name="level" placeholder="階級"/>
                        </div>
                        <div class="form-group col-md-3">
                            <!--<label for="substitute">職代:</label>-->
                            <input type="text" class="form-control" name="substitute" placeholder="職代"/>
                        </div>
                    </div>
                </div>
            </div>
            <br><input type="button" class="btn btn-primary add_row" id="add_row" value="新增一項工作說明"><br><br>
            <div class="card" style="margin-bottom: 30px;">
                <div class="card-header">工作說明資料</div>

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="type[]">類型:</label>
                            <input type="text" class="form-control" name="type[]" placeholder="職務/每日/每週/每月/每季/每年/目標/其他"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="category[]">類別:</label>
                            <input type="text" class="form-control" name="category[]" placeholder="執行/稽查/規劃/管理/其他"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="depart[]">部門:</label>
                            <input type="text" class="form-control" name="depart[]" placeholder="部門"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="is_used[]">角色:</label>
                            <select class="form-control" name="role[]">
                                <option value="A">當責</option>
                                <option value="R">負責</option>
                                <option value="C">被諮詢</option>
                                <option value="I">被知會</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="subject[]">主題:</label>
                            <input type="text" class="form-control" name="subject[]" placeholder="主題"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="description[]">說明:</label>
                            <textarea class="form-control" name="description[]" placeholder="說明"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="target[]">目標:</label>
                            <input type="text" class="form-control" name="target[]" placeholder="目標"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="result[]">達成率:</label>
                            <input type="text" class="form-control" name="result[]" placeholder="達成率"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="is_used[]">是否使用:</label>
                            <select class="form-control" name="is_used[]">
                                <option value="Y">是</option>
                                <option value="N">否</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="note[]">備註:</label>
                            <textarea class="form-control" name="note[]" placeholder="備註"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <input type="button" class="btn btn-primary add_row" id="add_row1" value="新增一項工作說明"><br><br>
            <button type="submit" class="btn btn-primary">新增</button>
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
          return false;
        });
    });
</script>
@endsection
