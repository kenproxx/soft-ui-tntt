<?php

namespace App\Models;

use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Cloudinary;

class Cloudinaries
{

    private $cloudinary;
    private $configurations;
    public function __construct()
    {
        if (!$this->cloudinary) {
            $this->configurations = [
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME') ?? 'dw4k3ntno',
                    'api_key' => env('CLOUDINARY_API_KEY') ?? '414414734545937',
                    'api_secret' => env('CLOUDINARY_API_SECRET') ?? '-NLIWfF3GC7VyoQmuWsOEek9oEI'
                ],
                'url' => [
                    'secure' => true]];
            $this->cloudinary = new Cloudinary($this->configurations);
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

    public function deletePath($public_ids)
    {
        try {
            $result = (new AdminApi($this->configurations))->deleteAssets($public_ids);
        } catch (\Throwable $th) {
        }
    }
}
