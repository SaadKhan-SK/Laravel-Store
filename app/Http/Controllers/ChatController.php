<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Inbox;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = new Message();
        
        $messages = $message->create([
            'inbox_id' => $request->input('inbox_id'),
            'content' => $request->input('content'),
            'sender_id' => $user->id,
            'receiver_id' => $request->input('receiver_id'),
        ]);
        // Broadcast the message to the Pusher channel
        event(new MessageSent($messages));

        return response()->json(['message' => 'Message sent successfully']);
    }

    public function fetchMessages(Request $request,$id)
    {
        $user = Auth::user();
        $inboxId = $id;

        $messages = Inbox::where('id', $inboxId)->with('messages','sender','receiver','getProfile')->get();

        // echo'<pre>';
        // echo print_r($messages->toArray());
        // exit;
        return response()->json(['messages' => $messages]);
    }

    public function markAsRead(Request $request)
    {
        $user = Auth::user();
        $messageId = $request->input('message_id');

        $message = Message::findOrFail($messageId);

        // Ensure the message belongs to the logged-in user
        if ($message->receiver_id === $user->id) {
            $message->read_at = now();
            $message->save();
        }

        return response()->json(['message' => 'Message marked as read']);
    }

    public function addContact(Request $request)
    {
        $owner_id = $request->input('owner_id');
        $user_id = $request->input('user_id');

        // Check if the inbox already exists
        $inbox = Inbox::where('owner_id', $owner_id)
            ->where('user_id', $user_id)
            ->first();

        if (!$inbox) {
            // Create a new inbox if it doesn't exist
            $inbox = new Inbox();
            $inbox->owner_id = $owner_id;
            $inbox->user_id = $user_id;
            $inbox->save();
        }

        // You can perform additional actions here, such as retrieving the old inbox

        // Return a response
        return response()->json([
            'message' => 'Inbox stored successfully',
            'inbox' => $inbox
        ]);
    }
}
