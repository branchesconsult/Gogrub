<?php

Breadcrumbs::register('admin.cuisines.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.cuisines.management'), route('admin.cuisines.index'));
});

Breadcrumbs::register('admin.cuisines.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.cuisines.index');
    $breadcrumbs->push(trans('menus.backend.cuisines.create'), route('admin.cuisines.create'));
});

Breadcrumbs::register('admin.cuisines.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.cuisines.index');
    $breadcrumbs->push(trans('menus.backend.cuisines.edit'), route('admin.cuisines.edit', $id));
});
