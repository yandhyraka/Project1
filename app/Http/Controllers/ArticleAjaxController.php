<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use DataTables;

class ArticleAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Article::where('status_active', 1)->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        if($row->published==1){
                            $status = '<span class="badge badge-primary">Published at<br>'.date('Y-m-d H:i:s', strtotime($row->published_at)).'</span>';
                        } else {
                            $status = '<span class="badge badge-danger">UnPublished</span>';
                        }

                        return $status;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editArticle">Edit</a>';
                           $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Image" class="image btn btn-primary btn-sm imageArticle">Image</a>';
                           
                           if($row->published==1){
                            $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="UnPublish" class="btn btn-warning btn-sm unpublishArticle">UnPublish</a>';
                           } else {
                            $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Publish" class="btn btn-warning btn-sm publishArticle">Publish</a>';
                           }
                           
                           $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteArticle">Delete</a>';
                           
                           return $btn;
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
        }
      
        return view('Admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->delete)&&$request->delete){
            Article::updateOrCreate(['id' => $request->article_id],
                    [
                        'status_active' => 0,
                    ]
                ); 
            return response()->json(['success'=>'Article deleted successfully.']);
        } else if (isset($request->publish)&&$request->publish){
            Article::updateOrCreate(['id' => $request->article_id],
                    [
                        'published' => 1,
                        'published_at' => date('Y-m-d H:i:s'),
                    ]
                ); 
            return response()->json(['success'=>'Article deleted successfully.']);
        } else if (isset($request->unpublish)&&$request->unpublish){
            Article::updateOrCreate(['id' => $request->article_id],
                    [
                        'published' => 0,
                        'published_at' => date('Y-m-d H:i:s'),
                    ]
                ); 
            return response()->json(['success'=>'Article deleted successfully.']);
        } else {
            Article::updateOrCreate(['id' => $request->article_id],
                    [
                        'title' => $request->title, 
                        'content' => $request->content,
                        'published' => 0,
                        'published_at' => date('Y-m-d H:i:s'),
                        'status_active' => 1,
                    ]
                );     
            return response()->json(['success'=>'Article saved successfully.']);   
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return response()->json(['success'=>'Article deleted successfully.']);
    }
}