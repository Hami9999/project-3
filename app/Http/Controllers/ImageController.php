<?php

namespace App\Http\Controllers;
use App\Http\Requests\ImageStoreRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


class ImageController extends Controller
{

    public function store(ImageStoreRequest $request)
    {

        $validatedData = $request->validated();
        $validatedData['user_id']=Auth::user()->id;
        $validatedData['image'] = $request->file('image')->store('image');
        $data = Image::create($validatedData);
        return response($data, Response::HTTP_CREATED);
    }

    public function updateImage(ImageStoreRequest $request)
    {
        $validatedData = $request->validated();
        $image = Image::where('id',$validatedData['id'])->first();
        Storage::delete($image->image);
        $validatedData['image'] = $request->file('image')->store('image');
        $image->image = $validatedData['image'];
        $image->update();
        return response()->json([
            'message' => 'you changed your image',
            'image' => $image
        ]);
    }
    public function deleteImage(Request $request,Image $image)
    {

        try{
            Storage::delete($image->image);
            $image->delete();
            return response()->json([
                'message' => 'you deleted your image',
            ]);
        } catch (\Exception $e) {
            return $e;
        }

    }
}


