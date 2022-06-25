<?php

namespace App;

use DB;
use File;
use Image;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    public static function uploadWithExtension($path, $image)
    {
        $imageName = $image->getClientOriginalName();
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $filename);
        $extension = $image->extension();
        $imageName = $filename.'_'.rand(4,99999).time().'.'.$extension;
        $image->storeAs($path, $imageName);
        
        return $imageName;
    }
    
    public static function removeFile($path)
    {
        if(File::exists(($path))){
            File::delete(($path));
        }
    }
    public static function removeDir($path)
    {
        if(File::isDirectory(($path))){
            File::deleteDirectory(($path));
        }
    }

    public static function upload($path, $image)
    {
        $file = $image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $filename);
        $extension = $image->extension();
        $imageName = $filename.'_'.str_random(3).time().'.'.$extension;
        
        $image->storeAs(($path),$imageName);
        
        return $imageName;
    }

    public static function uploadProductDoc($path, $image)
    {
        $imageName = $image->getClientOriginalName();
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $filename);
        $extension = $image->extension();
        $imageName = $filename.'_'.time().'.'.$extension;
        $image->storeAs($path,$imageName);
        
        return $imageName;
    }

    public static function uploadThumbnail($orgPath, $path, $image, $width, $height)
    {
        return Image::make(($orgPath).$image)->resize($width, $height)->save(($path).$image);
    }

    public static function uploadReduce($path, $image)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $ext = $image->getClientOriginalExtension();

        if($ext == 'png'){
            $read_from_path = $image->getPathName();
            $save_to_path = ($path.'/'.$imageName);

            $compressed_png_content = ImageUpload::compress_png($read_from_path);
            file_put_contents($save_to_path, $compressed_png_content);
            
        }else{
            $image->storeAs(($path),$imageName);
        }

        Image::make(($path).$imageName)->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save();

        return $imageName;
    }
}
