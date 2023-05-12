<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?= $this->renderSection('styles') ?>
    <title>Employee Manager | <?= $this->renderSection('title') ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Employee Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('users') ?>">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('skills') ?>">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('list_categories') ?>">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('brand') ?>">Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('products') ?>">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>