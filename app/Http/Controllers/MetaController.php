<?php

namespace App\Http\Controllers;

use App\Models\MetaInfo;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'meta_title' => 'required',
            'meta_content' => 'required',
            'category_id' => 'required'
        ]);

        $data = $request->all();
        $status = MetaInfo::create($data);
        if($status)
        {
            Toastr::success("Meta Details Added Successfully...", "Success", ["positionClass" => "toast-bottom-right"]);
        }
        else
        {
            Toastr::error("Some error occured...", "Error", ["positionClass" => "toast-bottom-right"]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meta = MetaInfo::findOrFail($id);
        $data = $request->all();
        $status = $meta->fill($data)->save();
        if($status)
        {
            Toastr::success("Meta Details Updated Successfully...", "Success", ["positionClass" => "toast-bottom-right"]);
        }
        else
        {
            Toastr::error("Some error occured...", "Error", ["positionClass" => "toast-bottom-right"]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
