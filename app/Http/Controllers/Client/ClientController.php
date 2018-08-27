<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::where('active', true)->get();

        return view('Client.index', ['clients' => $clients]);
    }

    public function add()
    {
        return redirect(url('clients/edit/new'));
    }

    public function edit($id, Request $request)
    {

        if (is_numeric($id)) {
            $client = Client::find($id);
            $this->redirectIfNotExist($client, $request);
        } else {
            $client = new Client();
        }

        return view('Client.edit', ['client' => $client]);
    }

    public function update($id, Request $request)
    {
        if (is_numeric($id)) {
            $client = Client::find($id);
            $this->redirectIfNotExist($client, $request);
        } else {
            $client = new Client();
        }

        $name = $request->input('name');
        $password = $request->input('password');

        if ($name && $password) {
            $client->name = $name;
            $client->password = $password;
            if ($client->save()) {
                $request->session()->flash('alert', ['type' => 'success', 'message' => 'Kaydetme işlemi başarıyla gerçekleştirildi.']);
            } else {
                $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Kaydetme işlemi gerçekleştirilirken hata meydana geldi.']);
            }
        } else {
            $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Lütfen gerekli alanları eksiksiz doldurunuz.']);
        }

        return redirect(url('clients'));
    }

    public function delete($id, Request $request)
    {
        $client = Client::find($id);
        $this->redirectIfNotExist($client, $request);
        $client->active = false;
        if ($client->save()) {
            $request->session()->flash('alert', ['type' => 'success', 'message' => 'Silme işlemi başarıyla gerçekleştirildi.']);
        } else {
            $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Silme işlemi gerçekleştirilirken hata meydana geldi.']);
        }

        return redirect(url('clients'));
    }

    public function redirectIfNotExist($obj, Request $request)
    {
        if (!$obj) {
            $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Bu oyuncu sistemde mevcut değil.']);
            return redirect(url('/clients'));
        }
    }

}