<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Employee Manager | Products</title>
</head>

<body>

    <div class="container mt-5">
        <h3 class="mb-3">Products</h3>
        <a href="<?= base_url('products/create') ?>">
            <button class="btn btn-sm btn-info text-light fw-bold mb-2">
                Add Products
            </button>
        </a>


        <?php if (session()->has('msg') !== null) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('msg') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">BRAND NAME</th>
                    <th scope="col">CATEGORY NAME</th>
                    <th scope="col">MODEL NO</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">ACTION</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($Products as $key => $Product) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $Product['p_name'] ?></td>
                        <td><?= $Product['b_name'] ?></td>
                        <td><?= $Product['c_name'] ?></td>
                        <td><?= $Product['m_no'] ?></td>
                        <td><?= $Product['quantity'] ?></td>
                        <td><?= $Product['price'] ?></td>


                        <td>
                            <a href="<?= base_url('products/' . $Product['id'] . '/edit') ?>">
                                <button class="btn btn-sm btn-warning text-light fw-bold mb-2">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </a>
                            <a href="<?= base_url('products/' . $Product['id'] . '/delete') ?>">
                                <button class="btn btn-sm btn-danger text-light fw-bold mb-2">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </a>
                        </td>


                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>


    <?= $this->endSection(); ?>