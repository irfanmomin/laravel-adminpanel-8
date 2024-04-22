<?php

namespace App\Http\Controllers\Backend\EventCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\EventCategory\EventCategoryRepository;
use App\Http\Requests\Backend\EventCategory\ManageEventCategoryRequest;

/**
 * Class EventCategoriesTableController.
 */
class EventCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var EventCategoryRepository
     */
    protected $eventcategory;

    /**
     * contructor to initialize repository object
     * @param EventCategoryRepository $eventcategory;
     */
    public function __construct(EventCategoryRepository $eventcategory)
    {
        $this->eventcategory = $eventcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageEventCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageEventCategoryRequest $request)
    {
        return Datatables::of($this->eventcategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($eventcategory) {
                return Carbon::parse($eventcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($eventcategory) {
                return $eventcategory->action_buttons;
            })
            ->make(true);
    }
}
