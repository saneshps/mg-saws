<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use View;
use App\Models\MetaInfo;
use Image;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $query = DB::table('categories as child')
            ->leftJoin('categories as parent', 'child.parent_id', '=', 'parent.id')
            ->select('child.*', 'parent.name as parent',)
            ->orderBy('child.id', 'DESC');

        $data = $query->paginate(100)->appends(request()->query());
        // $categories = Category::latest()->paginate(500);
        return view('category.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create(Request $request)
    {
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        if ($request->method() == 'GET') {
            return view(' category.create-category', compact('categories'));
        }
        if ($request->method() == 'POST') {

            $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:categories',
                'tumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'parent_id' => 'nullable|numeric',
            ]);
            $input = $request->all();
            $input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->slug)));

            if ($image = $request->file('tumb')) {

                $destinationPath = 'tumb/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image = Image::make($image);
                $path = $image->save(storage_path('app/public/tumb/' . $profileImage));
                //$image->move($destinationPath, $profileImage);
                $input['tumb'] = 'tumb/' . $profileImage;
            }
            Category::create($input);
            // $validator = $request->validate([
            //     'name'      => 'required',
            //     'slug'      => 'required|unique:categories',
            //     'tumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //     'parent_id' => 'nullable|numeric',

            // ]);

            // Category::create([
            //     'name' => $request->name,
            //     'slug' => $request->slug,
            //     'parent_id' =>$request->parent_id,

            // ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }





    public function edit($id)
    {
        $category = Category::find($id);
        $parents = Category::where('parent_id', null)->orderby('name', 'asc')->get();

        $metaDetails = MetaInfo::where('category_id', $category->id)->latest()->first();

        $category->meta_title   = ($metaDetails) ? $metaDetails->meta_title : '';
        $category->meta_content = ($metaDetails) ? $metaDetails->meta_content : '';

        return view('category.edit', compact('category', 'parents', 'metaDetails'));
    }







    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name'      => 'required',
            //'slug'      => 'required|unique:categories',
            // 'tumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|numeric',
        ]);
        $input = $request->all();
		
        $input['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->slug)));
        if ($image = $request->file('tumb')) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image = Image::make($image);
            $path = $image->save(storage_path('app/public/tumb/' . $profileImage));
            $input['tumb'] = 'tumb/' . $profileImage;
        } else {
            unset($input['tumb']);
        }
        if (isset($input['meta_title']) || isset($input['meta_content'])) {
            $mdata = [
                'meta_title' => $input['meta_title'],
                'meta_content' => $input['meta_content'],
                'category_id' => $category->id
            ];

            $meta = MetaInfo::where('category_id', $category->id)->latest()->first();
            if ($meta) {
                // update
                $meta->update($mdata);
            } else {
                // insert
                MetaInfo::insert($mdata);
            }
            unset($input['meta_title']);
            unset($input['meta_content']);
        }
		   $input['description'] = $request->desc;
      
          $category->update($input);
		

       
        return redirect()->route('category.edit',$category->id)
            ->with('success', 'Category has been updated successfully.');
    }







    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Product deleted successfully');
    }
}
