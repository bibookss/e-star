<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Filters\V1\ImagesFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ImageResource;
use App\Http\Resources\V1\ImageCollection;
use App\Http\Requests\V1\StoreImageRequest;
use App\Http\Requests\V1\UpdateImageRequest;

class ImageController extends Controller
{
    public function getAllImages(Request $request)
    {   
        try {
            $filter = new ImagesFilter();
            $filterItems = $filter->transform($request);
            $images = Image::where($filterItems);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved images.',
                'data' => new ImageCollection($images->get())
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function createImage(StoreImageRequest $request)
    {
        try {
            $user = auth()->user();
            $dorm = Dorm::findOrFail($request->dormId);
        
            $newImage = Image::create([
                'name' => $request->name,
                'path' => $request->path,
                'dorm_id' => $dorm->id,
                'user_id' => $user->id
            ]);
            
            $user->images()->save($newImage);
            $dorm->images()->save($newImage);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully created image.',
                'data' => new ImageResource($newImage)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function getImage($id)
    {
        try {
            $image = Image::findOrFail($id);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved image.',
                'data' => new ImageResource($image)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }


    public function updateImage(UpdateImageRequest $request, $id)
    {
        try {
            $user = auth()->user();
            $image = Image::findOrFail($id);

            if ($user->id !== $image->user_id) {
                return response()->json([
                    'status' => 403,
                    'message' => 'You are not authorized to update this image.'
                ]);
            }

            $image->update([
                'name' => $request->name ?? $image->name,
                'path' => $request->path ?? $image->path,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully updated image.',
                'data' => new ImageResource($image)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function deleteImage($id)
    {
        try {
            $user = auth()->user();
            $image = Image::findOrFail($id);

            if ($user->id !== $image->user_id) {
                return response()->json([
                    'status' => 403,
                    'message' => 'You are not authorized to delete this image.'
                ]);
            }

            $image->delete();
            return response()->json([
                'status' => 204, 
                'message' => 'Image deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }
}
