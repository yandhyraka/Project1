<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $param = $request->search;

        $to_return['article'] = array();
        $data_card = Article::where('published', 1)->with('Image')->orderBy('published_at')->get();
        if ($data_card->toArray() !== null && !empty($data_card->toArray())) {
            foreach ($data_card as $data_card) {
                if (strpos(strtolower($data_card->title), strtolower($param)) !== false || strpos(strtolower($data_card->content), strtolower($param)) !== false) {
                    $temp = array();
                    $temp['date'] = date('d F Y H:i:s', strtotime($data_card->published_at));
                    $temp['title'] = $data_card->title;
                    $temp['content'] = substr($data_card->content, 0, 100) . '...';
                    $temp['url'] = route('articles', $data_card->id);

                    if (isset($data_card->image[0]->url) && !empty($data_card->image[0]->url)) {
                        $temp['image'] = url('/images/' . $data_card->image[0]->url);
                    } else {
                        $temp['image'] = url('/images/no-image.png');
                    }

                    $to_return['article'][] = $temp;
                }
            }
        }

        if (sizeof($to_return['article']) < 3) {
            for ($i = 0; $i <= (3 - sizeof($to_return['article'])); $i++) {
                $temp = array();
                $temp['no_article'] = true;
                $to_return['article'][] = $temp;
            }
        } else if (sizeof($to_return['article']) % 3 != 0) {
            for ($i = 0; $i <= (3 - (sizeof($to_return['article']) % 3)); $i++) {
                $temp = array();
                $temp['no_article'] = true;
                $to_return['article'][] = $temp;
            }
        }

        return view('Search', $to_return);
    }
}
