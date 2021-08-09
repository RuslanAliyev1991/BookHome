<?php

namespace App\Helper;

use App\Models\Author;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Filesystem\Filesystem;

class mHelper
{
    static function permalink($string)
    {
        $find = array('Ç', 'Ş', 'Ğ', 'Ö', 'Ü', 'ç', 'ş', 'ğ', 'ö', 'ü', 'İ', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'o', 'u', 'c', 's', 'g', 'o', 'u', 'i', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        return $string;
    }

    // file proses:
    static function fileUpload($path, $image)
    {
        $imageName = uniqid() . "." . $image->getClientOriginalExtension();
        $upload = $image->move($path, $imageName);
        return $upload;
    }

    static function fileDelete($id)
    {
        $d = Author::where('id', '=', $id)->get();
        (new Filesystem())->delete(public_path($d[0]['image']));
    }

    static function fileUpdate($path, $id, $image)
    {
        self::fileDelete($id);
        return self::fileUpload($path, $image);
    }
}
