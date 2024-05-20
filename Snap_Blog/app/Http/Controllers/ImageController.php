<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function destroy(Image $image)
    {
        if (request()->ajax()) {
            if ($image->delete()) {
                toastr("image deleted successfully");
                return 1;
            } else {
                toastr("image not deleted successfully");
                return 0;
            }
        }
    }
}
