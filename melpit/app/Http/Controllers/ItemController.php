<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Item;
use App\Models\Nice;





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
        $items = DB::table('items')->paginate(6);

        return view('items.index', compact('items'));
    }

    public function postItemsList()
    {

        /**
         * 商品一覧を表示する
         * @var view
         */




        //6商品ごとにページネーション
        //$items = Item::Paginate(6);
        $items = DB::table('items')->paginate(6);

        return view('items.index', compact('items'));
    }

    public function detail(Item $item, Request $request)
    {
        /**
         * 
         * 商品詳細
         */

        $itemId = $request->itemId;
        $itemDetails = DB::table('items')
            ->where('id', $itemId)
            ->first();

        /**
         * 
         * いいね機能
         */
        $item = Item::all()->where('id', $itemId)->first();
        $nice = Nice::all();
        $request = request();
        $ip = $request->ip();
        $nice = Nice::where('item_id', $item->id)->where('ip', $ip)->first();

        return view('items.itemDetail', compact('itemDetails', 'item', 'nice'));
    }





    public function result(Request $request)
    {
        /**
         * 検索結果を取得
         */

        $keyword = $request->input('keyword');

        //検索結果で何か（keywordが）送られてきたら
        if (isset($keyword)) {
            $results = DB::table('items')
                ->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('detail', 'like', '%' . $keyword . '%')
                ->paginate(6);

            return view('items.search', compact('results'));
        } elseif (!isset($keyword)) {

            $items = DB::table('items')->paginate(10);

            return view('items.index', compact('items'));
        }
    }
}
