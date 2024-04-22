<?php

namespace App\Repositories\Backend\EventCategory;

use DB;
use Carbon\Carbon;
use App\Models\EventCategory\EventCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventCategoryRepository.
 */
class EventCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = EventCategory::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.eventcategories.table').'.id',
                config('module.eventcategories.table').'.created_at',
                config('module.eventcategories.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (EventCategory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.eventcategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param EventCategory $eventcategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(EventCategory $eventcategory, array $input)
    {
    	if ($eventcategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.eventcategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param EventCategory $eventcategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(EventCategory $eventcategory)
    {
        if ($eventcategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.eventcategories.delete_error'));
    }
}
