<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\View\View;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IonicController extends Controller
{
    public function index()
    {
//        $view = new View();

//        dd(base_path('resources/views/ionic-delivery24horas/www/lib/'));
        View::addExtension('html', 'php');
        return View::make('ionic-delivery24horas.www.index');
//        return View::make('ionic.ionicAppMainSpa2');
//        return view('ionic-delivery24horas.www.index');
    }

    public function getLib()
    {
        $requested_file = '';
        foreach (func_get_args() as $arg) {
            $requested_file = $requested_file . '/' . $arg;
        }
        $file = base_path('resources/views/ionic-delivery24horas/www/lib') . $requested_file;
//        dd(substr($file,-3));
        if (file_exists($file)){
//            return File::get($file);
            $headers = array();
            if (substr($file,-3)=='css')
                $headers['Content-Type'] = 'text/css; charset=UTF-8';
            if (substr($file,-2)=='js')
                $headers['Content-Type'] = 'application/javascript';
            $headers['Cache-Control'] = 'public, max-age=0';
            $headers['Content-Length'] = filesize($file);
            return response(file_get_contents($file), 200, $headers);
        } else abort(404, "Arquivo $file não encontrado");

    }

    public function getJs()
    {
        $requested_file = '';
        foreach (func_get_args() as $arg) {
            $requested_file = $requested_file . '/' . $arg;
        }
        $file = base_path('resources/views/ionic-delivery24horas/www/js') . $requested_file;
        if (file_exists($file)) {
//            return File::get($file);
            $headers = array();
            $headers['Content-Type'] = 'application/javascript';
            $headers['Cache-Control'] = 'public, max-age=0';
            $headers['Content-Length'] = filesize($file);
            return response(File::get($file), 200, $headers);
        } else abort(404, "Arquivo $file não encontrado");
    }

    public function getCss()
    {
        $requested_file = '';
        foreach (func_get_args() as $arg) {
            $requested_file = $requested_file . '/' . $arg;
        }
        $file = base_path('resources/views/ionic-delivery24horas/www/css') . $requested_file;
        if (file_exists($file)) {
//            return File::get($file);
            $headers = array();
            $headers['Content-Type'] = 'text/css; charset=UTF-8';
            $headers['Cache-Control'] = 'public, max-age=0';
            $headers['Content-Length'] = filesize($file);
            return response(file_get_contents($file), 200, $headers);
        } else abort(404, "Arquivo $file não encontrado");
    }

    public function getTemplates()
    {
        $requested_file = '';
        foreach (func_get_args() as $arg) {
            $requested_file = $requested_file . '/' . $arg;
        }
        $file = base_path('resources/views/ionic-delivery24horas/www/templates') . $requested_file;
        if (file_exists($file)) {
//            return File::get($file);
            $headers = array();
            $headers['Content-Type'] = 'text/html; charset=UTF-8';
            $headers['Cache-Control'] = 'public, max-age=0';
            $headers['Content-Length'] = filesize($file);
            return response(file_get_contents($file), 200, $headers);
        } else abort(404, "Arquivo $file não encontrado");
    }
}
