<?php

if (!function_exists('app_title')) {


    function app_title(?string $title = null): string
    {
        return !empty($title) ? $title . ' | ' . config('app.name') : config('app.name');
    }
}
