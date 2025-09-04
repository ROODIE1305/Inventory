<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class Dashboard extends Controller
{
    public function index()
    {
        $db = Database::connect();

        $data['total_orders'] = $db->query("SELECT COUNT(*) AS total FROM orders")->getRow()->total;
        $data['pending_orders'] = $db->query("SELECT COUNT(*) AS total FROM shipments WHERE status='Pending'")->getRow()->total;
        $data['in_transit_orders'] = $db->query("SELECT COUNT(*) AS total FROM shipments WHERE status='In Transit'")->getRow()->total;
        $data['delivered_orders'] = $db->query("SELECT COUNT(*) AS total FROM shipments WHERE status='Delivered'")->getRow()->total;

        return view('dashboard', $data);
    }
}
?>