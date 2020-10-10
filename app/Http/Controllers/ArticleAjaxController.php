<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use DataTables;
use Symfony\Component\VarDumper\Cloner\Data;

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
                ->addColumn('content_mini', function ($row) {
                    $content = substr($row->content, 0, 100) . '...';

                    return $content;
                })
                ->addColumn('status', function ($row) {
                    if ($row->published == 1) {
                        $status = '<span class="badge badge-primary">Published at<br>' . date('Y-m-d H:i:s', strtotime($row->published_at)) . '</span>';
                    } else {
                        $status = '<span class="badge badge-danger">UnPublished</span>';
                    }

                    return $status;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editArticle">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="image btn btn-success btn-sm imageArticle">Image</a>';

                    if ($row->published == 1) {
                        $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="UnPublish" class="btn btn-warning btn-sm unpublishArticle">UnPublish</a>';
                    } else {
                        $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Publish" class="btn btn-warning btn-sm publishArticle">Publish</a>';
                    }

                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteArticle">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
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
        if (isset($request->delete) && $request->delete) {
            Article::updateOrCreate(
                ['id' => $request->article_id],
                [
                    'status_active' => 0,
                ]
            );
            return response()->json(['success' => 'Article deleted successfully.']);
        } else if (isset($request->publish) && $request->publish) {
            Article::updateOrCreate(
                ['id' => $request->article_id],
                [
                    'published' => 1,
                    'published_at' => date('Y-m-d H:i:s'),
                ]
            );
            return response()->json(['success' => 'Article deleted successfully.']);
        } else if (isset($request->unpublish) && $request->unpublish) {
            Article::updateOrCreate(
                ['id' => $request->article_id],
                [
                    'published' => 0,
                    'published_at' => date('Y-m-d H:i:s'),
                ]
            );
            return response()->json(['success' => 'Article deleted successfully.']);
        } else if ($request->file('file') !== null && !empty($request->file('file'))) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            return response()->json(['success' => $imageName]);
        } else if (isset($request->image_detail_article_id) && !empty($request->image_detail_article_id)) {
            Image::updateOrCreate(
                ['id' => $request->article_id],
                [
                    'article_id' => $request->image_detail_article_id,
                    'url' => $request->image_url,
                    'status_active' => 1,
                ]
            );
            return response()->json(['success' => 'Image uploaded successfully.']);
        } else {
            Article::updateOrCreate(
                ['id' => $request->article_id],
                [
                    'title' => $request->title,
                    'content' => $request->content,
                    'published' => 0,
                    'published_at' => date('Y-m-d H:i:s'),
                    'status_active' => 1,
                ]
            );
            return response()->json(['success' => 'Article saved successfully.']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::where('id', $id)->with('Image')->get();
        if ($data->toArray() !== null && !empty($data->toArray())) {
            if (isset($data[0]->image[0]->url) && !empty($data[0]->image[0]->url)) {
                $to_return['header'] = url('/images/' . $data[0]->image[0]->url);
            } else {
                $to_return['header'] = url('/images/no-image.png');
            }

            $to_return['date'] = date('d F Y H:i:s', strtotime($data[0]->published_at));
            $to_return['title'] = $data[0]->title;
            $to_return['content'] = $data[0]->content;

            $to_return['carousel'] = array();
            foreach ($data[0]->image as $image) {
                $to_return['carousel'][] = url('/images/' . $image->url);
            }
            return view('Article', $to_return);
        } else {
            return abort(404);
        }
    }

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
        return response()->json(['success' => 'Article deleted successfully.']);
    }
}
