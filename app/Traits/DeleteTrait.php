<?php

namespace App\Traits;

trait DeleteTrait{

    public function delete_images($image_model_collection){
        foreach ($image_model_collection as $image_model) $image_model->delete();
    }

    public function delete_image($image_model){
        $image_model->delete();
    }

    public function delete_files($file_model_collection){
        foreach ($file_model_collection as $file_model) $file_model->delete();
    }

    public function delete_file($file_model){
        $file_model->delete();
    }

}
