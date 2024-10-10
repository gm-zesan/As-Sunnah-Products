<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use DataTables;
class BlogController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blogs = Blog::get()->all();
            return DataTables::of($blogs)
                ->addIndexColumn()
                ->addColumn('category_id', function($row) {
                    return $row->category->name;
                })
                ->addColumn('created_by', function($row) {
                    return $row->createdBy->contactBook->first_name . ' ' . $row->createdBy->contactBook->last_name;
                })
                ->addColumn('created_at', function($row) {
                    return date('F d, Y', strtotime($row->created_at));
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.blogs.index',['blogs' => Blog::all()]);
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'The title field is required.',
        ]);
        $data = $request->all();
        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/blog/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }
        $data['created_by'] = auth()->user()->id;

        Blog::create($data);

        return redirect()->route('blogs')->with('success','Blog created successfully.');
    }

    public function edit($id)
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.edit',[
            'blog' => Blog::find($id),
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
        ]);
        $data = $request->all();
        $old_data = Blog::find($id);
        
        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/blog/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image != ""){
                if(file_exists($old_data->image)){
                    unlink($old_data->image);
                }
            }
        }
        Blog::find($id)->update($data);

        return redirect()->route('blogs')->with('success','Blog updated successfully.');
    }

    public function delete($id){
        $blog = Blog::find($id);
        if($blog->image != ""){
            if(file_exists($blog->image)){
                unlink($blog->image);
            }
        }
        $blog->delete();
        return redirect()->route('blogs')->with('success','Blog deleted successfully.');
    }
}
