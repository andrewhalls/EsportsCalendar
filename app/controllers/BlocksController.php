<?php

class BlocksController extends \BaseController {

    public function __construct(BlockRepository $repository)
    {
        $this->repository = $repository;
    }

	/**
	 * Display a listing of blocks
	 *
	 * @return Response
	 */
	public function index()
	{
	    $blocks = $this->repository->all();

	    return View::make('blocks.index', compact('blocks'));
	}

	/**
	 * Show the form for creating a new block
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('blocks.create');
	}

	/**
	 * Store a newly created block in storage.
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

	    return Redirect::route('blocks.index');
	}

	/**
	 * Display the specified block.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $block = $this->repository->findOrFail($id);

	    return View::make('blocks.show', compact('block'));
	}

	/**
	 * Show the form for editing the specified block.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$block = $this->repository->find($id);

		return View::make('blocks.edit', compact('block'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$block = $this->repository->findOrFail($id);

		$validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		$block->update($data);

		return Redirect::route('blocks.index');
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

		return Redirect::route('blocks.index');
	}

}