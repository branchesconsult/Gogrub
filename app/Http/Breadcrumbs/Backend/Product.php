<?php

Breadcrumbs::register('admin.products.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.products.management'), route('admin.products.index'));
});

Breadcrumbs::register('admin.products.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.products.index');
    $breadcrumbs->push(trans('menus.backend.products.create'), route('admin.products.create'));
});

Breadcrumbs::register('admin.products.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.products.index');
    $breadcrumbs->push(trans('menus.backend.products.edit'), route('admin.products.edit', $id));
});
