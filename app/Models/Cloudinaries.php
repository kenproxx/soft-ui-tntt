<?php

namespace App\Models;

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloudinaries
{

    private $cloudinary;
    public function __construct()
    {
        if (!$this->cloudinary) {
            $this->cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME') ?? 'dw4k3ntno',
                    'api_key' => env('CLOUDINARY_API_KEY') ?? '414414734545937',
                    'api_secret' => env('CLOUDINARY_API_SECRET') ?? '-NLIWfF3GC7VyoQmuWsOEek9oEI'
                ],
                'url' => [
                    'secure' => true]]);
        }
    }

    public function upload($file)
    {
        try {
            $result = $this->cloudinary->uploadApi()->upload($file);
            return response()->json([
                'message' => 'Upload Success',
                'data' => $result
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Upload Failed',
                'data' => $th->getMessage()
            ], 500);
        }
    }
}
