<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Images;
use App\Models\Graph;
use App\Models\Video;
use App\Models\Category;
use App\Models\Datasheet;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use View;
use Image;
use Validator, Response, File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $query = DB::table('products as child')
            ->join('categories as c', 'c.id', '=', 'child.category')
            ->select('child.*', 'c.name as category')
            ->orderBy('child.id', 'DESC');

        $data = $query->paginate(100)->appends(request()->query());

        //$products = Product::latest()->paginate(5);

        return view('product.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        if ($request->method() == 'GET') {
            return view('product.create', compact('categories'));
        }
        // return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            //'option' => 'required',
            //'package' => 'required',
            // 'video_link' => 'required',
            'category' => 'required',
            'model_no' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_alt' => 'required',
        ]);

        $input = $request->all();

        $time = Carbon::parse(Carbon::now())->format("hms");
        $replaceSpace = str_replace(" ", "-", strtolower($request->name));
        $replaceComma = str_replace(",", "-", $replaceSpace);
        $replaceSlash = str_replace("/", "-", $replaceComma);
        $replaceUnderscore = str_replace("_", "-", $replaceSlash);
        $replaceSemicolon = str_replace(";", "-", $replaceUnderscore);
        $replaceDot = str_replace(".", "-", $replaceSemicolon);
        $slug = $time . "-" . $replaceDot;
        $input['slug'] = $slug;
        $input['metatitle'] = "";
        $input['metadescription'] = "";

        if ($image = $request->file('image')) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image = Image::make($image);
            $path = $image->save(storage_path('app/public/product/' . $profileImage));
            $input['image'] = 'product/' . $profileImage;
        }

        Product::create($input);

        Toastr::success("Product Added Successfully...", "Success", ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return redirect()->route('viewProductUsingSlug', $product->slug);
        //$images = Images::get();
        // $images = Images::where('product_id',$product->id  )->latest()->limit(4)->get();

        // $graphs = Graph::where('product_id',$product->id  )->latest()->limit(3)->get();

        // $datasheet = Datasheet::where('product_id',$product->id  )->latest()->first();

        // $categories = Category::where('id',$product->category  )->get();
        //dd($images);

        // return view('product.show',compact('product','images','graphs','datasheet','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $cate = Category::where('id', $product->category)->get();
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        $datasheet = Datasheet::where('product_id', $product->id)->latest('id')->first();
        $graphs = Graph::where('product_id', $product->id)->latest('id')->limit(3)->get();
        $images = Images::where('product_id', $product->id)->latest('id')->limit(4)->get();
        if ($request->method() == 'GET') {
            return view('product.edit', compact('product', 'categories', 'cate', 'datasheet', 'graphs', 'images'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            //'option' => 'required',
            //'package' => 'required',
            // 'video_link' => 'required',
            'category' => 'required',
            'model_no' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ]);


        $input = $request->all();
		$input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->slug)));
        if ($image = $request->file('image')) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image = Image::make($image);
            $path = $image->save(storage_path('app/public/product/' . $profileImage));
            $input['image'] = 'product/' . $profileImage;
        } else {
            unset($input['image']);
        }

        $product->update($input);

        Toastr::success("Product Updated Successfully...", "Success", ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image != '') {
            $this->imageDelete($product->image);
        }
        $product->delete();

        Toastr::success("Product Deleted Successfully...", "Success", ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('products.index');
    }

    private function imageDelete($imageurl)
    {
        if (!$imageurl) return false;

        $image = storage_path('app/public/') . $imageurl; // upload path
        if (File::exists($image)) {
            File::delete($image);
        }
    }

    public function viewProductUsingSlug($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $images = Images::where('product_id', $product->id)->latest()->limit(4)->get();

        $graphs = Graph::where('product_id', $product->id)->latest()->limit(3)->get();

        $datasheet = Datasheet::where('product_id', $product->id)->latest()->first();

        $categories = Category::where('id', $product->category)->get();
        //dd($images);

        return view('product.show', compact('product', 'images', 'graphs', 'datasheet', 'categories'));
    }
}
