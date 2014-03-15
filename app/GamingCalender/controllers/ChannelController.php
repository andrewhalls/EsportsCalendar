<?php namespace GamingCalendar\controllers;

/**
 * Class ChannelController
 * @package GamingCalendar\controllers
 */
class ChannelController extends \BaseController
{

    public function __construct(ChannelRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of Channels
     *
     * @return Response
     */
    public function index()
    {
        $broadcast = $this->repository->all();

        return View::make('broadcast.index', compact('broadcast'));
    }

    /**
     * Show the form for creating a new Channel
     *
     * @return Response
     */
    public function create()
    {
        return View::make('broadcasts.create');
    }

    /**
     * Store a newly created Channel in storage.
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
     * Display the specified Channel.
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
     * Show the form for editing the specified Channel.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $channels = $this->repository->find($id);

        return View::make('channels.edit', compact('channels'));
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

        return Redirect::route('channels.index');
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

        return Redirect::route('channels.index');
    }
}
