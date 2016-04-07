<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 13/02/16
 * Time: 23:34
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{

    public function show($resolution, $file) {
//        $file = 'images/imagem-de-agua-com-gas-schin-500ml.png';
//        dd(str_replace('/','/thumbnail-',$file));
//        $thumbnail_file = str_replace('images/','thumbnails/',$file);

//        $thumbnail_imageDir = config('delivery.thumbnailImageLocation') . DIRECTORY_SEPARATOR;
//        if (!Storage::exists($thumbnail_imageDir)) Storage::makeDirectory($thumbnail_imageDir);
//        $files = Storage::files($thumbnail_imageDir);
//        dd($files);

//        $source = 'https://s3.amazonaws.com/delivery-images/'.$file;
//        $background = Image::canvas(80, 80);
//        $image = Image::make($source)
//            ->resize(80, 80, function ($c) {
//                $c->aspectRatio();
//                $c->upsize();
//            });
//        $background->insert($image, 'center');
//        $background->stream('png');
//        Storage::put($thumbnail_file, $background->__toString());
//
//        $files = Storage::files($thumbnail_imageDir);
//        dd($files);


//        $imageDir = config('delivery.imageLocation') . DIRECTORY_SEPARATOR;
//        $files = Storage::files($imageDir);
//        foreach ($files as $file) {
//            $source = 'https://s3.amazonaws.com/delivery-images/' . $file;
//            $thumbnail_file = str_replace('images/','thumbnails/',$file);
//
//            if (!Storage::exists($thumbnail_file)){
//                $background = Image::canvas(80, 80);
//                $image = Image::make($source)
//                    ->resize(80, 80, function ($c) {
//                        $c->aspectRatio();
//                        $c->upsize();
//                    });
//                $background->insert($image, 'center');
//                $background->stream('png');
//                Storage::put($thumbnail_file, $background->__toString());
//            }
//        }

        $thumbnail_imageDir = config('delivery.thumbnailImageLocation') . DIRECTORY_SEPARATOR;
        $files = Storage::files($thumbnail_imageDir);
        dd($files);



//        $source = storage_path('img/').$file;
//        $source = 'https://s3.amazonaws.com/delivery-images/images/'.$file;
//        $source = 'https://s3.amazonaws.com/delivery-images/images/imagem-de-agua-com-gas-schin-500ml.png';
//        $res = explode('x',$resolution);
//        dd(storage_path('app/img/').$file);
//        $img = \Image::make($source)
//            ->fit($res[0], $res[1]);
//            ->resize($res[0]);
//            ->resize(700, 300);


        // create new image with transparent background color
        $background = \Image::canvas(80, 80);

        // read image file and resize it to 200x200
        // but keep aspect-ratio and do not size up,
        // so smaller sizes don't stretch
        $image = \Image::make($source)
            ->resize(80, 80, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });

        // insert resized image centered into background
        $background->insert($image, 'center');

//        return $img->response('png');
        return $background->response('png');
    }

}