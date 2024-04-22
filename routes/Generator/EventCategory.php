<?php
/**
 * EventCategory
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'EventCategory'], function () {
        Route::resource('eventcategories', 'EventCategoriesController');
        //For Datatable
        Route::post('eventcategories/get', 'EventCategoriesTableController')->name('eventcategories.get');
    });
    
});