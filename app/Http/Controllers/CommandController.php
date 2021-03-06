<?php

namespace App\Http\Controllers;
use Artisan;
use File;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Composer;
use Illuminate\Http\Request;
use Response;

class CommandController extends Controller
{
    
    public function bersihincache()
    {
    	Artisan::call('config:cache');
    	Artisan::call('config:clear');
    	Artisan::call('cache:clear');
    	Artisan::call('route:cache');
    	echo 'berhasil bersihin cache';
    }
    
    public function configcache()
    {
    	Artisan::call('config:cache');
    	echo 'success calling command php artisan config:cache';
    }

    public function routecache()
    {
    	Artisan::call('route:cache');
    	echo 'success calling command php artisan route:cache';
    }
    
    public function dumpautoload(){
        // system('composer dump-autoload');
        Composer::dumpAutoloads();
        echo 'success calling command DumpAutoload';
    }
    
    public function routegambarproject($filename)
    {
        // Add folder path here instead of storing in the database.
        $path = storage_path('app/public/project_image/'.$filename);
        // $path = storage_path('app/public/'.$filename);

        if (!File::exists($path)) {
            abort(503);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
        
    }
    
    public function routegambarproject1($filename)
    {
        // Add folder path here instead of storing in the database.
        $path = storage_path('app/public/project_image1/'.$filename);
        // $path = storage_path('app/public/'.$filename);

        if (!File::exists($path)) {
            abort(503);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
        
    }
    
    public function routegambarproject2($filename)
    {
        // Add folder path here instead of storing in the database.
        $path = storage_path('app/public/project_image2/'.$filename);
        // $path = storage_path('app/public/'.$filename);

        if (!File::exists($path)) {
            abort(503);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
        
    }
    
    public function routemoneyreport($filename)
    {
        // Add folder path here instead of storing in the database.
        $path = storage_path('app/public/money_report/'.$filename);
        // $path = storage_path('app/public/'.$filename);

        if (!File::exists($path)) {
            abort(503);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
        
    }
    
    public function routegambartopup($filename)
    {
        // Add folder path here instead of storing in the database.
        $path = storage_path('app/public/proof_image/'.$filename);
        // $path = storage_path('app/public/'.$filename);

        if (!File::exists($path)) {
            abort(503);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
        
    }
    
    public function routegambarwithdraw($filename)
    {
        // Add folder path here instead of storing in the database.
        $path = storage_path('app/public/proof_image_withdraw/'.$filename);
        // $path = storage_path('app/public/'.$filename);

        if (!File::exists($path)) {
            abort(503);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
        
    }
    
    public function storagelink()
    {
    	Artisan::call('storage:link');
    	echo 'success calling command php artisan storage:link';
    }
    
    public function putUnderMaintenance()
    {
         Artisan::call('down');
         echo 'success Lagi MT';
    }
    
    public function putNotMaintenance()
    {
         Artisan::call('up');
         echo 'success kelar MT';
    }

}
