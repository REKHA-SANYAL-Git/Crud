<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="mb-3">BRAND</h3>
    <a href="<?= base_url('brand/create') ?>">
        <button class="btn btn-sm btn-danger text-light fw-bold mb-2">
            Add Brand
        </button>
    </a>


    <form action="<?php echo base_url('brand/search'); ?>" method="GET">
        <input type="text" name="q" value="<?= isset($q) ? ($q) : ('') ?>" placeholder="SEARCH">
        <button type="submit" class="btn btn-success">SEARCH</button>
    </form>
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
                <th scope="col">BRAND NAME</th>
                <th scope="col">ACTION</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($brands as $key => $brand) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $brand['b_name'] ?></td>


                    <td>
                        <a href="<?= base_url('brand/' . $brand['id'] . '/edit') ?>">
                            <button class="btn btn-sm btn-warning text-light fw-bold mb-2">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </a>
                        <a href="<?= base_url('brand/' . $brand['id'] . '/delete') ?>">
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