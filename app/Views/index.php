<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Employee Manager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('') ?>">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('skills') ?>">Skills</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h3 class="mb-3">Users</h3>
    <a href="<?= base_url('users/create') ?>">
        <button class="btn btn-sm btn-danger text-light fw-bold mb-2">
            Create
        </button>
    </a>
    <?php if (session()->has('msg')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('msg') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Salery</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($users); $i++) : ?>
                <tr>
                    <th scope="row"><?= $i + 1 ?></th>
                    <td><?= $users[$i]['f_name'] ?></td>
                    <td><?= $users[$i]['l_name'] ?></td>
                    <td><?= $users[$i]['email'] ?></td>
                    <td><?= $users[$i]['salery'] ?></td>
                    <td>
                        <a href="<?= base_url('users/' . $users[$i]['id'] . '/edit') ?>">
                            <button class="btn btn-sm btn-warning text-light fw-bold mb-2">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </a>
                        <a href="<?= base_url('users/' . $users[$i]['id'] . '/delete') ?>">
                            <button class="btn btn-sm btn-danger text-light fw-bold mb-2">
                                <i class="bi bi-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<?= $this->endSection(); ?>