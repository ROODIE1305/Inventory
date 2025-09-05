<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Products extends Controller
{
    public function index()
    {
        $db = Database::connect();
        $data['products'] = $db->table('products')->get()->getResult();
        return view('products/index', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $db = Database::connect();

        // file upload
        $img = $this->request->getFile('img');
        $fileName = null;
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $fileName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/', $fileName);
        }

        $db->table('products')->insert([
            'img'         => $fileName,
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'quantity'    => $this->request->getPost('quantity'),
            'price'       => $this->request->getPost('price'),
        ]);

        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $db = Database::connect();
        $data['product'] = $db->table('products')->where('id', $id)->get()->getRow();
        return view('products/edit', $data);
    }

    public function update($id)
{
    $db = Database::connect();

    // Get old product
    $product = $db->table('products')->where('id', $id)->get()->getRow();

    $updateData = [
        'name'        => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'quantity'    => $this->request->getPost('quantity'),
        'price'       => $this->request->getPost('price'),
    ];

    // new image upload
    $img = $this->request->getFile('img');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $fileName = $img->getRandomName();
        $img->move(FCPATH . 'uploads/', $fileName);
        $updateData['img'] = $fileName;
    } else {
        // if no new image, keep the old one
        $updateData['img'] = $product->img;
    }

    $db->table('products')->where('id', $id)->update($updateData);

    return redirect()->to('/products');
}
}