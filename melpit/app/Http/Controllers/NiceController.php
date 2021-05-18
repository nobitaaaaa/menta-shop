<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Item;
use App\Models\Nice;
use App\Models\Information;


class NiceController extends Controller
{
    /**
     * いいね追加
     */

    public function nice(Item $item, $id, Request $request)
    {
        $nice = new Nice();
        $item = Item::find($id);
        $nice->item_id = $item->id;
        $nice->ip = $request->ip();
        $nice->save();
        return back();
    }

    /**
     * いいね削除
     */

    public function unnice(Item $item, $id, Request $request)
    {
        $user = $request->ip();
        $item = Item::find($id);
        $nice = Nice::where('item_id', $item->id)->where('ip', $user)->first();
        $nice->delete();
        return back();
    }
}
