<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory Management Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-2 bg-dark text-white vh-100">
      <h4 class="p-3">Menu</h4>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="<?= base_url('dashboard') ?>"class="nav-link text-white">Dashboard</a></li>
        <li class="nav-item"><a href="<?= base_url('products') ?>" class="nav-link text-white">Products</a></li>
        <li class="nav-item"><a href="<?= base_url('dashboard') ?>" class="nav-link text-white">Customers</a></li>
        <li class="nav-item"><a href="<?= base_url('dashboard') ?>" class="nav-link text-white">Orders</a></li>
        <li class="nav-item"><a href="<?= base_url('dashboard') ?>" class="nav-link text-white">Shipments</a></li>
        <li class="nav-item"><a href="/about" class="nav-link text-white">About</a></li>
      </ul>
    </div>

    <!-- Main Dashboard -->
    <div class="col-md-10 p-5">
      <h2>Dashboard</h2>
      <div class="row">
        <div class="col-md-3">
          <div class="card text-bg-primary mb-3">
            <div class="card-body">
              <h5 class="card-title">Total Orders</h5>
              <p class="card-text fs-4"><?= $total_orders ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-bg-warning mb-3">
            <div class="card-body">
              <h5 class="card-title">Pending</h5>
              <p class="card-text fs-4"><?= $pending_orders ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-bg-info mb-3">
            <div class="card-body">
              <h5 class="card-title">In Transit</h5>
              <p class="card-text fs-4"><?= $in_transit_orders ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-bg-success mb-3">
            <div class="card-body">
              <h5 class="card-title">Delivered</h5>
              <p class="card-text fs-4"><?= $delivered_orders ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>

</body>
</html>
