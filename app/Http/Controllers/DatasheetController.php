<?php

namespace App\Http\Controllers;

use App\Models\Datasheet;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatasheetController extends Controller
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
            'file' => 'required|file|mimetypes:application/pdf'
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->product_id . '.' . $request->file('file')->extension();
            $uploadStatus = $request->file('file')->move(public_path('storage/pdf/'), $fileName);
            if ($uploadStatus) {
                $data['file_name'] = 'pdf/' . $fileName;
                $data['product_id'] = $request->product_id;
                $createStatus = Datasheet::create($data);
                if ($createStatus) {
                    Toastr::success('Datasheet Added Successfully...', 'Success', ["positionClass" => "toast-bottom-right"]);
                    return redirect()->route('products.edit', $request->product_id);
                }
            }
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datasheet = Datasheet::findOrFail($id);
        $product_id = $datasheet->product_id;
        $status = DB::table('datasheets')->delete($id);
        if ($status) {
            Toastr::success('Datasheet Deleted Successfully...', 'Success', ["positionClass" => "toast-bottom-right"]);
        } else {
            Toastr::error('Some error occurred...', 'Error', ["positionClass" => "toast-bottom-right"]);
        }
        return redirect()->route('products.edit', $product_id);
    }

    public function removeDatasheet($id)
    {
        $datasheet = Datasheet::findOrFail($id);
        $product_id = $datasheet->product_id;

        $this->imageDelete($datasheet->file_name);

        $status = DB::table('datasheets')->delete($id);

        if ($status) {
            Toastr::success('Datasheet Deleted Successfully...', 'Success', ["positionClass" => "toast-bottom-right"]);
        } else {
            Toastr::error('Some error occurred...', 'Error', ["positionClass" => "toast-bottom-right"]);
        }
        return redirect()->route('products.edit', $product_id);
    }

    //  image file deleted   
    private function imageDelete($imageurl)
    {
        if (!$imageurl) return false;

        $image_path = storage_path('app/public/') . $imageurl; // upload path  
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }
}
