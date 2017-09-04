<?php

namespace App;

use Illuminate\Routing\UrlGenerator;

Class Helpers extends UrlGenerator
{

    /**
     * Generate the URL to an application asset.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    public static function publicAsset($path)
    {
        return asset($path);
    }

        /**
     * Generate the URL to a secure asset.
     *
     * @param  string  $path
     * @return string
     */
    public static function publicSecureAsset($path)
    {
        return secure_asset($path, true);
    }

}