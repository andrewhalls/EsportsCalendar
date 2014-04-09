<?php namespace GamingCalendar\Controllers\API;

use GamingCalendar\Repos\Game\GameRepository;
use View;
use Input;
use Redirect;
use Session;
use Validator;

/**
 * Class GameController
 * @package GamingCalendar\controllers
 */
class GameController extends \BaseController
{

    /**
     * @param GameRepository $repository
     */
    public function __construct(GameRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of Games
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Show the form for creating a new Game
     *
     * @return Response
     */
    public function create()
    {
        $game = $this->repository->instance();

        return View::make('admin.games.create')
            ->with(compact('game'));
    }

    /**
     * Store a newly created Game in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->repository->create($data);

        return Redirect::route('admin.games.index')
            ->with('success', 'Game Created.');
    }

    /**
     * Display the specified Game.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Show the form for editing the specified Game.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $game = $this->repository->find($id);

        return View::make('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $game = $this->repository->findOrFail($id);

        $validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $game->update($data);

        return Redirect::route('admin.games.index')
            ->with('success', 'Game Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);

        return Redirect::route('admin.games.index')
            ->with('success', 'Game Deleted.');
    }
}
