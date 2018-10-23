<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\Frontend\Chat\SendChatEvent;
use App\Http\Requests\Api\Chat\GetMessagesRequest;
use App\Http\Requests\Api\Chat\SendMessageRequest;
use App\Models\Chat\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allChats = Chat::where('sender_id', \Auth::id())
            ->orWhere('receiver_id', \Auth::id())
            ->with('sender')
            ->whereRaw('id = (select max(`id`) from chats)')
            ->groupBy('order_id')
            ->get();
        return response()->json([
            'chats_summery' => $allChats,
        ]);
    }

    public function getOrderChat(GetMessagesRequest $request)
    {
        $messagesList = Chat::where('order_id', $request->order_id)
            ->with('sender', 'receiver')
            ->orderBy('id', 'ASC')
            ->get();
        return response()->json([
            'chats' => $messagesList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SendMessageRequest $request)
    {
        $chat = new Chat();
        $chat->order_id = $request->order_id;
        $chat->sender_id = \Auth::id();
        $chat->receiver_id = $request->receiver_id;
        $chat->message = $request->message;
        $chat->save();
        event(new SendChatEvent($chat));
        return response()->json([
            'chat' => $chat->where('id', $chat->id)->with('sender', 'receiver')->first()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
