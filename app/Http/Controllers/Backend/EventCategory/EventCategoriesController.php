<?php

namespace App\Http\Controllers\Backend\EventCategory;

use App\Models\EventCategory\EventCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\EventCategory\CreateResponse;
use App\Http\Responses\Backend\EventCategory\EditResponse;
use App\Repositories\Backend\EventCategory\EventCategoryRepository;
use App\Http\Requests\Backend\EventCategory\ManageEventCategoryRequest;
use App\Http\Requests\Backend\EventCategory\CreateEventCategoryRequest;
use App\Http\Requests\Backend\EventCategory\StoreEventCategoryRequest;
use App\Http\Requests\Backend\EventCategory\EditEventCategoryRequest;
use App\Http\Requests\Backend\EventCategory\UpdateEventCategoryRequest;
use App\Http\Requests\Backend\EventCategory\DeleteEventCategoryRequest;

/**
 * EventCategoriesController
 */
class EventCategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var EventCategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param EventCategoryRepository $repository;
     */
    public function __construct(EventCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\EventCategory\ManageEventCategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageEventCategoryRequest $request)
    {
        return new ViewResponse('backend.eventcategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateEventCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\EventCategory\CreateResponse
     */
    public function create(CreateEventCategoryRequest $request)
    {
        return new CreateResponse('backend.eventcategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEventCategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreEventCategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.eventcategories.index'), ['flash_success' => trans('alerts.backend.eventcategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\EventCategory\EventCategory  $eventcategory
     * @param  EditEventCategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\EventCategory\EditResponse
     */
    public function edit(EventCategory $eventcategory, EditEventCategoryRequest $request)
    {
        return new EditResponse($eventcategory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEventCategoryRequestNamespace  $request
     * @param  App\Models\EventCategory\EventCategory  $eventcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateEventCategoryRequest $request, EventCategory $eventcategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $eventcategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.eventcategories.index'), ['flash_success' => trans('alerts.backend.eventcategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteEventCategoryRequestNamespace  $request
     * @param  App\Models\EventCategory\EventCategory  $eventcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(EventCategory $eventcategory, DeleteEventCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($eventcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.eventcategories.index'), ['flash_success' => trans('alerts.backend.eventcategories.deleted')]);
    }
    
}
