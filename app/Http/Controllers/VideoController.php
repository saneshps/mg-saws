<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\Models\Video;
use App\Models\Product;
use Illuminate\Http\Request;

use Validator,Response,File; 

class VideoController extends Controller
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
    
        $query = DB::table('videos as child')
                ->join('products as p', 'p.id', '=', 'child.product_id')
                ->select('child.*',  'p.name as product')
                ->orderBy('child.id', 'DESC');

        $data = $query->paginate(10)->appends(request()->query());
        return view('pdf.index',compact('data'))
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
        return view('pdf.create',compact('product_id','Product'));
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
            'pdf' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
        ]);
        $input = $request->all();

        if ($video = $request->file('pdf')) {    
        //    $product_id=$request->input('product_id');
             $destinationPath = 'pdf/';
            $profileImage = date('YmdHis') . "." . $video->getClientOriginalExtension();
            // $path = $video->save(storage_path('app/public/productvideo/'.$profileImage));
            $video->move($destinationPath, $profileImage);
            $input['pdf']  = 'pdf/'.$profileImage;
            
           
        }

    
        Video::create($input);
        
        return redirect()->route('products.show',$product_id)
                        ->with('success','product image created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video, $id)
    {
        $pdf = Video::findOrFail($id);
       // $Product=Video::find($id);
        $pdf->delete();
        return redirect()->back()->with('success', '  created successfully.');
    }
}
