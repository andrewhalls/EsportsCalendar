<?php

class RafflesController extends \BaseController {

    public function __construct(RaffleRepository $repository)
    {
        $this->repository = $repository;
    }

	/**
	 * Display a listing of raffles
	 *
	 * @return Response
	 */
	public function index()
	{
	    $raffles = $this->repository->all();

	    return View::make('raffles.index', compact('raffles'));
	}

	/**
	 * Show the form for creating a new raffle
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('raffles.create');
	}

	/**
	 * Store a newly created raffle in storage.
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

	    return Redirect::route('raffles.index');
	}

	/**
	 * Display the specified raffle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $raffle = $this->repository->findOrFail($id);

	    return View::make('raffles.show', compact('raffle'));
	}

	/**
	 * Show the form for editing the specified raffle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$raffle = $this->repository->find($id);

		return View::make('raffles.edit', compact('raffle'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$raffle = $this->repository->findOrFail($id);

		$validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		$raffle->update($data);

		return Redirect::route('raffles.index');
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

		return Redirect::route('raffles.index');
	}

}