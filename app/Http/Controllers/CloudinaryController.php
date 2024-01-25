<?php

namespace App\Http\Controllers;

use App\Models\Cloudinaries;
use Illuminate\Http\Request;

class CloudinaryController extends Controller
{

    public function upload(Request $request)
    {
        $file = $request->input('file');
        $cloudinary = new Cloudinaries();
        return $cloudinary->upload($file);
    }
    public function upload2(Request $request)
    {
        $file = $request->file('file');
        $cloudinary = new Cloudinaries();

        return $cloudinary->upload2($file);
    }

    public function uploadByURL($url)
    {
        $cloudinary = new Cloudinaries();
        return $cloudinary->upload($url);
    }
}
