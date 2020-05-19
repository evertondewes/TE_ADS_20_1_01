<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = \request()->get('userId');

        $user = \App\User::find($userId);

        $phones = $user->phones;

        return view('phone.index', ['phones' => $phones, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = \request()->get('userId');

        return view('phone.create', ['userId' => $userId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phoneNovo = new \App\Phone($request->all());

        $phoneNovo->save();

        \Session::flash('flash_message', [
            'message'=>'Telefone cadastrado com sucesso!',
            'class'=>'alert-success'
        ]);

        return view('phone.create', ['userId' => $phoneNovo->user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $Phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $Phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $Phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        if($phone->user_id == \Auth::user()->id) {
            return view('phone.edit', ['phone'=> $phone]);
        } else {
            throw new \Exception('Usuário não tem permissões para editar esse telefone!' . $phone->user_id .' - ' . \Auth::user()->id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $Phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        if($phone->user_id == \Auth::user()->id) {
            $phone->update($request->all());
        } else {
            throw new \Exception('Usuário não tem permissões para atualizar esse número!');
        }

        \Session::flash('flash_message', [
            'message'=>'Telefone alterado com sucesso!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('phone.index', ['userId' => $phone->user_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $Phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        if($phone->user_id == \Auth::user()->id) {
            $phone->delete();
        } else {
            throw new \Exception('Usuário não tem permissões para apagar esse telefone!' . $phone->user_id .' - ' . \Auth::user()->id);
        }

        \Session::flash('flash_message', [
            'message'=>'Número de telefone apagado!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('phone.index', ['userId' => $phone->user_id]);
    }
}