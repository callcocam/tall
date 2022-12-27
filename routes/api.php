<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/uploads', function(Request $request){
    if ($request->file('image')) {

        if (is_array($request->image)) {
            $path = collect($request->image)->map->store('tmp-editor-uploads');
        } else {
            $path = $request->image->store('tmp-editor-uploads');
        }

        return response()->json([
            'url' => Storage::url($path)
        ], 200);
    }

    return;

})->name('api.upload');