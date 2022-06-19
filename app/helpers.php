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

if (!function_exists('GetImageFromUrl')) {
    function GetImageFromUrl($link, $saveto = "")
    {
        $saveto = storage_path('app/public/' . $saveto);
        $saveto = str_replace('/', DIRECTORY_SEPARATOR, $saveto);
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $raw = curl_exec($ch);
        curl_close($ch);
        if (file_exists($saveto)) {
            unlink($saveto);
        }
        $fp = fopen($saveto, 'c');
        fwrite($fp, $raw);
        fclose($fp);
    }
}
