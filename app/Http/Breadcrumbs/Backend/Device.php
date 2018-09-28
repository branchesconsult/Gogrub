<?php

Breadcrumbs::register('admin.devices.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.devices.management'), route('admin.devices.index'));
});

Breadcrumbs::register('admin.devices.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.devices.index');
    $breadcrumbs->push(trans('menus.backend.devices.create'), route('admin.devices.create'));
});

Breadcrumbs::register('admin.devices.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.devices.index');
    $breadcrumbs->push(trans('menus.backend.devices.edit'), route('admin.devices.edit', $id));
});
