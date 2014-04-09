<?php namespace GamingCalendar\Controllers\API;

use GamingCalendar\Repos\Team\TeamRepository;
use View;
use Input;
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
        return $this->repository->all();
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
            return Response::json(array('result', 'Failed.'));
        }

        $this->repository->create($data);

        return Response::json(array('result', 'Team Created.'));
    }

    /**
     * Display the specified Team.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->repository->find($id);
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

        return response::json(array('result' => 'Team Updated.'));
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

        return response::json(array('result' => 'Team Deleted.'));
    }
}
