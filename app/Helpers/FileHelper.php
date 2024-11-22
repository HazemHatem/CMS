<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class FileHelper
{
    public static function userimage(string $path = null)
    {
        return isset($path) ? asset('storage/' . $path) : asset('site/images/user.png');
    }
    public static function truncateDescription($description, $words = 10)
    {
        return Str::words($description, $words, '...');
    }
}
