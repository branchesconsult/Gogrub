<?php

Breadcrumbs::register('admin.locations.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.locations.management'), route('admin.locations.index'));
});

Breadcrumbs::register('admin.locations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.locations.index');
    $breadcrumbs->push(trans('menus.backend.locations.create'), route('admin.locations.create'));
});

Breadcrumbs::register('admin.locations.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.locations.index');
    $breadcrumbs->push(trans('menus.backend.locations.edit'), route('admin.locations.edit', $id));
});
