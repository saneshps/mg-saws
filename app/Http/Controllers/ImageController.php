<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use Validator,Response,File; 
class ImageController extends Controller
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
        //$images = Images::latest()->paginate(500);
        $query = DB::table('images as child')
                    ->join('products as p', 'p.id', '=', 'child.product_id')
                    ->select('child.*',  'p.name as product')
                    ->orderBy('child.id', 'DESC');

        $data = $query->paginate(10)->appends(request()->query());



    
        return view('images.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $Product=Product::find($product_id);
        return view('images.create',compact('product_id','Product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $request->validate([
            'file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $input = $request->all();
       // dd($request->all());
       
       






        if ($image = $request->file('file_name')) {

            //$product_id=$request->input('product_id');
            //$destinationPath = 'productimage/'.$product_id;
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image = Image::make($image);
            $path = $image->save(storage_path('app/public/productimage/'.$profileImage));
            //$image->move($destinationPath, $profileImage);
            $input['file_name'] = 'productimage/'.$profileImage;
            
        }
    
        Images::create($input);
        Toastr::success('Image Added Successfully...', 'success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('products.edit',$product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
   
    public function destroy(Images $image)
    {
        if($image->file_name != ''){
            $this->imageDelete($image->file_name);
        }
        $image->delete();
        return redirect()->back()->with('success', '  created successfully.');
        // return redirect()->route('images.index')
        //                 ->with('success',' deleted successfully');
    }

    public function removeImage($id)
    {
        $image = Images::findOrFail($id);
        if($image->file_name != ''){
            $this->imageDelete($image->file_name);
        }
        $deleteStatus = DB::table('images')->delete($id);
        if($deleteStatus)
        {
            Toastr::success('Image Deleted Successfully...', 'Success', ["positionClass" => "toast-bottom-right"]);
        }
        return redirect()->back();
    }

    private function imageDelete($imageurl){
        if(!$imageurl) return false;
       
        $image = storage_path('app/public/'). $imageurl; // upload path
        if(File::exists($image)) {
            File::delete($image);
        }
        
    }
    
}
