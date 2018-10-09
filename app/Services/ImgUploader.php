<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class ImgUploader
 *
 * @package App\Services
 */
class ImgUploader
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public static function upload(UploadedFile $file): string
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/avatars/';
        $uploadFile = basename('avatar' . time()) . '.' . $file->getClientOriginalExtension();
        move_uploaded_file($file->getPathname(), $uploadDir . $uploadFile);

        return '/avatars/' . $uploadFile;
    }
}