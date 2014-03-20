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

    function show($title, $body) {
        var instance = new Notification(
            $title, {
                body: $body
            }
        );

        instance.onclick = function () {
            // Something to do
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

    $(document).ready(function() {

        $(window).on('focus', function(event) {
            $('.show-focus-status > .alert-danger').addClass('hidden');
            $('.show-focus-status > .alert-success').removeClass('hidden');
        }).on('blur', function(event) {
                $('.show-focus-status > .alert-success').addClass('hidden');
                $('.show-focus-status > .alert-danger').removeClass('hidden');
            });

        $('.date-picker').each(function () {
            var $datepicker = $(this),
                cur_date = ($datepicker.data('date') ? moment($datepicker.data('date'), "YYYY/MM/DD") : moment()),
                format = {
                    "weekday" : ($datepicker.find('.weekday').data('format') ? $datepicker.find('.weekday').data('format') : "dddd"),
                    "date" : ($datepicker.find('.date').data('format') ? $datepicker.find('.date').data('format') : "MMMM Do"),
                    "year" : ($datepicker.find('.year').data('year') ? $datepicker.find('.weekday').data('format') : "YYYY")
                };

            function updateDisplay(cur_date) {
                $datepicker.find('.date-container > .weekday').text(cur_date.format(format.weekday));
                $datepicker.find('.date-container > .date').text(cur_date.format(format.date));
                $datepicker.find('.date-container > .year').text(cur_date.format(format.year));
                $datepicker.data('date', cur_date.format('YYYY/MM/DD'));
                $datepicker.find('.input-datepicker').removeClass('show-input');
            }

            updateDisplay(cur_date);

            $datepicker.on('click', '[data-toggle="calendar"]', function(event) {
                event.preventDefault();
                console.log('Yes Babeh');
                $datepicker.find('.input-datepicker').toggleClass('show-input');
            });

            $datepicker.on('click', '.input-datepicker > .input-group-btn > button', function(event) {
                event.preventDefault();

                var $input = $(this).closest('.input-datepicker').find('input'),
                    date_format = ($input.data('format') ? $input.data('format') : "YYYY/MM/DD");
                if (moment($input.val(), date_format).isValid()) {
                    updateDisplay(moment($input.val(), date_format));
                }else{
                    alert('Invalid Date');
                }
            });

            $datepicker.on('click', '[data-toggle="datepicker"]', function(event) {
                event.preventDefault();

                var cur_date = moment($(this).closest('.date-picker').data('date'), "YYYY/MM/DD"),
                    date_type = ($datepicker.data('type') ? $datepicker.data('type') : "days"),
                    type = ($(this).data('type') ? $(this).data('type') : "add"),
                    amt = ($(this).data('amt') ? $(this).data('amt') : 1);

                if (type == "add") {
                    cur_date = cur_date.add(date_type, amt);
                }else if (type == "subtract") {
                    cur_date = cur_date.subtract(date_type, amt);
                }

                updateDisplay(cur_date);
            });

            if ($datepicker.data('keyboard') == true) {
                $(window).on('keydown', function(event) {
                    if (event.which == 37) {
                        $datepicker.find('span:eq(0)').trigger('click');
                    }else if (event.which == 39) {
                        $datepicker.find('span:eq(1)').trigger('click');
                    }
                });
            }

        });
    });


    $(function(){
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
        var positions = ['h1','h2',':','m1','m2',':','s1','s2'];
        var digit_holder = clock.find('.digits');

        $.each(positions, function() {
            if(this == ':')
                digit_holder.append('<div class="dots">');
            else {
                var pos = $('<div>');
                for(var i = 1; i < 8; i++)
                    pos.append('<span class="d' + i + '">');
                digits[this] = pos;
                digit_holder.append(pos);
            }
        });

        var weekday_names = 'MON TUE WED THU FRI SAT SUN'.split(' '),
            weekday_holders = clock.find('.weekdays');
        $.each(weekday_names, function(){
            weekday_holders.append('<span>' + this + '</span>');
        });

        var weekdays = clock.find('.weekdays span');

        (function update_time(){
            var now = moment().format('hhmmssdA');
            digits.h1.attr('class', digit_to_name[now[0]]);
            digits.h2.attr('class', digit_to_name[now[1]]);
            digits.m1.attr('class', digit_to_name[now[2]]);
            digits.m2.attr('class', digit_to_name[now[3]]);
            digits.s1.attr('class', digit_to_name[now[4]]);
            digits.s2.attr('class', digit_to_name[now[5]]);

            var dow = now[6];
            dow--;
            if(dow < 0)
                dow = 6;
            weekdays.removeClass('active').eq(dow).addClass('active');
            ampm.text(now[7]+now[8]);
            if(alarm_counter > 0){
                alarm_counter--;
                alarm.addClass('active');
            } else if(alarm_counter == 0){
                time_is_up.fadeIn();
                show('Up','timeis');
                alarm_counter--;
                alarm.removeClass('active');
            } else {
                alarm.removeClass('active');
            }
            setTimeout(update_time, 1000);
        })();

        $('#switch-theme').click(function(){
            clock.toggleClass('light dark');
        });

        $('.alarm-button').click(function(){
            dialog.trigger('show');
        });

        dialog.find('.close').click(function(){
            dialog.trigger('hide');
        });

        dialog.click(function(e){
            if($(e.trigger).is('.overlay')){
                dialog.trigger('hide');
            }
        });

        alarm_set.click(function(){
            var valid = true, after = 0,
                to_seconds = [3600, 60, 1];
            dialog.find('input').each(function(i){
                if(this.validity && !this.validity.valid){
                    valid = false;
                    this.focus();
                    return false;
                }
                after += to_seconds[i] * parseInt(parseInt(this.value));
            });
            if(!valid){
                alert('Please enter a valid number!');
                return;
            }
            if(after < 1){
                alert('Please choose a time in the future!');
                return ;
            }
            alarm_counter = after;
            dialog.trigger('hide');
        });

        alarm_clear.click(function(){
            alarm_counter = -1;
            dialog.trigger('hide');
        });

        dialog.on('hide', function(){
            dialog.fadeOut();
        }).on('show', function(){
                var hours = 0, minutes = 0; seconds = 0, tmp = 0;
                if(alarm_counter > 0){
                    tmp = alarm_counter;

                    hours = Math.floor(tmp/3600);
                    tmp = tmp%3600;

                    minutes = Math.floor(tmp/3600);
                    tmp = tmp%3600;

                    seconds = tmp;
                }

                dialog.find('input').eq(0).val(hours).end().eq(1).val(minutes).end().eq(2).val(seconds);
                dialog.fadeIn();
            });
        time_is_up.click(function(){
            time_is_up.fadeOut();
        });
    });




</script>

<style>
/*************
===The Clock===
**************/
#clock {
    width: 370px;
    padding: 40px;
    margin: 200px auto 60px;
    position: relative;
}

#clock:after {
    content:'';
    position: absolute;
    width: 400px;
    height: 20px;
    border-radius: 100%;
    left: 50%;
    margin-left: -200px;
    bottom: 2px;
    z-index: -1;
}

#clock .display {
    text-align: center;
    padding: 40px 20px 20px;
    border-radius: 6px;
    position: relative;
    height: 54px;
}

/*************
===Light theme===
**************/
#clock.light{
    background-color: #f3f3f3;
    color: #272e38;
}

#clock.light:after{
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

#clock.light .digits div span{
    background-color:#272e38;
    border-color: #272e38;
}

#clock.light .digits div.dots:before,
#clock.light .digits div.dots:after{
    background-color: #272e38;
}

#clock.light .alarm{
    background: url('../img/alarm_light.jpg');
}

#clock.light .display{
    background-color: #dddddd;
    box-shadow: 0 1px 1px rgba(0,0,0,0.08) inset, 0 1px 1px #fafafa;
}

/*************
===Dark theme===
**************/
#clock.dark{
    background-color: #272e38;
    color: #cacaca;
}

#clock.dark:after{
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

#clock.dark .digits div span{
    background-color:#cacaca;
    border-color: #cacaca;
}

#clock.dark .digits div.dots:before,
#clock.dark .digits div.dots:after{
    background-color: #cacaca;
}

#clock.dark .alarm{
    background: url('../img/alarm_dark.jpg');
}

#clock.dark .display{
    background-color: #0f1620;
    box-shadow: 0 1px 1px rgba(0,0,0,0.08) inset, 0 1px 1px #2d3642;
}

/*************
===The Digits===
**************/
#clock .digits div{
    text-align: left;
    position: relative;
    width: 28px;
    height: 50px;
    display: inline-block;
    margin: 0 4px;
}

#clock .digits div span{
    opacity: 0;
    position: absolute;
    -webkit-transition:0.25s;
    -moz-transition:0.25s;
    transition:0.25s;
}

#clock .digits div span:before,
#clock .digits div span:after{
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    border: 5px solid transparent;
}

/*Days*/
#clock .digits .d1{			height:5px;width:16px;top:0;left:6px;}
#clock .digits .d1:before{	border-width:0 5px 5px 0;border-right-color:inherit;left:-5px;}
#clock .digits .d1:after{	border-width:0 0 5px 5px;border-left-color:inherit;right:-5px;}

#clock .digits .d2{			height:5px;width:16px;top:24px;left:6px;}
#clock .digits .d2:before{	border-width:3px 4px 2px;border-right-color:inherit;left:-8px;}
#clock .digits .d2:after{	border-width:3px 4px 2px;border-left-color:inherit;right:-8px;}

#clock .digits .d3{			height:5px;width:16px;top:48px;left:6px;}
#clock .digits .d3:before{	border-width:5px 5px 0 0;border-right-color:inherit;left:-5px;}
#clock .digits .d3:after{	border-width:5px 0 0 5px;border-left-color:inherit;right:-5px;}

#clock .digits .d4{			width:5px;height:14px;top:7px;left:0;}
#clock .digits .d4:before{	border-width:0 5px 5px 0;border-bottom-color:inherit;top:-5px;}
#clock .digits .d4:after{	border-width:0 0 5px 5px;border-left-color:inherit;bottom:-5px;}

#clock .digits .d5{			width:5px;height:14px;top:7px;right:0;}
#clock .digits .d5:before{	border-width:0 0 5px 5px;border-bottom-color:inherit;top:-5px;}
#clock .digits .d5:after{	border-width:5px 0 0 5px;border-top-color:inherit;bottom:-5px;}

#clock .digits .d6{			width:5px;height:14px;top:32px;left:0;}
#clock .digits .d6:before{	border-width:0 5px 5px 0;border-bottom-color:inherit;top:-5px;}
#clock .digits .d6:after{	border-width:0 0 5px 5px;border-left-color:inherit;bottom:-5px;}

#clock .digits .d7{			width:5px;height:14px;top:32px;right:0;}
#clock .digits .d7:before{	border-width:0 0 5px 5px;border-bottom-color:inherit;top:-5px;}
#clock .digits .d7:after{	border-width:5px 0 0 5px;border-top-color:inherit;bottom:-5px;}

/*Numbers*/
/* 1 */

#clock .digits div.one .d5,
#clock .digits div.one .d7{
    opacity:1;
}

/* 2 */

#clock .digits div.two .d1,
#clock .digits div.two .d5,
#clock .digits div.two .d2,
#clock .digits div.two .d6,
#clock .digits div.two .d3{
    opacity:1;
}

/* 3 */

#clock .digits div.three .d1,
#clock .digits div.three .d5,
#clock .digits div.three .d2,
#clock .digits div.three .d7,
#clock .digits div.three .d3{
    opacity:1;
}

/* 4 */

#clock .digits div.four .d5,
#clock .digits div.four .d2,
#clock .digits div.four .d4,
#clock .digits div.four .d7{
    opacity:1;
}

/* 5 */

#clock .digits div.five .d1,
#clock .digits div.five .d2,
#clock .digits div.five .d4,
#clock .digits div.five .d3,
#clock .digits div.five .d7{
    opacity:1;
}

/* 6 */

#clock .digits div.six .d1,
#clock .digits div.six .d2,
#clock .digits div.six .d4,
#clock .digits div.six .d3,
#clock .digits div.six .d6,
#clock .digits div.six .d7{
    opacity:1;
}


/* 7 */

#clock .digits div.seven .d1,
#clock .digits div.seven .d5,
#clock .digits div.seven .d7{
    opacity:1;
}

/* 8 */

#clock .digits div.eight .d1,
#clock .digits div.eight .d2,
#clock .digits div.eight .d3,
#clock .digits div.eight .d4,
#clock .digits div.eight .d5,
#clock .digits div.eight .d6,
#clock .digits div.eight .d7{
    opacity:1;
}

/* 9 */

#clock .digits div.nine .d1,
#clock .digits div.nine .d2,
#clock .digits div.nine .d3,
#clock .digits div.nine .d4,
#clock .digits div.nine .d5,
#clock .digits div.nine .d7{
    opacity:1;
}

/* 0 */

#clock .digits div.zero .d1,
#clock .digits div.zero .d3,
#clock .digits div.zero .d4,
#clock .digits div.zero .d5,
#clock .digits div.zero .d6,
#clock .digits div.zero .d7{
    opacity:1;
}

/*Dots*/
#clock .digits div.dots{
    width: 5px;
}

#clock .digits div.dot:before,
#clock .digits div.dot:after{
    width: 5px;
    height: 5px;
    content: '';
    position: absolute;
    left: 0;
    top: 14px;
}

#clock .digits div.dots:after{
    top: 34px;
}

/*************
===The Alarm===
**************/
#clock .alarm{
    width: 16px;
    height: 16px;
    bottom: 20px;
    background: url('../img/alarm_light.jpg');
    position: absolute;
    opacity: 0.2;
}
#clock .alarm.active{
    opacity: 1;
}

/*************
===Weekdays===
**************/
#clock .weekdays{
    font-size: 12px;
    position: absolute;
    width: 100%;
    top: 10px;
    left: 0;
    text-align: center;
}

#clock .weekdays span{
    opacity: 0.2;
    padding: 0 10px;
}

#clock .weekedays span.active{
    opacity: 1;
}
/*************
====AM/PM====
**************/
#clock .ampm{
    position: absolute;
    bottom: 20px;
    right: 20px;
    font-size: 12px;
}
/*************
====Button====
**************/
.button-holder{
    text-align: center;
    padding-bottom: 100px;
}

a.button{
    background-color: #f6a7b3;
    background-image:-webkit-linear-gradient(top,#f6a7b3,#f0a3af);
    background-image:-moz-linear-gradient(top,#f6a7b3,#f0a3af);
    background-image:linear-gradient(top,#f6a7b3,#f0a3af);

    border: 1px solid #eb9ba7;
    border-radius: 2px;

    box-shadow: 0 2px 2px #ccc;

    color: #fff;
    text-decoration: none !important;
    padding-bottom: 15px 20px;
    display: inline-block;
    cursor: pointer;

    position: relative;
    z-index: 1;
}
a.button:hover{
    opacity: 0.9;
}

.alarm-button{
    width: 44px;
    height: 42px;
    vertical-align: middle;
    margin-left: -6px;
    margin-right: -44px;
    display: inline-block;
    background: url('../img/alarm_btn.png');
    position: relative;
    z-index: 0;
    cursor:pointer;
}
/*******************
====Alarm Dialog====
********************/
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button{
    display: none;
}

.overlay{
    display: none;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.2);
    z-index: 10;
}

#alarm-dialog,
#time-is-up{
    width: 500px;
    height: 375px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
    position: fixed;
    top: 200px;
    left: 50%;
    margin-left: -250px;
    text-align: center;
}

#alarm-dialog h2{
    text-transform: uppercase;
    font-size: 18px;
    color: #5e6268;
    padding: 50px 0;
}

#alarm-dialog label {
    text-transform: uppercase;
    background-color: #f4f4f4;
    width: 80px;
    height: 62px;
    font-size: 11px;
    display: inline-block;
    padding: 10px;
    margin: 4px;
}

#alarm-dialog label input{
    display: block;
    border: 0;
    font: inherit;
    font-size: 17px;
    padding: 6px;
    outline: none;
    text-align: center;
    width: 59px;
    margin-left: 10px auto;
    background-color: #fff;
}

#alarm-dialog .button-holder{
    padding-top: 50px;
    padding-bottom: 0;
}

#alarm-dialog .button-holder .button{
    box-shadow: 0 2px 2px #eee;
    padding: 13px 22px;
    margin: 3px;
}

.button.blue{
    background-color:#82cddd;
    background-image:-webkit-linear-gradient(top, #86d3e4, #82cddd);
    background-image:-moz-linear-gradient(top, #86d3e4, #82cddd);
    background-image:linear-gradient(top, #86d3e4, #82cddd);
    border-color:#72c1d2;
}

#alarm-dialog .close{
    width: 36px;
    height: 36px;
    background: url('../img/close.png');
    position: absolute;
    top: -18px;
    right: -18px;
    cursor: pointer;
}

#time-is-up{
    height: 240px;
}

#time-is-up h2{
    padding: 60px 0 40px;
    font-size: 30px;
}

#time-is-up .button{
    padding: 12px 20px;
    box-shadow: 0 2px 2px #eee;
}
</style>

<a href="#" onclick="return show('IEM Katowice','Fnatic VS SK Gaming \ntwitch.tv/esltv_cs')">Notify me!</a>
<a href="#" onclick="window.webkitNotifications.requestPermission();">Notify me!</a>

<div id="clock" class="light">
    <div class="display">
        <div class="weekdays"></div>
        <div class="ampm"></div>
        <div class="alarm"></div>
        <div class="digits"></div>
    </div>
</div>

<div class="button-holder">
    <a id="switch-theme" class="button">Dark/Light</a>
    <a class="alarm-button"></a>
</div>

<div class="overlay">
    <div id="alarm-dialog">
        <h2>Set alarm after</h2>
        <label class="hours">
            Hours
            <input type="number" value="0" min="0"/>
        </label>
        <label class="minutes">
            Minutes
            <input type="number" value="0" min="0"/>
        </label>
        <label class="seconds">
            Seconds
            <input type="number" value="0" min="0"/>
        </label>
        <div class="button-holder">
            <a id="alarm-set" class="button blue">Set</a>
            <a id="alarm-clear" class="button red">Clear</a>
        </div>
        <a class="close"></a>
    </div>
</div>

<div class="overlay">
    <div id="time-is-up">
        <h2>Time's up!</h2>
        <div class="button-holder">
            <a class="button blue">Close</a>
        </div>
    </div>
</div>


<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
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
        width:100%;
    }
    .date-picker .input-datepicker.show-input {
        display: table;
    }

    @media (min-width: 768px) and (max-width: 1010px) {
        .date-picker h2{
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
</style>

<div class="row">
    <div class="col-sm-5 pull-right">
        <div class="date-picker"  data-date="2014/09/02" data-keyboard="true">
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
<div class="row">
    <div class="col-md-10 col-md-offset-1">
            @foreach ($broadcasts as $broadcast)
            <tr class="{{ ($broadcast->isActive() ? 'active' : '') }}">
                <td><a href="game/{{ $broadcast->game->id }}">{{ $broadcast->game->name }}</a></td>
                <td>{{ $broadcast->title }}</td>
                <td>{{ $broadcast->start_at }}</td>
                <td>{{ $broadcast->end_at }}</td>
            </tr>
            @endforeach

    </div>
</div>

<div class="row">
    <div class="col-md-2" style="height: 120px; line-height: 120px; text-align: center; font-size: 36px; font-weight: 800; border-right: 5px solid #ddd; background-color: #f0f0f0; color: #444; font-family: Cuprum, Arial;">
        CS:GO
    </div>
    <div class="col-md-8" style="background-color: #f0f0f0; color: #444; font-family: Cuprum, Arial;  height: 120px; border-right: 5px solid #ddd;">
        <h2 style="text-align:center;">IEM Katowice</h2>
        <div class="row">
            <div class="col-md-6" style="font-family: Cuprum, Arial; font-size: 20px; text-align: right;">Fnatic</div>
            <div class="col-md-6" style="font-family: Cuprum, Arial; font-size: 20px; ">SK Gaming</div>
        </div>
    </div>
    <div class="col-md-2 glyphicon glyphicon-remove" style="background-color: darkred; border-left: 5px #ddd; color: #ddd; font-size:60px; text-align: center; line-height: 120px;height: 120px;">
    </div>
</div>

<div class="row" style="margin-top: 20px;">
    <div class="col-md-2" style="height: 120px; line-height: 120px; text-align: center; font-size: 36px; font-weight: 800; border-right: 5px solid #ddd; background-color: #f0f0f0; color: #444; font-family: Cuprum, Arial;">
        LoL
    </div>
    <div class="col-md-8" style="background-color: #f0f0f0; color: #444; font-family: Cuprum, Arial;  height: 120px;border-right: 5px solid #ddd;">
        <h2 style="text-align:center;">IEM Katowice</h2>
        <div class="row">
            <div class="col-md-6" style="font-family: Cuprum, Arial; font-size: 20px; text-align: right;">Fnatic</div>
            <div class="col-md-6" style="font-family: Cuprum, Arial; font-size: 20px; ">SK Gaming</div>
        </div>
    </div>
    <div class="col-md-2 glyphicon glyphicon-ok" style="background-color: forestgreen; border-left: 5px #ddd; color: #ddd; font-size:60px; text-align: center; line-height: 120px;height: 120px;">
    </div>
</div>

<div class="row" style="margin-top: 20px;">
    <div class="col-md-2" style="height: 120px; line-height: 120px; text-align: center; font-size: 36px; font-weight: 800; border-right: 5px solid #ddd; background-color: #f0f0f0; color: #444; font-family: Cuprum, Arial;">
        SC2
    </div>
    <div class="col-md-8" style="background-color: #f0f0f0; color: #444; font-family: Cuprum, Arial;  height: 120px;border-right: 5px solid #ddd;">
        <h2 style="text-align:center;">IEM Katowice</h2>
        <div class="row">
            <div class="col-md-6" style="font-family: Cuprum, Arial; font-size: 20px; text-align: right;">Fnatic</div>
            <div class="col-md-6" style="font-family: Cuprum, Arial; font-size: 20px; ">SK Gaming</div>
        </div>
    </div>
    <div class="col-md-2 glyphicon glyphicon-ok" style="background-color: forestgreen; border-left: 5px #ddd; color: #ddd; font-size:60px; text-align: center; line-height: 120px;height: 120px;">
    </div>
</div>

<!--
	The delete button uses Resftulizer.js to restfully submit with "Delete".  The "action_confirm" class triggers an optional confirm dialog.
	Also, I have hardcoded adding the "disabled" class to the Admin group - deleting your own admin access causes problems.
-->
@stop

