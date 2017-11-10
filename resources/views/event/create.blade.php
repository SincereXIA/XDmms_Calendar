@extends('layouts.app')
@section('title')
    填写新假条
@endsection
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>请假
                            <small>Sessions</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="background: url({{ asset('/image/xidian.jfif') }}) no-repeat 100% 0">
                        <br>
                        <p style="font-weight: bold;font-size: medium">
                            XDMMS<br>（网络存根）
                        </p>
                        <hr class="clearfix col-xs-12">
                        <form class="form-horizontal form-label-left" method="post"
                              action="{{ route('event_store') }}">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">活动名称</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="event_name" type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">组织</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="company" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">负责人</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="user_name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">活动描述</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="description" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="position" class="control-label col-md-3 col-sm-3 col-xs-12">选择场地 *:</label>
                                <select id="position" name="position" class="control-label col-md-3 col-sm-3 col-xs-12" required>
                                    <option value="">Choose..</option>
                                    <option value="大活511">大活511</option>
                                    <option value="大活小剧场">大活小剧场</option>
                                </select>


                            </div>
                            <div class="form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12">开始时间</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="event_start" type="datetime-local"
                                           class="form-control has-feedback-left" id=""
                                           value="{{ Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">结束时间</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="event_end" type="datetime-local" class="form-control has-feedback-left"
                                           id=""
                                           value="{{ Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    {{ csrf_field() }}
                                    <a class="btn btn-primary" onclick="window.history.back()">返回</a>
                                    <button type="reset" class="btn btn-primary">重置</button>
                                    <button type="submit" class="btn btn-success">提交</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scrips')
@endsection
