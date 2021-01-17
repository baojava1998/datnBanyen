<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use DB;

class ChatController extends HomeController
{
    public function index()
    {
        // $users = User::all();
        // $user = User::where('id', '!=',Auth::id())->get();
        // $user = Message::find(Auth::id());
        // count how many message are unread from the selected user
        $user = DB::select("select users.id, users.name, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.name, users.email");
        // $user = Message::where([
        //     ['to', '=', Auth::id()],
        //     ['is_read', '=', 0],
        // ])->groupBy('to')->get();
        // echo $user;
        return view('home',compact('user'));
    }
    public function getMess($ourid){
        $user = Auth::id();
        Message::where(['from' => $ourid, 'to' => $user])->update(['is_read' => 1]);
        $mess = Message::where([
            ['from', '=', $user],
            ['to', '=', $ourid],
        ])->oRwhere([
            ['from', '=', $ourid],
            ['to', '=', $user],
        ])->orderBy('created_at','ASC')->get();
        return view ('messages.messages',compact('mess'));
    }
    public function sendMess(Request $request){
        $from = Auth::id();
        $to = $request->our_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['from' => $from, 'to' => $to];
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
