<?php

class HTMLBlocksController extends \BaseController {

    public function __construct(HtmlblockRepository $repository)
    {
        $this->repository = $repository;
    }

	/**
	 * Display a listing of htmlblocks
	 *
	 * @return Response
	 */
	public function index()
	{
	    $htmlblocks = $this->repository->all();

	    return View::make('htmlblocks.index', compact('htmlblocks'));
	}

	/**
	 * Show the form for creating a new htmlblock
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('htmlblocks.create');
	}

	/**
	 * Store a newly created htmlblock in storage.
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

	    return Redirect::route('htmlblocks.index');
	}

	/**
	 * Display the specified htmlblock.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $htmlblock = $this->repository->findOrFail($id);

	    return View::make('htmlblocks.show', compact('htmlblock'));
	}

	/**
	 * Show the form for editing the specified htmlblock.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$htmlblock = $this->repository->find($id);

		return View::make('htmlblocks.edit', compact('htmlblock'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$htmlblock = $this->repository->findOrFail($id);

		$validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		$htmlblock->update($data);

		return Redirect::route('htmlblocks.index');
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

		return Redirect::route('htmlblocks.index');
	}

}