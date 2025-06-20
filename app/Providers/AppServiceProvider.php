<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Product;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = [];
        // $products = [];

        $categories = Category::where('parent_id', 28)->get();
        // $products = Product::get();

        View::composer('*', function ($view) use ($categories) {
            $view->with('allcategories',  $categories);
            //         ->with('allproducts',  $products);

        });




        $sub_categories = collect();
        foreach ($categories  as  $category) {
            $sub_categories->push(Category::where('parent_id',  $category['id'])->get());
        }

        $sub_categories = $sub_categories->flatten();


        View::composer('*', function ($view) use ($sub_categories) {
            $view->with('sub_categories', $sub_categories);
            //         ->with('allproducts',  $products);

        });


        $sub_categories_count = collect();
        foreach ($categories  as  $category) {
            $sub_categories_count->push(Category::where('parent_id',  $category['id'])->get()->count());
        }

        $sub_categories_count = $sub_categories_count->flatten();


        View::composer('*', function ($view) use ($sub_categories_count) {
            $view->with('sub_categories_count', $sub_categories_count);
            //         ->with('allproducts',  $products);

        });




        Schema::defaultStringLength(191);

        Paginator::useBootstrap();
    }
}
