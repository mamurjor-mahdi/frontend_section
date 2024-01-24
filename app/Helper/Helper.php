<?php

/**
*   All View Share Data
*/

if (!function_exists('setThisPageTitle')) {
    function setThisPageTitle($title = '')
    {
        view()->share(['title' => $title]);
    }
}

/**
*   Date Format
*/

if (!function_exists('date_formats')) {
    function date_formats($format, $date)
    {
        return date($format, strtotime($date));
    }
}
