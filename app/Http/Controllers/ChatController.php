<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = Message::create([
            'username' => session('username', 'Guest'),
            'message' => $request->input('message'),
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }
}
