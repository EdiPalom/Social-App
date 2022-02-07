<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

use App\Models\MediaData;

class ImageController extends Controller
{    
    public function store(ImageRequest $request)
    {
        $image = $request->file('image');

        // if($image->isValid() and ($image->extension() == 'png'))
        // {
        $image->store('images');

        MediaData::create(
            ['post_id'=>$request->post_id,
             'url'=>$request->file('image')->hashName(),
             'media_type_id'=>'1']
        );
        // }

        return response()->json(null,201);
    }
}
