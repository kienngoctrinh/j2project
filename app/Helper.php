<?php

if (!function_exists('checkAdmin')) {
    function checkAdmin()
    {
        return session()->get('role') === 1;
    }
}