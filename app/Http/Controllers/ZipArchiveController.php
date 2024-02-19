<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

class ZipArchiveController extends Controller
{
    public function compressFile($file)
    {
        $zipFile = new ZipArchive();
        if ($zipFile->open( '123.zip', ZipArchive::CREATE) === TRUE)
        {
            // Add files to the zip file
            $zipFile->addFile(asset('public/'.$file));

            // closing the zip file.
            $zipFile->close();
        }
    }
}
