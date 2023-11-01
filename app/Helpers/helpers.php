<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

/**
 * @Target this file to make function to help for all system
 * @note can call it in all system
 */
/**
 * user login
 */
function user()
{
    if (Auth::guard('web')->check()) {
        return Auth::guard('web')->user();
    } elseif (Auth::guard('admins')->check()) {
        return Auth::guard('admins')->user();
    }
}

function checkView($view)
{
    return view()->exists($view) ? $view : '500';
}

/**
 * to execution time for web
 */
function executionTime()
{
    ini_set('max_execution_time', 120000);
    ini_set('post_max_size', 120000);
    ini_set('upload_max_filesize', 100000);
}

function permissionShow($name): int
{
    return \Illuminate\Support\Facades\DB::table('permissions')
        ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
        ->where('permission_role.role_id', user()->role->role_id ?? 0)
        ->where('permissions.name', $name)
        ->count();
}


if (!function_exists('can')) {
    function can($permission): bool
    {
        if (!Auth::guard('web')->user()->can($permission)) {
            abort(401);
        }
        return true;
    }
}


if (!function_exists('prefixHoverShow')) {
    function prefixHoverShow($prefixName): string
    {
        $routeName = explode(".", request()->route()->getName());
        return $routeName[1] == $prefixName ? 'hover show' : '';
    }
}


if (!function_exists('prefixShow')) {
    function prefixShow($prefixName): string
    {
        return request()->routeIs($prefixName) ? 'show' : '';
    }
}

if (!function_exists('setActiveLink')) {
    function prefixActive($prefixName): string
    {
        return request()->segment(2)  == $prefixName ? 'active' : '';
    }
}

// if (!function_exists('settings')) {
//     function settings()
//     {
//         return Cache::remember('settings', 99999999, function () {
//             return DB::table('settings')->pluck('value', 'key')->toArray();
//         });
//     }
// }
