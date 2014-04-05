<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * TODO Move to Service Provider
 */
App::bind('GamingCalendar\Repos\Game\GameRepository', 'GamingCalendar\Repos\Game\DbGameRepository');
App::bind('GamingCalendar\Repos\Broadcast\BroadcastRepository', 'GamingCalendar\Repos\Broadcast\DbBroadcastRepository');
App::bind('GamingCalendar\Repos\Team\TeamRepository', 'GamingCalendar\Repos\Team\DbTeamRepository');
App::bind('GamingCalendar\Repos\Genre\GenreRepository', 'GamingCalendar\Repos\Genre\DbGenreRepository');

Route::get(
    'message',
    function () {
        Latchet::publish(
            'test-topic',
            array(
                'title' => Input::get('title'),
                'msg' => Input::get('msg'),
                'matchid' => Input::get('matchid'),
            )
        );
    }
);

Route::get(
    '/',
    array(
        'as' => 'home',
        'uses' => 'GamingCalendar\Controllers\HomeController@index'
    )
);


Route::get(
    '/admin/broadcasts',
    array(
        'as' => 'admin.broadcasts.index',
        'uses' => 'GamingCalendar\Controllers\Admin\BroadcastController@index'
    )
);

Route::get(
    '/admin/games',
    array(
        'as' => 'admin.games.index',
        'uses' => 'GamingCalendar\Controllers\Admin\GameController@index'
    )
);

Route::get(
    '/admin/teams',
    array(
        'as' => 'admin.teams.index',
        'uses' => 'GamingCalendar\Controllers\Admin\TeamController@index'
    )
);

Route::get(
    '/admin/genres',
    array(
        'as' => 'admin.genre.index',
        'uses' => 'GamingCalendar\Controllers\Admin\GenreController@index'
    )
);
// Session Routes
Route::get('login', array('as' => 'login', 'uses' => 'SessionController@create'));
Route::get('logout', array('as' => 'logout', 'uses' => 'SessionController@destroy'));
Route::resource('sessions', 'SessionController', array('only' => array('create', 'store', 'destroy')));

// User Routes
Route::get('register', 'UserController@create');
Route::get('users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
Route::get(
    'resend',
    array(
        'as' => 'resendActivationForm',
        function () {
            return View::make('users.resend');
        }
    )
);
Route::post('resend', 'UserController@resend');
Route::get(
    'forgot',
    array(
        'as' => 'forgotPasswordForm',
        function () {
            return View::make('users.forgot');
        }
    )
);
Route::post('forgot', 'UserController@forgot');
Route::post('users/{id}/change', 'UserController@change');
Route::get('users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
Route::get(
    'users/{id}/suspend',
    array(
        'as' => 'suspendUserForm',
        function ($id) {
            return View::make('users.suspend')->with('id', $id);
        }
    )
);
Route::post('users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
Route::get('users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
Route::get('users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
Route::get('users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
Route::resource('users', 'UserController');
Route::resource('games', 'GamingCalendar\Controllers\GameController');

// in application/routes.php
/**
 * Broadcast
 */
Route::post(
    'broadcast',
    function () {
        $data = GamingCalendar\models\Broadcast::create(Input::all());

        return Response::make(
            $data->toJson(),
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

Route::get(
    'broadcast',
    function () {
        $broadcasts = GamingCalendar\models\Broadcast::all();
        return View::make('broadcasts.index')
            ->with(compact($broadcasts));
    }
);

Route::get(
    'broadcast/{id}',
    function ($id) {
        $data = GamingCalendar\models\Broadcast::find($id);

        if ($data == false) {
            return Response::make(json_encode(['message' => 'Sorry, we cannot find this broadcast.']), 404);
        }

        return Response::make(
            $data,
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

Route::delete(
    'broadcast/{id}',
    function ($id) {
        $data = GamingCalendar\models\Broadcast::find($id);

        if ($data == false) {
            return Response::make(
                json_encode(['status' => 'true']),
                200,
                array('Content-Type' => 'application/json')
            );
        }

        return Response::make(
            json_encode(['status' => var_export($data->delete(), true)]),
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

/**
 * Channel
 */
Route::post(
    'channel',
    function () {
        $data = GamingCalendar\models\Channel::create(Input::all());

        return Response::make(
            $data->toJson(),
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

Route::get(
    'channel',
    function () {
        $data = GamingCalendar\models\Channel::all();
        return Response::make(
            $data,
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

Route::get(
    'channel/{id}',
    function ($id) {
        $data = GamingCalendar\models\Channel::find($id);

        if ($data == false) {
            return Response::make(json_encode(['message' => 'Sorry, we cannot find this channel.']), 404);
        }

        return Response::make(
            $data,
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

Route::delete(
    'channel/{id}',
    function ($id) {
        $data = GamingCalendar\models\Channel::find($id);

        if ($data == false) {
            return Response::make(
                json_encode(['status' => 'true']),
                200,
                array('Content-Type' => 'application/json')
            );
        }

        return Response::make(
            json_encode(['status' => var_export($data->delete(), true)]),
            200,
            array('Content-Type' => 'application/json')
        );
    }
);


/**
 * Team
 */
Route::post(
    'team',
    function () {
        $data = GamingCalendar\models\Team::create(Input::all());

        return Response::make(
            $data->toJson(),
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

Route::get(
    'team',
    function () {
        $data = GamingCalendar\models\Team::all();
        return Response::make(
            $data,
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

Route::get(
    'team/{id}',
    function ($id) {
        $data = GamingCalendar\models\Team::find($id);

        if ($data == false) {
            return Response::make(json_encode(['message' => 'Sorry, we cannot find this team.']), 404);
        }

        return Response::make(
            $data,
            200,
            array('Content-Type' => 'application/json')
        );
    }
);

Route::delete(
    'team/{id}',
    function ($id) {
        $data = GamingCalendar\models\Team::find($id);

        if ($data == false) {
            return Response::make(
                json_encode(['status' => 'true']),
                200,
                array('Content-Type' => 'application/json')
            );
        }

        return Response::make(
            json_encode(['status' => var_export($data->delete(), true)]),
            200,
            array('Content-Type' => 'application/json')
        );
    }
);
// App::missing(function($exception)
// {
//     App::abort(404, 'Page not found');
//     //return Response::view('errors.missing', array(), 404);
// });


Latchet::connection('Connection');
Latchet::topic('test-topic', 'TestTopic');