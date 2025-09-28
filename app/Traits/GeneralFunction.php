<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

trait GeneralFunction
{
    //
    public static function swal($icon, $title, $text)
    {
        Session::flash('swal', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon,
        ]);
    }

    public static function toastr($icon, $title, $text)
    {
        Session::flash('toastr', [
            'title' => $title,
            'text' => $text,
            'icon' => $icon,
        ]);
    }

    public static function handleRepeater(null|array $data): null|Collection
    {
        if (!$data) {
            return null;
        }

        $data = collect($data)->map(function ($item) {
            return (object) $item;
        });

        return $data;
    }

    public static function handleId($data): null|string
    {
        try {
            $decryptedId = decrypt($data->id);

            return $decryptedId;
        } catch (\Exception $e) {
            return null;
        }
    }
}