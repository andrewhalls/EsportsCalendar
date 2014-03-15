<?php namespace GamingCalendar\controllers;

/**
 * Class BroadcastController
 * @package GamingCalendar\controllers
 */
class GenreController extends \BaseController
{

    public function __construct(GenreRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of Genres
     *
     * @return Response
     */
    public function index()
    {
        $broadcast = $this->repository->all();

        return View::make('broadcast.index', compact('broadcast'));
    }

    /**
     * Show the form for creating a new Genre
     *
     * @return Response
     */
    public function create()
    {
        return View::make('broadcasts.create');
    }

    /**
     * Store a newly created Genre in storage.
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

        return Redirect::route('broadcasts.index');
    }

    /**
     * Display the specified Genre.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $broadcasts = $this->repository->findOrFail($id);

        return View::make('broadcasts.show', compact('broadcasts'));
    }

    /**
     * Show the form for editing the specified Genre.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $genres = $this->repository->find($id);

        return View::make('genres.edit', compact('genres'));
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

        return Redirect::route('genres.index');
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

        return Redirect::route('genres.index');
    }

}