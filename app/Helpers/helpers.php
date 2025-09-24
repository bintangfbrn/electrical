<?php

use Illuminate\Support\Facades\Gate;

if (!function_exists('PermissionChecking')) {
    function PermissionChecking($param)
    {
        /**
         * The param that are mass assignable.
         *
         * @param array<string>
         */

        if (!Gate::any($param)) {
            return abort(403);
        }
    }
}
