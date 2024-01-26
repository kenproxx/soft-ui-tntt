<?php

namespace App\Http\Controllers;

use App\Models\Cloudinaries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CloudinaryController extends Controller
{

    public function upload(Request $request)
    {
        $file = $request->input('file');
        $cloudinary = new Cloudinaries();
        return $cloudinary->upload($file);
    }

    public function uploadByURL($url)
    {
        $cloudinary = new Cloudinaries();
        $result =  $cloudinary->upload($url);

        if ($result->getStatusCode() == 200) {
            $urlCloudinary = 'https://res.cloudinary.com/dw4k3ntno/image/upload/v1706190182/';

            /* lấy public_id của ảnh*/
            $public_id = json_decode($result->getContent())->data->public_id;

            return $urlCloudinary . $public_id;
        }
        return '';
    }

    public function deleteByPublicId($public_id)
    {
        $cloudinary = new Cloudinaries();
        $cloudinary->deletePath($public_id);
    }

    public function uploadByFileImage($file)
    {
        $result1 = $file->store('images', 'public');

        $urlFile = asset('storage/' . $result1);

        $urlImage = $this->uploadByURL($urlFile);

        /* nếu upload ảnh thành công, xóa ảnh cũ trên cloud */
        File::delete(public_path('storage/' . $result1));

        return $urlImage;

    }

}
