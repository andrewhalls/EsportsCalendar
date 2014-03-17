<?php namespace GamingCalendar\Controllers;

use GamingCalendar\Repos\Broadcast\BroadcastRepository;
use View;
use Redirect;
use Validator;

/**
 * Class BroadcastController
 * @package GamingCalendar\controllers
 */
class HomeController extends \BaseController
{

    /**
     * @param BroadcastRepository $repository
     */
    public function __construct(BroadcastRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of Broadcasts
     *
     * @return Response
     */
    public function index()
    {
        $broadcasts = $this->repository->getOverview(3);

        return View::make('broadcasts.index', compact('broadcasts'));
    }

    /**
     * Display the specified Broadcast.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $broadcasts = $this->repository->findOrFail($id);

        return View::make('broadcasts.show', compact('broadcasts'));
    }
}
