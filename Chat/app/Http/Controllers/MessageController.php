<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->paginate(5);

        return view('message.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\MessageRequest $request)
    {
        $mensagemNova = new \App\Message($request->all());

        $mensagemNova->user_id = \Auth::user()->id;

        $mensagemNova->save();

        \Session::flash('flash_message', [
            'message'=>'Mensagem enviada com sucesso!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('message.show', ['message' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        if($message->user_id == \Auth::user()->id) {
            return view('message.edit', ['message'=> $message]);
        } else {
            throw new \Exception('Usuário não tem permissões para editar essa mensagem!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        if($message->user_id == \Auth::user()->id) {
            $message->update($request->all());
        } else {
            throw new \Exception('Usuário não tem permissões para atualizar essa mensagem!');
        }

        \Session::flash('flash_message', [
            'message'=>'Mensagem alterada com sucesso!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('message.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        if($message->user_id == \Auth::user()->id) {
            $message->delete();
        } else {
            throw new \Exception('Usuário não tem permissões para apagar essa mensagem!' . $message->user_id .' - ' . \Auth::user()->id);
        }

        \Session::flash('flash_message', [
            'message'=>'Mensagem apagada!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('message.index');
    }

    public function detalhesExtras(Message $message)
    {
        $usuario = $message->user;

        return view('message.detalhes_extras', ['message' => $message, 'u' => $usuario]);
    }

    public function report() {
        $rows = \DB::table('messages')
            ->join('users', 'users.id', '=', 'messages.user_id')
            ->select('users.id', 'users.name', DB::raw('count(*) as count'))
            ->groupBy('users.id')
            ->paginate(15);

        return view('message.report', ['rows' => $rows]);
    }
}
