<?php

class PagesController extends \BaseController {

    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

	/**
	 * Display a listing of pages
	 *
	 * @return Response
	 */
	public function index()
	{
	    $pages = $this->repository->all();

	    return View::make('pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new page
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('pages.create');
	}

	/**
	 * Store a newly created page in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $validator = Validator::make($data = Input::all(), $this->repository->getRules());

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput();
	    }

	    $this->repository->create($data);

	    return Redirect::route('pages.index');
	}

	/**
	 * Display the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $page = $this->repository->findOrFail($id);

	    return View::make('pages.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified page.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = $this->repository->find($id);

		return View::make('pages.edit', compact('page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$page = $this->repository->findOrFail($id);

		$validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		$page->update($data);

		return Redirect::route('pages.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->repository->destroy($id);

		return Redirect::route('pages.index');
	}

}