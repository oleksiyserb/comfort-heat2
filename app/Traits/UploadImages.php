<?php

namespace App\Traits;

trait UploadImages
{
    /**
     * @param $image
     * @param $folder
     * @return string
     */
    public function uploadAndResizeImage($image, $folder): string
    {
        $img = \Image::make($image)->resize(700, 600);
        $path = $this->createdFolderIfNotExist($folder);

        $img->save($path.$this->getHashName($image));

        return "{$folder}/" . $this->getHashName($image);
    }

    /**
     * @param $image
     * @return bool
     */
    public function unlinkImage($image): bool
    {
        if ($this->getStoragePath() . ($image->image ?? $image)) {
            unlink($this->getStoragePath() . '/' . ($image->image ?? $image));
        }

        return true;
    }

    /**
     * @return string
     */
    private function getStoragePath(): string
    {
        return public_path('storage');
    }

    /**
     * @param $image
     * @return mixed
     */
    private function getHashName($image)
    {
        return $image->hashName();
    }

    /**
     * @param $folder
     * @return string
     */
    private function imagePath($folder): string
    {
        return public_path("storage/{$folder}/");
    }

    /**
     * @param $folder
     * @return string
     */
    private function createdFolderIfNotExist($folder): string
    {
        if (!file_exists($this->imagePath($folder))) {
            mkdir($this->imagePath($folder), 0777, true);
        }
        return $this->imagePath($folder);
    }
}
