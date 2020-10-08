<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $to_return['header'] = array();
        $data_top = Article::where('published', 1)->with('Image')->orderBy('published_at')->offset(0)->limit(3)->get();
        if ($data_top->toArray() !== null && !empty($data_top->toArray())) {
            foreach ($data_top as $data_top) {
                $temp = array();
                $temp['date'] = date('d F Y H:i:s', strtotime($data_top->published_at));
                $temp['title'] = $data_top->title;
                $temp['content'] = substr($data_top->content, 0, 100) . '...';

                if (isset($data_top->image[0]->url) && !empty($data_top->image[0]->url)) {
                    $temp['image'] = url('/images/' . $data_top->image[0]->url);
                } else {
                    $temp['image'] = url('/images/no-image.png');
                }

                $to_return['header'][] = $temp;
            }

            if (sizeof($to_return['header']) < 3) {
                for ($i = 0; $i < (4 - sizeof($to_return['header'])); $i++) {
                    $temp = array();
                    $temp['image'] = url('/images/no-image.png');
                    $temp['date'] = '';
                    $temp['title'] = '';
                    $temp['content'] = '';

                    $to_return['header'][] = $temp;
                }
            }
        } else {
            for ($i = 0; $i < 3; $i++) {
                $temp = array();
                $temp['image'] = url('/images/no-image.png');
                $temp['date'] = '';
                $temp['title'] = '';
                $temp['content'] = '';

                $to_return['header'][] = $temp;
            }
        }

        $to_return['article'] = array();
        $data_card = Article::where('published', 1)->with('Image')->orderBy('published_at')->offset(3)->limit(9)->get();
        if ($data_card->toArray() !== null && !empty($data_card->toArray())) {
            foreach ($data_card as $data_card) {
                $temp = array();
                $temp['date'] = date('d F Y H:i:s', strtotime($data_card->published_at));
                $temp['title'] = $data_card->title;
                $temp['content'] = substr($data_card->content, 0, 100) . '...';

                if (isset($data_card->image[0]->url) && !empty($data_card->image[0]->url)) {
                    $temp['image'] = url('/images/' . $data_card->image[0]->url);
                } else {
                    $temp['image'] = url('/images/no-image.png');
                }

                $to_return['article'][] = $temp;
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

        $to_return['pagination'] = array();
        $total_page = 1;
        $data_nav = Article::orderBy('published_at')->offset(3)->limit(45)->get();
        if ($data_nav->toArray() !== null && !empty($data_nav->toArray())) {
            $total_page = sizeof($data_nav) / 9;
        }

        for ($i = 0; $i < $total_page; $i++) {
            $temp = array();
            $temp['number'] = $i + 1;
            $temp['url'] = route('dashboards', ($i + 1));
            $to_return['pagination'][] = $temp;
        }

        if ($total_page > 1) {
            $to_return['next'] = route('dashboards', 2);
        }
        return view('Dashboard', $to_return);
    }

    public function show($id)
    {
        $to_return['header'] = array();
        $data_top = Article::where('published', 1)->with('Image')->orderBy('published_at')->offset(0)->limit(3)->get();
        if ($data_top->toArray() !== null && !empty($data_top->toArray())) {
            foreach ($data_top as $data_top) {
                $temp = array();
                $temp['date'] = date('d F Y H:i:s', strtotime($data_top->published_at));
                $temp['title'] = $data_top->title;
                $temp['content'] = substr($data_top->content, 0, 100) . '...';

                if (isset($data_top->image[0]->url) && !empty($data_top->image[0]->url)) {
                    $temp['image'] = url('/images/' . $data_top->image[0]->url);
                } else {
                    $temp['image'] = url('/images/no-image.png');
                }

                $to_return['header'][] = $temp;
            }

            if (sizeof($to_return['header']) < 3) {
                for ($i = 0; $i < (4 - sizeof($to_return['header'])); $i++) {
                    $temp = array();
                    $temp['image'] = url('/images/no-image.png');
                    $temp['date'] = '';
                    $temp['title'] = '';
                    $temp['content'] = '';

                    $to_return['header'][] = $temp;
                }
            }
        } else {
            for ($i = 0; $i < 3; $i++) {
                $temp = array();
                $temp['image'] = url('/images/no-image.png');
                $temp['date'] = '';
                $temp['title'] = '';
                $temp['content'] = '';

                $to_return['header'][] = $temp;
            }
        }

        $to_return['article'] = array();
        $data_card = Article::where('published', 1)->with('Image')->orderBy('published_at')->offset(3 + (9 * ($id - 1)))->limit(9)->get();
        
        if ($data_card->toArray() !== null && !empty($data_card->toArray())) {
            foreach ($data_card as $data_card) {
                $temp = array();
                $temp['date'] = date('d F Y H:i:s', strtotime($data_card->published_at));
                $temp['title'] = $data_card->title;
                $temp['content'] = substr($data_card->content, 0, 100) . '...';

                if (isset($data_card->image[0]->url) && !empty($data_card->image[0]->url)) {
                    $temp['image'] = url('/images/' . $data_card->image[0]->url);
                } else {
                    $temp['image'] = url('/images/no-image.png');
                }

                $to_return['article'][] = $temp;
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

        $to_return['pagination'] = array();
        if ($id > 2) {
            $temp = array();
            $temp['number'] = $id - 2;
            $temp['url'] = route('dashboards', ($id - 2));
            $to_return['pagination'][] = $temp;

            $temp = array();
            $temp['number'] = $id - 1;
            $temp['url'] = route('dashboards', ($id - 1));
            $to_return['pagination'][] = $temp;
        } else if ($id > 1) {
            $temp = array();
            $temp['number'] = $id - 1;
            $temp['url'] = route('dashboards', ($id - 1));
            $to_return['pagination'][] = $temp;
        }

        $temp = array();
        $temp['number'] = $id;
        $temp['url'] = route('dashboards',  $id);
        $to_return['pagination'][] = $temp;

        $total_page = 0;
        $data_nav = Article::orderBy('published_at')->offset(3 + (9 * ($id)))->limit(45)->get();
        if ($data_nav->toArray() !== null && !empty($data_nav->toArray())) {
            $total_page = sizeof($data_nav) / 9;
        }

        for ($i = 0; $i < $total_page; $i++) {
            if (($id > 1 && $i == 2)||($id > 2 && $i == 1)) {
                break;
            }

            $temp = array();
            $temp['number'] = $id + 1;
            $temp['url'] = route('dashboards', ($id + 1));
            $to_return['pagination'][] = $temp;
        }

        if ($id != 1) {
            $to_return['previous'] = route('dashboards', ($id - 1));
        }

        if ($total_page != 0) {
            $to_return['next'] = route('dashboards', ($id + 1));
        }

        return view('Dashboard', $to_return);
    }
}
