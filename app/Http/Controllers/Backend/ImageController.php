<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    public function store(ImageRequest $request)
    {
        $request->file('image')->store('images');

        return response()->json(null,201);
    }
}
