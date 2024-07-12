<?php

namespace App\Controllers;

use App\Models\Dosen as DosenModel;

class Dosen extends BaseController
{
    protected $dosen;
    protected $rules;

    public function __construct()
    {
        $this->dosen = new DosenModel();
        $this->rules = [
            'nama_dosen'   => 'required',
            'email'   => 'required',
            'matakuliah' => 'required',
        ];
    }

    public function list()
    {
        $data = [
            'data'  => $this->dosen->paginate('2', 'dosen'),
            'title' => 'List Dosen',
            'pager' => $this->dosen->pager,
        ];

        return view('dosen/list', $data);
    }

    public function tambah()
    {
        return view('dosen/tambah');
    }

    public function simpan()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->save($data);

        return redirect()->route('Dosen::list')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Dosen',
            'dosen' => $this->dosen->find($id),
        ];

        return view('dosen/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->update($id, $data);

        return redirect()->route('Dosen::list')->with('message', 'Sukses ubah data');
    }

    public function hapus(int $id)
    {
        $this->dosen->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }

    public function hadir(int $id)
        {
            $dosen = $this->dosen->find($id);
            $nama_dosen = $dosen['nama_dosen'];
            $matkul = $dosen['matakuliah'];
    
            $token = "7186770641:AAHqAIk5RtgLqUAxGx--KrK0AzeNIJsIM7Y"; // token bot
     
            $datas = [
            'text' =>"Assalamualaikum wr wb\nPemberitahuan untuk hari ini dosen $nama_dosen dengan matakuliah $matkul  masuk seperti biasanya\n Terimakasih ",
            'chat_id' => '-4213297953'  //contoh bot, group id -442697126
            ];
           
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas) );
    
            return redirect()->back()->with('message', 'Notifikasi terkirim');
        }
    
        public function tidak_hadir(int $id)
        {
            $dosen = $this->dosen->find($id);
            $nama_dosen = $dosen['nama_dosen'];
            $matkul = $dosen['matakuliah'];
    
            $token = "7186770641:AAHqAIk5RtgLqUAxGx--KrK0AzeNIJsIM7Y"; // token bot
     
            $datas = [
            'text' =>"Assalamualaikum wr wb\nPemberitahuan dosen $nama_dosen dengan matakuliah $matkul tidak bisa mengisi perkuliahan dikarnakan beliau ada keperluan\n Terimakasih ",
            'chat_id' => '-4213297953'  //contoh bot, group id -442697126
            ];
           
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($datas) );
    
            return redirect()->back()->with('message', 'Notifikasi terkirim');
        }
}