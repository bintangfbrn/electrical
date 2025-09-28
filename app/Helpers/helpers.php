<?php

use Illuminate\Support\Facades\Gate;
use App\Models\LogStatus;

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

if (!function_exists('log_status')) {
    function log_status($data)
    {
        try {
            LogStatus::create([
                'id_detail'           => $data['id_detail'],
                'model'               => $data['model'] ?? null,
                'deskripsi'           => $data['deskripsi'] ?? null,
                'controller_function' => $data['controller_function'] ?? null,
                'id_user'             => auth()->id(),
                'nama'                => auth()->user()->name,
                'ip_address'          => request()->ip()
            ]);
        } catch (\Exception $e) {
            Log::error('DB Logging Error: ' . $e->getMessage());
        }
    }
}