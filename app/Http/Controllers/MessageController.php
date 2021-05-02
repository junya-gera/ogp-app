<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Message;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function store(Request $request) {
        $params = $request->json()->all();
        $content = $params['message'];
        // ランダムで一意な識別子を $id に代入
        $id = Str::uuid();

        // id + .jpg を画像のファイル名とする
        $file = $id->toString() . '.jpg';
        Message::create([
            'id' => $id,
            'content' => $content,
            'file_path' => $file,
        ]);

        return response()->json($id);
    }
}


?>
