<?php

namespace App\Http\Controllers;

use App\Dialog;
use App\Message;
use App\Notifications\InvoicePaid;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MessageController extends Controller
{
    # здесь получаем диалоги с пользователями
    public function index()
    {
        $message1 = Auth::user()->sentDialog;
        $message2 = Auth::user()->receivedDialog;
        $message3 = collect([$message1,$message2])->collapse();
        $messages = $message3->sortBy('created_at')->sortDesc();

        return view('message.index', compact('messages'));
    }

    # Здесь создаем сообщение
    public function store(Request $request, $id)
    {
        if ( empty(Auth::user()->sentDialog
            ->where('sender_id', Auth::user()->id)
            ->where( 'sent_to_id', $id)
            ->first()) and empty(
            Auth::user()->receivedDialog
                ->where('sender_id', $id)
                ->where( 'sent_to_id', Auth::user()->id)
                ->first()
            ))
        {
         $dialog = Auth::user()->sentDialog()->create([
            'sender_id' => Auth::user()->id,
            'sent_to_id' => $id,
        ]);
        }elseif(empty(Dialog::where('sent_to_id', $id)->where('sender_id',  Auth::user()->id)->get()->first()) ){

            $dialog = Dialog::where('sender_id',  $id)->where('sent_to_id', Auth::user()->id)->get()->first();
        }else{
            $dialog = Auth::user()->sentDialog()->where('sender_id', Auth::user()->id)
                ->where('sent_to_id', $id)->get()->first();
        }
       $message =  Auth::user()->sent()->create([
            'body'       => $request->body,
            'sent_to_id' => $id,
            'dialog' => $dialog->id
        ]);
        $message->uploadImage($request->file('image'), 'dialogs');

        return redirect()->back();
    }

    # Диалог с пользователем
    public function show($id)
    {
        $messages = Message::where('dialog', $id)->get()->reverse();

        return view('message.dialog', compact('messages'));
    }


    # Отправить сообщение в телеграм
    public function sendTelegram(Request $request)
    {
        dd($request->all());
        $this->validate($request,[
            'name' => 'max:300|alpha_dash',
            'message' => 'max:600|alpha_dash'
        ]);
        $message = 'Тема = ' .  $request->name . "\n" . 'Сообщение = ' . $request->message . "\n" . date('d-M-Y');
        $user = new User();
        $user->notify(new InvoicePaid($message));
        return redirect()->back();
    }


}
