@extends('layouts.app')
@section('title')
    XDMMS
@endsection
@section('content')
    <div class="col-md-12" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Calendar <small>Click to add/edit events</small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Calendar Events <small>Sessions</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div id='calendar'></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
                </div>
                <div class="modal-body">
                    <div id="testmodal" style="padding: 5px 20px;">
                        <form id="antoform" class="form-horizontal calender" role="form">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary antosubmit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel2">活动详情</h4>
                </div>
                <div class="modal-body">

                    <div id="testmodal2" style="padding: 5px 20px;">
                        <form id="antoform2" class="form-horizontal calender" role="form">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">活动名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title2" name="title2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">组织</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="company" name="company">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">场地</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="position" name="position">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">负责人</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user_name" name="user_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">开始时间</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="event_start" name="event_start">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">结束时间</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="event_end" name="event_end">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->

@endsection

@section('js')

    <script src="{{ asset('/vendors/moment/min/moment-with-locales.js') }}"></script>
    <script src="{{ asset('/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script>
        function init_calendar() {

            if (typeof ($.fn.fullCalendar) === 'undefined') {
                return;
            }
            console.log('init_calendar');

            var date = new Date(),
                d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear(),
                started,
                categoryClass;

            var calendar = $('#calendar').fullCalendar({
                locale:'zh_cn',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    $('#fc_create').click();

                    started = start;
                    ended = end;

                    $(".antosubmit").on("click", function () {
                        var title = $("#title").val();
                        if (end) {
                            ended = end;
                        }

                        categoryClass = $("#event_type").val();

                        if (title) {
                            calendar.fullCalendar('renderEvent', {
                                    title: title,
                                    start: started,
                                    end: end,
                                    allDay: allDay
                                },
                                true // make the event "stick"
                            );
                        }

                        $('#title').val('');

                        calendar.fullCalendar('unselect');

                        $('.antoclose').click();

                        return false;
                    });
                },
                eventClick: function (calEvent, jsEvent, view) {
                    $('#fc_edit').click();
                    $('#title2').val(calEvent.title);
                    $('#position').val(calEvent.position);
                    $('#user_name').val(calEvent.user_name);
                    $('#company').val(calEvent.company);
                    $('#event_start').val(calEvent.event_start);
                    $('#event_end').val(calEvent.event_end);

                    categoryClass = $("#event_type").val();

                    $(".antosubmit2").on("click", function () {
                        calEvent.title = $("#title2").val();

                        calendar.fullCalendar('updateEvent', calEvent);
                        $('.antoclose2').click();
                    });

                    calendar.fullCalendar('unselect');
                },
                editable: false,
                events: [
                    @foreach($events as $event)
                    {
                        title: '{{ $event->event_name }}',
                        <?php
                            $event_start = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$event->event_start);
                            $sy = $event_start->year;
                            $sm = $event_start->month;
                            $sd = $event_start->day;
                            $sh = $event_start->hour;
                            $st = $event_start->minute;
                                
                            ?>
                        start: new Date({{$sy}}, {{$sm-1}},{{ $sd }}, {{$sh}},{{$st}}),
                        <?php
                            $event_end = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$event->event_end);
                            $ey = $event_end->year;
                            $em = $event_end->month;
                            $ed = $event_end->day;
                            $eh = $event_end->hour;
                            $et = $event_end->minute;
                            ?>
                        end: new Date({{$ey}}, {{$em-1}},{{ $ed }}, {{$eh}},{{$et}}),
                        company: '{{$event->company}}',
                        user_name: '{{$event->user_name}}',
                        event_start: '{{ $event_start->toDayDateTimeString() }}',
                        event_end: '{{ $event_end->toDayDateTimeString() }}',
                        position: '{{ $event->position }}'
                    },
                    @endforeach
                    ]
            });

        };
        init_calendar();
    </script>

@endsection

@section('css')
    <link href="{{ asset('/vendors/fullcalendar/dist/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/fullcalendar/dist/fullcalendar.print.css') }}" rel="stylesheet" media="print">
@endsectio
