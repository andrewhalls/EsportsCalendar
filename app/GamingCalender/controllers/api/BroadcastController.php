<?php namespace GamingCalendar\Controllers\API;

use GamingCalendar\Repos\Broadcast\BroadcastRepository;
use GamingCalendar\Repos\Game\GameRepository;
use GamingCalendar\Repos\Channel\ChannelRepository;
use GamingCalendar\Repos\Team\TeamRepository;
use View;
use Input;
use Redirect;
use Validator;

/**
 * Class BroadcastController
 * @package GamingCalendar\controllers
 */
class BroadcastController extends \BaseController
{

    /**
     * @param BroadcastRepository $repository
     * @param GameRepository $gameRepository
     * @param ChannelRepository $channelRepository
     */
    public function __construct(BroadcastRepository $repository, GameRepository $gameRepository, TeamRepository $teamRepository, ChannelRepository $channelRepository)
    {
        $this->repository = $repository;
        $this->gameRepository = $gameRepository;
        $this->channelRepository = $channelRepository;
        $this->teamRepository = $teamRepository;
    }

    /**
     * Display a listing of Broadcasts
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Show the form for creating a new Broadcast
     *
     * @return Response
     */
    public function create()
    {
        $broadcast = $this->repository->instance();

        $games = $this->gameRepository->lists('name', 'id');

        return View::make('admin.broadcasts.create')
            ->with(compact('broadcast', 'games'));
    }

    /**
     * Store a newly created Broadcast in storage.
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

        return Redirect::route('admin.broadcasts.index')
            ->with('success', 'Broadcast Created.');
    }

    /**
     * Display the specified Broadcast.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Show the form for editing the specified Broadcast.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $broadcast = $this->repository->find($id);

        $teams = $this->teamRepository->lists('name', 'id');
        $games = $this->gameRepository->lists('name', 'id');
        $channels = $this->channelRepository->lists(\DB::Raw('CONCAT(name, " - ", url)'), 'id');

        return View::make('admin.broadcasts.edit', compact('broadcast', 'games', 'channels', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $broadcast = $this->repository->findOrFail($id);

        $validator = Validator::make($data = Input::all(), $this->repository->getRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $broadcast->update($data);

        return Redirect::route('admin.broadcasts.index')
            ->with('success', 'Broadcast Edited.');
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

        return Redirect::route('admin.broadcasts.index')
            ->with('success', 'Broadcast Deleted.');
    }
}
