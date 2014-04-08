<?php namespace GamingCalendar\Controllers\Admin;

use GamingCalendar\Repos\Match\MatchRepository;
use View;
use Redirect;
use Validator;

/**
 * Class TeamController
 * @package GamingCalendar\controllers
 */
class MatchController extends \BaseController
{

    /**
     * @param MatchRepository $repository
     */
    public function __construct(MatchRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of Matches
     *
     * @return Response
     */
    public function index()
    {
        $matches = $this->repository->all();

        return View::make('admin.match.index', compact('matches'));
    }

    /**
     * Show the form for creating a new Match
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.match.create');
    }

    /**
     * Store a newly created Match in storage.
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

        Session::put('test', 'Test');

        return Redirect::route('admin.match.index')
            ->with('success', 'Match Created.');
    }

    /**
     * Display the specified Match.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $match = $this->repository->findOrFail($id);

        return View::make('admin.match.show', compact('match'));
    }

    /**
     * Show the form for editing the specified Match.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $match = $this->repository->find($id);

        return View::make('admin.match.edit', compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $match = $this->repository->findOrFail($id);

        $validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $match->update($data);

        return Redirect::route('admin.match.index')
            ->with('success', 'Match Edited.');
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

        return Redirect::route('admin.match.index')
            ->with('success', 'Match Deleted.');
    }
}
