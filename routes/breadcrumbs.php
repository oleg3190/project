<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


Breadcrumbs::register('home', function ($crumbs) {
    $crumbs->push('Home', route('home'));
});


Breadcrumbs::register('login', function ($crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Login', route('login'));
});

Breadcrumbs::register('register', function ($crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Register', route('register'));
});

Breadcrumbs::register('password.request', function ($crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Reset Password', route('password.request'));
});

Breadcrumbs::register('password.reset', function ($crumbs) {
    $crumbs->parent('password.request');
    $crumbs->push('Change', route('password.reset'));
});

Breadcrumbs::register('cabinet', function ($crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Cabinet', route('cabinet'));
});

Breadcrumbs::register('admin.home', function ($crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Admin', route('admin.home'));
});


Breadcrumbs::register('admin.users.index', function ($crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function ($crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push('Create', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function ($crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.user.show',$user));
});

Breadcrumbs::register('admin.users.edit', function ($crumbs) {
    $crumbs->parent('admin.users.show');
    $crumbs->push('Edit', route('admin.user.edit',$user));
});




