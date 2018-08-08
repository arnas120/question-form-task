<?php

namespace App\Facades;

class ImageUploader extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'imageUpload';
    }
}