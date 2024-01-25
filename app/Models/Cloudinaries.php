<?php

namespace App\Models;

use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Cloudinary;

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

    public function upload2($file)
    {
        try {
            $base64Encoded = base64_encode(file_get_contents($file->path()));

            $result = $this->cloudinary->uploadApi()->upload($base64Encoded);

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

    public function deletePath($url)
    {
        try {
            $public_ids = ['c3kmanrx0kolxh78ptgf'];
            $result = (new AdminApi())->deleteAssets($public_ids,
                ["resource_type" => "image", "type" => "upload"]);
            echo json_encode($result, JSON_PRETTY_PRINT);

            $result = $this->cloudinary->uploadApi()->upload($url);
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
