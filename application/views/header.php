<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Material Icons if still used -->
    <link href="<?php echo site_url('asset/font/material-icon/material-icons.css'); ?>" rel="stylesheet">
</head>
<body>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Navbar Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-teal" style="background-color: #00897b;">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url(); ?>">CRUD Image</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Welcome/create'); ?>">Upload Image</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Container for page content -->
<main class="container mt-4">
