<?php

Breadcrumbs::register('admin.eventcategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.eventcategories.management'), route('admin.eventcategories.index'));
});

Breadcrumbs::register('admin.eventcategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.eventcategories.index');
    $breadcrumbs->push(trans('menus.backend.eventcategories.create'), route('admin.eventcategories.create'));
});

Breadcrumbs::register('admin.eventcategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.eventcategories.index');
    $breadcrumbs->push(trans('menus.backend.eventcategories.edit'), route('admin.eventcategories.edit', $id));
});
