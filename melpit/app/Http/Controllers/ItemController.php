<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function itemsList()
    {

        /**
         * 商品一覧を表示する
         * @var view
         */




        //6商品ごとにページネーション
        //$items = Item::Paginate(6);
        $items = DB::table('items')->get();

        return view('items.index', compact('items'));
    }
}
