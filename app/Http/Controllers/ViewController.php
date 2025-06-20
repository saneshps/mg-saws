<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Images;
use App\Models\Graph;
use App\Models\Datasheet;
use App\Models\Video;
use App\Models\Category;
use App\Models\Event;
use  App\Repositories\SearchTypeRepository;
use Illuminate\Http\Request;
use DB;
use View;
use Image;
use Validator, Response, File;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 28)->get();

        return view('frontend.products', compact('categories'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sub($slug)
    {
        $current_cat_count = Category::where('slug', $slug)->get();
        if (count($current_cat_count) >= 1) {
            $current_cat = Category::where('slug', $slug)->first();
            $id = $current_cat->id;
            $catMeta = DB::table('meta_infos')->where('category_id', $id)->latest()->first();

            $categories = Category::where('parent_id', $id)->latest()->get();
			$count_categories_parent_id=count($categories);
			$products = Product::where('category', $id)->get();

            return view('frontend.product-sub', compact('categories', 'products', 'current_cat', 'catMeta', 'count_categories_parent_id'));
        } else {
            return view('frontend.null-product-sub', compact('slug'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {
		$products = DB::table('products as p')
            ->leftJoin('categories as c', 'p.category', '=', 'c.id')
            ->select('p.*', 'c.name as category_name')
            ->where('p.slug', 'LIKE', $slug)
            ->first();
        //DB::select("SELECT *  FROM `products` WHERE slug='$slug' ORDER BY `products`.`created_at` DESC");

        $term = $products->id;

        $images = DB::table('images as pi')
            ->where('pi.product_id', $term)
            ->get();

        $graphs = DB::table('graphs as gr')
            ->where('gr.product_id', $term)
            ->get();

        $videos = DB::table('videos as pv')
            ->where('pv.product_id', $term)
            ->get();

        $datasheets = DB::table('datasheets as d')
            ->where('d.product_id', $term)
            ->get();

        $relatedProducts = Product::where('category', $products->category)->where('id', '!=', $products->id)->get();

        return view('frontend.product-details', compact('products', 'images', 'graphs', 'videos', 'relatedProducts', 'datasheets'));
    }



    public function events()
    {
        $events = Event::latest()->get();
        return view('frontend.news', compact('events'));
    }


    /*public function eventshow( $id)
    {
        // dd($id);
        $categories = Category::where('parent_id',28 )->get();
        $event = Event::findOrFail($id);
        $latests = Event::latest()->limit(10)->get();
        return view('frontend.news-details',compact('event','categories','latests'));
    }*/
    public function eventshow($slug)
    {
        $categories = Category::where('parent_id', 28)->get();

        $event = Event::where('slug', $slug)->first();

        $latests = Event::latest()->limit(10)->get();

        // $user = Event::where('slug', $slug)->get();

        return view('frontend.news-details', compact('event', 'categories', 'latests'));
    }
    public function list()
    {
        $categories = Category::where('parent_id', 28)->get();



        return view('welcome', compact('categories'));
    }
    public function home()
    {
        $events = Event::latest()->limit(3)->get();
        $prod = Product::latest()->get();

        $cate = Category::where('parent_id', '!=', 0)->latest()->get();

        return view('frontend.index', compact('events', 'cate', 'prod'));
    }
    public function gallery()
    {
        $pro = Product::latest()->get();
        $categories = Category::latest()->get();

        return view('frontend.gallery', compact('pro', 'categories'));
    }

    public function searchajaxload(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $a = DB::table('products')
                ->select('name as name', 'model_no as name', 'slug')
                ->where('name', 'LIKE', "%{$query}%")
                ->where('model_no', 'LIKE', "%{$query}%")
                ->get();
            $b = DB::table('categories')
                ->select('name as name', 'slug')
                ->where('name', 'LIKE', "%{$query}%")
                ->where('name', '!=', "ALUMINIUM")
                ->get();
            $collection = collect([$a, $b]);

            $data = $collection->collapse();

            $output = '';

            $output .= '<style>
                            .dropdown-menu{
                                        display:block; position:relative;top: calc(3em - -5px);border-radius: 16px;
                                        padding: 0.5em 1em;
                                        color: #666;
                                        font-size: 14px;
                                        overflow: auto;
                                        height: 500px;
                                        }                         
                            
                       </style>';
            if (count($data) != 0) {
                $output .= '<ul class="dropdown-menu" style="overflow: auto;border-radius: 16px">';
                foreach ($data as $row) {
                    $output .= '
                    <li id="data_list"><a href="' . route('search', $row->name) . '">' . $row->name . '</a></li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<ul class="dropdown-menu">';
                $output .= '<li><a href="#">No data</a></li>';
                $output .= '</ul>';
            }
            echo $output;
        }
    }
    public function search($slug)
    {
        $product_count = Product::where('model_no', $slug)->get();
        
        if (count($product_count) == 1) {
            $products = DB::table('products as p')
                ->leftJoin('categories as c', 'p.category', '=', 'c.id')
                ->select('p.*', 'c.name as category_name')
                ->where('p.slug', 'LIKE', $product_count['0']->slug)
                ->first();
            //DB::select("SELECT *  FROM `products` WHERE slug='$slug' ORDER BY `products`.`created_at` DESC");

            $term = $products->id;

            $images = DB::table('images as pi')
                ->where('pi.product_id', $term)
                ->get();

            $graphs = DB::table('graphs as gr')
                ->where('gr.product_id', $term)
                ->get();

            $videos = DB::table('videos as pv')
                ->where('pv.product_id', $term)
                ->get();

            $datasheets = DB::table('datasheets as d')
                ->where('d.product_id', $term)
                ->get();

            $relatedProducts = Product::where('category', $products->category)->where('id', '!=', $products->id)->get();

            return view('frontend.product-details', compact('products', 'images', 'graphs', 'videos', 'relatedProducts', 'datasheets'));
        } else {
			if (count($product_count) > 1) {
			    $products = Product::where('model_no', $slug)->get();
				return view('frontend.product-group-search', compact('products','slug'));
			}
            if (count($product_count) == 0) {			
            $current_cat = Category::where('name', $slug)->first();
		
            $id = $current_cat->id;
            $catMeta = DB::table('meta_infos')->where('category_id', $id)->latest()->first();

            $categories = Category::where('parent_id', $id)->latest()->get();
			$count_categories_parent_id=count($categories);
            $products = Product::where('category', $id)->get();

            return view('frontend.product-sub', compact('categories', 'products', 'current_cat', 'catMeta' ,'count_categories_parent_id'));
		  }	
        }
    }

    public function thanks()
    {
        return view('frontend.thank-you');
    }
}
