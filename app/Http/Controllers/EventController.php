<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use DB;
use View;
use Image;
use Validator,Response,File; 
use Brian2694\Toastr\Facades\Toastr;
class EventController extends Controller
{  
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
    
        return view('events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
        $replaceSpace = str_replace(" ", "-", strtolower($request->name));
        $replaceComma = str_replace(",","-", $replaceSpace);
        $replaceSlash = str_replace("/","-",$replaceComma);
        $replaceUnderscore = str_replace("_","-",$replaceSlash);
        $replaceSemicolon = str_replace(";","-",$replaceUnderscore);
        $replaceDot = str_replace(".","-",$replaceSemicolon);
        $slug = $replaceDot;
        $input['slug'] = $slug;
  
        if ($image = $request->file('image')) {
            // $destinationPath = 'image/';
            // $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // $image->move($destinationPath, $profileImage);
            // $input['image'] = "$profileImage";

            //$product_id=$request->input('product_id');
            //$destinationPath = 'productimage/'.$product_id;
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image = Image::make($image);
            $path = $image->save(storage_path('app/public/event/'.$profileImage));
            //$image->move($destinationPath, $profileImage);
            $input['image'] = 'event/'.$profileImage;
        }
    
        Event::create($input);

        Toastr::success("Blog Added Successfully...", "Success", ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            // $destinationPath = 'image/';
            // $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // $image->move($destinationPath, $profileImage);
            // $input['image'] = "$profileImage";


            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image = Image::make($image);
            $path = $image->save(storage_path('app/public/event/'.$profileImage));
            //$image->move($destinationPath, $profileImage);
            $input['image'] = 'event/'.$profileImage;
        }else{
            unset($input['image']);
        }
          
        $event->update($input);

        Toastr::success("Blog Updated Successfully...", "Success", ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        
        $event->delete();
     
        Toastr::success("Event deleted Successfully...", "Success", ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('events.index');
    }
}
