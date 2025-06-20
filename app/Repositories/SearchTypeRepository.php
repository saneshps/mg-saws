<?php

namespace App\Repositories;

use App\Models\Category;

use App\Models\Product;

class SearchTypeRepository
{
    public static function getsearchItem($name)
    {
        $categories =
            Category::where('parent_id', 28)->get();
        $sub_categories = [];
        foreach ($categories  as  $category) {
            $sub_categories[] = $category->id;
        }

        $sub_category_id = array_count_values($sub_categories);
        $key = explode(' ', $name);
        $product_data = Product::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
                $q->orWhere('model_no', 'like', "%{$value}%");
            }
        })->orderBy('id', 'desc')->paginate(5);
        $cat_data = Category::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })->orderBy('id', 'desc')->paginate(5);
        return [
            'product_data' =>
            $product_data,
            'cat_data' =>
            $cat_data,
            'sub_category_id' =>
            $sub_category_id,

        ];
    }
}
