<?php

Breadcrumbs::register('admin.images.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.images.management'), route('admin.images.index'));
});

Breadcrumbs::register('admin.images.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.images.index');
    $breadcrumbs->push(trans('menus.backend.images.create'), route('admin.images.create'));
});

Breadcrumbs::register('admin.images.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.images.index');
    $breadcrumbs->push(trans('menus.backend.images.edit'), route('admin.images.edit', $id));
});
