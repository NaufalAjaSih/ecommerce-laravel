<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getChildren($parent_id)
    {
        $children = Category::where('parent_id', $parent_id)->get();
        return response()->json($children);
    }
}
