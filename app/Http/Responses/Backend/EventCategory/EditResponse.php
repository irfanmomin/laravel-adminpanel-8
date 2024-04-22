<?php

namespace App\Http\Responses\Backend\EventCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\EventCategory\EventCategory
     */
    protected $eventcategories;

    /**
     * @param App\Models\EventCategory\EventCategory $eventcategories
     */
    public function __construct($eventcategories)
    {
        $this->eventcategories = $eventcategories;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.eventcategories.edit')->with([
            'eventcategories' => $this->eventcategories
        ]);
    }
}