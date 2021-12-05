<?php

use Illuminate\Contracts\Filesystem\FileNotFoundException;

if (!function_exists('version')) {
    /**
     * Add version in asset file to clear browser cache
     * eg. from /css/app.css to /css/app.css?v=123123123
     *
     * @param string $file
     * @return string
     */
    function version($file): string
    {
        if (file_exists(public_path($file))) {
            return $file . '?v=' . filemtime(public_path($file));
        }

        throw new FileNotFoundException('File (' . public_path($file) . ') not found.');
    }
}
