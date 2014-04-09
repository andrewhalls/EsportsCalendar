<?php namespace GamingCalendar\Controllers\API;

use GamingCalendar\Repos\Genre\GenreRepository;
use View;
use Redirect;
use Validator;

/**
 * Class GenreController
 * @package GamingCalendar\controllers
 */
class GenreController extends \BaseController
{

    /**
     * @param GenreRepository $repository
     */
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
        return $this->repository->all();
    }

    /**
     * Show the form for creating a new Genre
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.genres.create');
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

        return Redirect::route('admin.genres.index')
            ->with('success', 'Genre Created.');;
    }

    /**
     * Display the specified Genre.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Show the form for editing the specified Genre.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $genre = $this->repository->find($id);

        return View::make('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $genre = $this->repository->findOrFail($id);

        $validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $genre->update($data);

        return Redirect::route('admin.genres.index')
            ->with('success', 'Genre Edited.');
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

        return Redirect::route('admin.genres.index')
            ->with('success', 'Genre Deleted.');
    }
}
