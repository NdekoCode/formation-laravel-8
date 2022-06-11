<?php

if (!function_exists('app_title')) {


    function app_title(?string $title = null): string
    {
        return !empty($title) ? $title . ' | ' . config('app.name') : config('app.name');
    }
}

if (!function_exists('current_link')) {
    function current_link(string $routeName)
    {
        return request()->routeIs($routeName);
    }
}
if (!function_exists('addClassOnCurrentLink')) {
    function addClassOnCurrentLink(
        string $routeName,
        $startingClass = 'underline',
        $endingClass = ''
    ) {
        return current_link($routeName) ? $startingClass : $endingClass;
    }
}
