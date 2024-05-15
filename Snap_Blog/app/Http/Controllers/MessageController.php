<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Models\Message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
    }


    public function store(CreateMessageRequest $request)
    {
        try {
            Message::create([
                "sender_id" => Auth::id(),
                "receiver_id" => $request->receiver_id,
                "message" => $request->message,
            ]);
            return back();
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return back();
        }
    }

    public function show($id)
    {
        try {
            $senderMessages = Message::where("sender_id", "=", Auth::id())
                ->where("receiver_id", "=", $id)
                ->orderBy("created_at", "DESC")
                ->limit(10)->get();

            $receiverMessages = Message::where("sender_id", "=", $id)
                ->where("receiver_id", "=", Auth::id())
                ->orderBy("created_at", "DESC")
                ->limit(10)->get();

            return view('messages.index', compact('senderMessages' , 'receiverMessages'));
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");
        }
    }

    public function edit()
    {
    }

    public function update()
    {
    }


    public function destroy(Message $message)
    {
        try {
            $message->delete();
            toastr("Message deleted successfully");
            return back();
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("users.index");
        }
    }
}
