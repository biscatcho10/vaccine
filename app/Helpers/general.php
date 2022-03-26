<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

function upload($file, $folder)
{
    $profile_img = Image::make($file)->encode('png');
    $img = $file->hashName();
    Storage::disk('local')->put('public/images/'.$folder.'/'. $img, (string)$profile_img, 'public');
    return $img;
}


function humanFileSize($size, string $unit = ""): string
{
    if ((!$unit && $size >= 1 << 30) || $unit === "GB")
        return number_format($size / (1 << 30), 2) . "GB";
    if ((!$unit && $size >= 1 << 20) || $unit === "MB")
        return number_format($size / (1 << 20), 2) . "MB";
    if ((!$unit && $size >= 1 << 10) || $unit === "KB")
        return number_format($size / (1 << 10), 2) . "KB";
    return number_format($size) . " bytes";
}
