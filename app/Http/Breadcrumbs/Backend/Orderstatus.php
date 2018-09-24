<?php

Breadcrumbs::register('admin.orderstatuses.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.orderstatuses.management'), route('admin.orderstatuses.index'));
});

Breadcrumbs::register('admin.orderstatuses.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.orderstatuses.index');
    $breadcrumbs->push(trans('menus.backend.orderstatuses.create'), route('admin.orderstatuses.create'));
});

Breadcrumbs::register('admin.orderstatuses.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.orderstatuses.index');
    $breadcrumbs->push(trans('menus.backend.orderstatuses.edit'), route('admin.orderstatuses.edit', $id));
});
