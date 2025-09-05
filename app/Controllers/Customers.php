<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Customers extends Controller
{
    public function index()
    {
        $db = Database::connect();
        $data['customers'] = $db->table('customers')->get()->getResult();
        return view('customers/index', $data);
    }

    public function create()
    {
        return view('customers/create');
    }

    public function store()
    {
        $db = Database::connect();

        $email = $this->request->getPost('email');

        // Simple email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Invalid email format.');
        }

        $db->table('customers')->insert([
            'name'    => $this->request->getPost('name'),
            'email'   => $email,
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $db = Database::connect();
        $data['customer'] = $db->table('customers')->where('id', $id)->get()->getRow();
        return view('customers/edit', $data);
    }

    public function update($id)
    {
        $db = Database::connect();

        $email = $this->request->getPost('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Invalid email format.');
        }

        $db->table('customers')->where('id', $id)->update([
            'name'    => $this->request->getPost('name'),
            'email'   => $email,
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/customers');
    }

    public function delete($id)
    {
        $db = Database::connect();
        $db->table('customers')->delete(['id' => $id]);
        return redirect()->to('/customers');
    }
}
