<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use DataTables;

class ImageAjaxController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Image::where('status_active', 1)->where('article_id', $request->article_id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('images', function ($row) {
                    $url = url('/images/' . $row->url);
                    $images = '<img src="' . $url . '" style="height: 200px;">';

                    return $images;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteArticle">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['images', 'action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        if ($request->file('file') !== null && !empty($request->file('file'))) {
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
        }
    }
}
