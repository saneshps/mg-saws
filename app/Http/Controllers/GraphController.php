<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\Models\Graph;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;
use Validator,Response,File;
class GraphController extends Controller
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

        $query = DB::table('graphs as child')
                    ->join('products as p', 'p.id', '=', 'child.product_id')
                    ->select('child.*',  'p.name as product')
                    ->orderBy('child.id', 'DESC');

        $data = $query->paginate(10)->appends(request()->query());



        //$graphs = Graph::latest()->paginate(500);
    
        return view('graph.index',compact('data'))
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
        return view('graph.create',compact('product_id','Product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id )
    {
        $request->validate([
            'graph' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('graph')) {

            // $product_id=$request->input('product_id');
            // $destinationPath = 'graph/'.$product_id;
            // $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // $image->move($destinationPath, $profileImage);
            // $input['graph'] = "$profileImage";


            //$product_id=$request->input('product_id');
            //$destinationPath = 'productimage/'.$product_id;
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image = Image::make($image);
            $path = $image->save(storage_path('app/public/productgraph/'.$profileImage));
            //$image->move($destinationPath, $profileImage);
            $input['graph'] = 'productgraph/'.$profileImage;
            Toastr::success('Graph Added Successfully...', 'Success', ["positionClass" => "toast-bottom-right"]);
        }
    
        Graph::create($input);
     
        return redirect()->route('products.edit',$product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function show(Graph $graph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function edit(Graph $graph)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graph $graph)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graph $graph)
    {
        if($graph->graph != ''){
            $this->imageDelete($graph->graph);
        }
        $graph->delete();
        Toastr::success('Graph Deleted Successfully...', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
        // return redirect()->route('graphs.index')
        //                 ->with('success','graphs deleted successfully');
    }
    
    public function removeGraph($id)
    {
        $graph = Graph::findOrFail($id);
        if($graph->graph != '')
        {
            $this->imageDelete($graph->graph);
        }
        $deleteStatus = DB::table('graphs')->delete($id);
        if($deleteStatus)
        {
            Toastr::success('Graph Deleted Successfully...', 'Success', ["positionClass" => "toast-bottom-right"]);
        }
        return redirect()->back();
    } 

    private function imageDelete($imageurl){
        if(!$imageurl) return false;
       
        $image = storage_path('app  /public/'). $imageurl; // upload path
        if(File::exists($image)) {
            File::delete($image);
        }    
    }
}
