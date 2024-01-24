<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionMeddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allPermissions = Permission::all();
        foreach ($allPermissions as $key => $permission) {
            Gate::define($permission->slug, function (User $user) use ($permission) {
                // return $user->role->permissions()->where('slug',$permission->slug)->first() ? true : false;
                return $user->hasPermission($permission->slug);
            });
        }
        
        return $next($request);
    }
}
