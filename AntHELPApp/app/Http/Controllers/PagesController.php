<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

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

        $categories = $this->getCategories();
        return view("pages.index")->with(['articles' => $articles, "service_categories" => $categories]);
    }

    public static function getCategories() {
        $services = Service::all();
        $categories = [];

        foreach($services as $service) {
            $categories[] = $service->category;
        }

        return array_unique($categories);
    }
}
