<?php namespace GamingCalendar\Controllers\Admin;

use GamingCalendar\Repos\Channel\ChannelRepository;
use View;
use Redirect;
use Validator;

/**
 * Class ChannelController
 * @package GamingCalendar\controllers
 */
class ChannelController extends \BaseController
{

    /**
     * @param ChannelRepository $repository
     */
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
        $channel = $this->repository->all();

        return View::make('admin.channels.index', compact('channel'));
    }

    /**
     * Show the form for creating a new Channel
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.channels.create');
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

        return Redirect::route('admin.channels.index');
    }

    /**
     * Display the specified Channel.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $channel = $this->repository->findOrFail($id);

        return View::make('admin.channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified Channel.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $channel = $this->repository->find($id);

        return View::make('admin.channels.edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $channel = $this->repository->findOrFail($id);

        $validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $channel->update($data);

        return Redirect::route('admin.channels.index');
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

        return Redirect::route('admin.channels.index');
    }
}
