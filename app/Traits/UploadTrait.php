<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

trait UploadTrait{

    public function upload_image($file_input, $dir, Model $model, $type = null, $name = null){

        // Validate that request has file
        if(!request()->hasFile($file_input)) return;

        // Get file from request
        $file = request()->file($file_input);

        // Store file and get path
        $path = $file->store($dir . '/' . $model->id);

        // Get data
        $data = [
            'basename' => basename($path),
            'path' => "data/$dir/$model->id/images",
            'type' => $type,
            'name' => $name,
        ];

        // Create type copy for all types by settings
        foreach ($this->settings($dir) as $type => $settings){

            // Get original image copy
            $img = Image::make(public_path($data['path'] . "/". $data['basename']));

            // Transform image and save it by type
            $this->transform($img, $settings)
                ->save(public_path($data['path'] . "/" . $type . "_" . $data['basename']));
        }

        // Check if Image exists
        $model_exists = isset($type) && $model->images()->where('type', $type)->exists();

        // Create new Image if does type is null or Image does not exist
        $image_model = $model_exists ? $model->images()->where('type', $type)->first() : $model->images()->create($data);

        // If Image exists
        if($model_exists){

            // Get files of Image
            $files = scandir($image_model->path);

            // Loop files
            foreach($files as $filename){

                // Delete file if contains current basename
                if(str_contains($filename, $image_model->basename)) unlink($image_model->path.$filename);
            }

            // Update model
            $image_model->update($data);
        }

    }

    public function upload_file($file_input, $dir, Model $model, $type = null, $name = null){

        // Validate that request has file
        if(!request()->hasFile($file_input)) return;

        // Get file from request
        $file = request()->file($file_input);

        // Store file and get path
        $path = $file->store($dir . '/' . $model->id . '/files');

        // Get data
        $data = [
            'filename' => basename($path),
            'path' => "data/$dir/$model->id/files/",
            'type' => $type,
            'name' => $name,
        ];

        // Check if File exists
        $model_exists = isset($type) && $model->files()->where('type', $type)->exists();

        // Create new File if does type is null or File does not exist
        $file_model = $model_exists ? $model->files()->where('type', $type)->first() : $model->files()->create($data);

        // If File exists
        if($model_exists){

            // Delete file that belongs to model
            unlink($file_model->path . $file_model->filename);

            // Update model
            $file_model->update($data);
        }
    }

    /**
     * Build settings for $key from config/images.php
     * @param $key string
     * @return array
     */
    private function settings($key){
        $images = config('images');
        $default = $images['_default'];

        if(!array_key_exists($key, $images)) return $default; // First rule
        $settings = $images[$key];

        foreach ($settings as $type => $type_settings){
            if($type_settings === true){ // Third rule
                $settings[$type] = $default[$type];
            }else{
                if(!array_key_exists('width', $type_settings)) $settings[$type]['width'] = $default[$type]['width']; // Fourth rule
                if(!array_key_exists('height', $type_settings)) $settings[$type]['height'] = $default[$type]['height']; // Fourth rule
                if(!array_key_exists('transformation', $type_settings)) $settings[$type]['transformation'] = false; // Fifth rule
            }
        }
        return $settings;
    }

    /**
     * Transform $image according to $settings
     * @param $image \Intervention\Image\Image
     * @param $settings array
     * @return \Intervention\Image\Image
     */
    private function transform($image, $settings){
        switch($settings['transformation']){
            case 'crop':
                $image->resize($settings['width'], $settings['height'],function ($constraint){
                    $constraint->aspectRatio();
                })->resizeCanvas($settings['width'], $settings['height'], 'center', false, 'ffffff');
                //$image->crop($settings['width'], $settings['height']);
                break;
            case 'scale':
                $image->fit($settings['width'], $settings['height']);
                break;
        }
        return $image;
    }

}
