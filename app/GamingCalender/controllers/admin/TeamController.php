<?php namespace GamingCalendar\Controllers\Admin;

use GamingCalendar\Repos\Team\TeamRepository;
use View;
use Redirect;
use Validator;

/**
 * Class TeamController
 * @package GamingCalendar\controllers
 */
class TeamController extends \BaseController
{

    /**
     * @param TeamRepository $repository
     */
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
        $teams = $this->repository->all();

        return View::make('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new Team
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.teams.create');
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

        return Redirect::route('admin.teams.index')
            ->with('success', 'Successfully Created Team.');
    }

    /**
     * Display the specified Team.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $team = $this->repository->findOrFail($id);

        return View::make('admin.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $team = $this->repository->find($id);

        return View::make('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $team = $this->repository->findOrFail($id);

        $validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $team->update($data);

        return Redirect::route('admin.teams.index');
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

        return Redirect::route('admin.teams.index');
    }
}
