<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index() {
        $articles = [
            [
                'articleTitle' => 'Malaysia: Ageing Population',
                'articleDesc' => 'Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...',
                'articleImg' => 'https://source.unsplash.com/400x300/?senior'
            ],
            [
                'articleTitle' => 'Malaysia: Ageing Population',
                'articleDesc' => 'Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...',
                'articleImg' => 'https://source.unsplash.com/400x300/?senior'
            ],
            [
                'articleTitle' => 'Malaysia: Ageing Population',
                'articleDesc' => 'Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...',
                'articleImg' => 'https://source.unsplash.com/400x300/?senior'
            ],
            [
                'articleTitle' => 'Malaysia: Ageing Population',
                'articleDesc' => 'Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...',
                'articleImg' => 'https://source.unsplash.com/400x300/?senior'
            ],
        ];

        return view("pages.index")->with(['articles' => $articles]);
    }
}
