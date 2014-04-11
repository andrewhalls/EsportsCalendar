@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Broadcasts
@stop

{{-- Content --}}
@section('content')


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script>
    var Notification = window.Notification || window.mozNotification || window.webkitNotification;

    Notification.requestPermission(function (permission) {
        // console.log(permission);
    });

    function show($title, $body, $icon, $url) {
        var instance = new Notification(
            $title, {
                body: $body,
                icon: $icon
            }
        );

        instance.onclick = function () {
            window.open(
                $url,
                '_blank' // <- This is what makes it open in a new window.
            );
        };
        instance.onerror = function () {
            // Something to do
        };
        instance.onshow = function () {
            // Something to do
        };
        instance.onclose = function () {
            // Something to do
        };

        return false;
    }

    $(document).ready(function () {

        $(window).on('focus',function (event) {
            $('.show-focus-status > .alert-danger').addClass('hidden');
            $('.show-focus-status > .alert-success').removeClass('hidden');
        }).on('blur', function (event) {
                $('.show-focus-status > .alert-success').addClass('hidden');
                $('.show-focus-status > .alert-danger').removeClass('hidden');
            });

        $('.date-picker').each(function () {
            var $datepicker = $(this),
                cur_date = ($datepicker.data('date') ? moment($datepicker.data('date'), "YYYY/MM/DD") : moment()),
                format = {
                    "weekday": ($datepicker.find('.weekday').data('format') ? $datepicker.find('.weekday').data('format') : "dddd"),
                    "date": ($datepicker.find('.date').data('format') ? $datepicker.find('.date').data('format') : "MMMM Do"),
                    "year": ($datepicker.find('.year').data('year') ? $datepicker.find('.weekday').data('format') : "YYYY")
                };

            function updateDisplay(cur_date) {
                $datepicker.find('.date-container > .weekday').text(cur_date.format(format.weekday));
                $datepicker.find('.date-container > .date').text(cur_date.format(format.date));
                $datepicker.find('.date-container > .year').text(cur_date.format(format.year));
                $datepicker.data('date', cur_date.format('YYYY/MM/DD'));
                $datepicker.find('.input-datepicker').removeClass('show-input');
            }

            updateDisplay(cur_date);

            $datepicker.on('click', '[data-toggle="calendar"]', function (event) {
                event.preventDefault();
                console.log('Yes Babeh');
                $datepicker.find('.input-datepicker').toggleClass('show-input');
            });

            $datepicker.on('click', '.input-datepicker > .input-group-btn > button', function (event) {
                event.preventDefault();

                var $input = $(this).closest('.input-datepicker').find('input'),
                    date_format = ($input.data('format') ? $input.data('format') : "YYYY/MM/DD");
                if (moment($input.val(), date_format).isValid()) {
                    updateDisplay(moment($input.val(), date_format));
                } else {
                    alert('Invalid Date');
                }
            });

            $datepicker.on('click', '[data-toggle="datepicker"]', function (event) {
                event.preventDefault();

                var cur_date = moment($(this).closest('.date-picker').data('date'), "YYYY/MM/DD"),
                    date_type = ($datepicker.data('type') ? $datepicker.data('type') : "days"),
                    type = ($(this).data('type') ? $(this).data('type') : "add"),
                    amt = ($(this).data('amt') ? $(this).data('amt') : 1);

                if (type == "add") {
                    cur_date = cur_date.add(date_type, amt);
                } else if (type == "subtract") {
                    cur_date = cur_date.subtract(date_type, amt);
                }

                updateDisplay(cur_date);
            });

            if ($datepicker.data('keyboard') == true) {
                $(window).on('keydown', function (event) {
                    if (event.which == 37) {
                        $datepicker.find('span:eq(0)').trigger('click');
                    } else if (event.which == 39) {
                        $datepicker.find('span:eq(1)').trigger('click');
                    }
                });
            }

        });
    });


    $(function () {
        var clock = $('#clock'),
            alarm = clock.find('.alarm'),
            ampm = clock.find('.ampm'),
            dialog = $('#alarm-dialog').parent(),
            alarm_set = $('#alarm-set'),
            alarm_clear = $('#alarm-clear'),
            time_is_up = $('#time-is-up').parent();

        var alarm_counter = -1;
        var digit_to_name = 'zero one two three four five six seven eight nine'.split(' ');
        var digits = {};
        var positions = ['h1', 'h2', ':', 'm1', 'm2', ':', 's1', 's2'];
        var digit_holder = clock.find('.digits');

        $.each(positions, function () {
            if (this == ':')
                digit_holder.append('<div class="dots">');
            else {
                var pos = $('<div>');
                for (var i = 1; i < 8; i++)
                    pos.append('<span class="d' + i + '">');
                digits[this] = pos;
                digit_holder.append(pos);
            }
        });

        var weekday_names = 'MON TUE WED THU FRI SAT SUN'.split(' '),
            weekday_holders = clock.find('.weekdays');
        $.each(weekday_names, function () {
            weekday_holders.append('<span>' + this + '</span>');
        });

        var weekdays = clock.find('.weekdays span');


    });

</script>
<script src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script>
<script>
    var watchList = [];
    watchList[2] = true;
    var conn = new ab.Session(
        'ws://{{ Config::get("socket.host") }}:1111', // The host (our Latchet WebSocket server) to connect to
        function () { // Once the connection has been established
            conn.subscribe('test-topic', function (topic, event) {
                if (event.matchid in watchList) {
                    show(event.title, event.msg)
                }
                console.log(event);
            });
        },
        function () {
            // When the connection is closed
            console.log('WebSocket connection closed');
        },
        {
            // Additional parameters, we're ignoring the WAMP sub-protocol for older browsers
            'skipSubprotocolCheck': true
        }
    );
</script>

<a href="#" onclick="return show('IEM Katowice','Fnatic VS SK Gaming \ntwitch.tv/esltv_cs')">Notify me!</a>
<a href="#" onclick="window.webkitNotifications.requestPermission();">Notify me!</a>

<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet"
      type="text/css">
<link href="//fonts.googleapis.com/css?family=Cuprum:400italic,400,700italic,700" rel="stylesheet" type="text/css">

<style>
    body {
        background: #ddd;
    }

    .fa.pull-right {
        margin-left: 0.1em;
    }

    .date-picker,
    .date-container {
        position: relative;
        display: inline-block;
        width: 100%;
        color: rgb(75, 77, 78);
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .date-container {
        padding: 0px 65px;
    }

    .date-picker h2, .date-picker h4 {
        margin: 0px;
        padding: 0px;
        font-family: 'Roboto', sans-serif;
        font-weight: 200;
    }

    .date-container .date {
        text-align: center;
    }

    .date-picker span.glyphicon {
        position: absolute;
        font-size: 4em;
        font-weight: 100;
        padding: 8px 0px 7px;
        cursor: pointer;
        top: 0px;
    }

    .date-picker span.glyphicon[data-type="subtract"] {
        left: 0px;
    }

    .date-picker span.glyphicon[data-type="add"] {
        right: 0px;
    }

    .date-picker span[data-toggle="calendar"] {
        display: block;
        position: absolute;
        top: -7px;
        right: 45px;
        font-size: 1em !important;
        cursor: pointer;
    }

    .date-picker .input-datepicker {
        display: none;
        position: absolute;
        top: 50%;
        margin-top: -17px;
        width: 100%;
    }

    .date-picker .input-datepicker.show-input {
        display: table;
    }

    @media (min-width: 768px) and (max-width: 1010px) {
        .date-picker h2 {
            font-size: 1.5em;
            font-weight: 400;
        }

        .date-picker h4 {
            font-size: 1.1em;
        }

        .date-picker span.fa {
            font-size: 3em;
        }
    }

    .onoffswitch {
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .onoffswitch-checkbox {
        display: none;
    }

    .onoffswitch-label {
        display: block;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid #FFFFF;
        border-radius: 0px;
    }

    .onoffswitch-inner {
        width: 200%;
        height: 120px;
        margin-left: -100%;
        -moz-transition: margin 0.3s ease-in 0s;
        -webkit-transition: margin 0.3s ease-in 0s;
        -o-transition: margin 0.3s ease-in 0s;
        transition: margin 0.3s ease-in 0s;

    }

    .onoffswitch-inner:before, .onoffswitch-inner:after {
        float: left;
        width: 50%;
        padding: 0;
        font-size: 60px;
        color: white;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        line-height: 120px;
    }

    .onoffswitch-inner:before {
        content: "\e013";
        font-family: 'Glyphicons Halflings';
        background-color: #228B22;
        color: #FFFFFF;
        text-align: center;
        height: 120px;
    }

    .onoffswitch-inner:after {
        content: "\e014";
        font-family: 'Glyphicons Halflings';
        background-color: #8B0000;
        color: #FFFFFF;
        text-align: center;
        height: 120px;
    }

    .onoffswitch-switch {
        margin: 35px;
        background: #FFFFFF;
        border: 2px solid #FFFFF;
        border-radius: 0px;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 121px;
        -moz-transition: all 0.3s ease-in 0s;
        -webkit-transition: all 0.3s ease-in 0s;
        -o-transition: all 0.3s ease-in 0s;
        transition: all 0.3s ease-in 0s;
    }

    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }

    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px;
    }
</style>

<div class="row">
    <div class="col-sm-5 pull-right">
        <div class="date-picker" data-date="2014/09/02" data-keyboard="true">
            <div data-toggle="calendar" class="date-container pull-left">
                <h4 class="weekday">Monday</h4>

                <h2 class="date">Februray 4th</h2>
                <h4 class="year pull-right">2014</h4>
            </div>
            <span data-toggle="datepicker" data-type="subtract" class="glyphicon glyphicon-chevron-left"></span>
            <span data-toggle="datepicker" data-type="add" class="glyphicon glyphicon-chevron-right"></span>

            <div class="input-group input-datepicker">
                <input type="text" class="form-control" data-format="YYYY/MM/DD" placeholder="YYYY/MM/DD">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
            </div>
        </div>
    </div>
</div>

<h4>Upcoming Games</h4>

<?php

$broadcasts = [
    (object)[
        'title' => 'IEM Cologne',
        'game' => (object)[
                'name' => 'CS:GO',
                'id' => 14
            ],
        'homeTeam' => 'Fnatic',
        'awayTeam' => 'SK Gaming',
        'start_at' => '24th March',
        'end_at' => '24th March',
    ],
    (object)[
        'title' => 'IEM Katowice',
        'game' => (object)[
                'name' => 'SC2',
                'id' => 15
            ],
        'homeTeam' => 'Boxer',
        'awayTeam' => 'Squirtle',
        'start_at' => '25th March',
        'end_at' => '25th March',
    ]
];
?>
@foreach ($broadcasts as $broadcast)

<div class="row">
    <div class="col-md-2"
         style="height: 120px; line-height: 120px; text-align: center; font-size: 36px; font-weight: 800; border-right: 5px solid #ddd; background-color: #f0f0f0; color: #444; font-family: Cuprum, Arial;">
        {{ $broadcast->game->name }}
    </div>
    <div class="col-md-8"
         style="background-color: #f0f0f0; color: #444; font-family: Cuprum, Arial;  height: 120px; border-right: 5px solid #ddd;">
        <h2 style="text-align:center;">{{ $broadcast->title }}</h2>

        <div class="row">
            <div class="col-md-6" style="font-family: Cuprum, Arial; font-size: 20px; text-align: right;">Fnatic</div>
            <div class="col-md-6" style="font-family: Cuprum, Arial; font-size: 20px; ">SK Gaming</div>
        </div>
    </div>
    <div style="width: 16.6%; float: left;">
        <div class="onoffswitch">
            <input type="checkbox" name="game_{{ $broadcast->game->id }}" data-match-id="{{ $broadcast->game->id }}" class="onoffswitch-checkbox"
                   id="game_{{ $broadcast->game->id }}">
            <label class="onoffswitch-label" for="game_{{ $broadcast->game->id }}" style="width: 100%;">
                <div class="onoffswitch-inner"></div>
                <div class="onoffswitch-switch"></div>
            </label>
        </div>
    </div>
</div>
@endforeach

<script>
    $(document).on('change', 'input[type=checkbox]', function(ev){
        $this = $(this);

        console.log($this.data('matchId'));

        console.log($this.is(':checked'));
    })
</script>

@stop

