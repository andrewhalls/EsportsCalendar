<?php namespace GamingCalendar\Controllers;

use GamingCalendar\Repos\Team\TeamRepository;

/**
 * Class TeamController
 * @package GamingCalendar\controllers
 */
class TeamController extends \BaseController
{

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of Teams
     *
     * @return Response
     */
    public function index()
    {
        $broadcast = $this->repository->all();

        return View::make('team.index', compact('team'));
    }

    /**
     * Show the form for creating a new Team
     *
     * @return Response
     */
    public function create()
    {
        return View::make('teams.create');
    }

    /**
     * Store a newly created Team in storage.
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

        return Redirect::route('teams.index');
    }

    /**
     * Display the specified Team.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $teams = $this->repository->findOrFail($id);

        return View::make('teams.show', compact('teams'));
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $teams = $this->repository->find($id);

        return View::make('teams.edit', compact('teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $raffle = $this->repository->findOrFail($id);

        $validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $raffle->update($data);

        return Redirect::route('teams.index');
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

        return Redirect::route('teams.index');
    }

}