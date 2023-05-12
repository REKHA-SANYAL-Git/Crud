<?= $this->extend('layouts/assemble') ?>
<?= $this->section('title') ?>Employees<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h3 class="mb-3">Users</h3>
    <a href="<?= base_url('users/create') ?>">
        <button class="btn btn-sm btn-danger text-light fw-bold mb-2">
            Create
        </button>
    </a>
    <form method="GET" class="d-flex" action="<?php echo base_url('users/search'); ?>">
        <input type="text" name="q" class="form-control" value="<?= isset($q) ? ($q) : ('') ?>" placeholder="Search by user Firstname/Lastname/Email/Salery">
        <button type="submit" class="btn btn-success text-light fw-bold">Search</button>
    </form>
    <!-- <div class="row">
        <div class="col-6">
            <?php // convert into --> <?= base_url('users/search'); 
            ?>
            <form method="GET" class="row" action="<?php // base_url('users/search'); 
                                                    ?>">
                <div class="col-3">
                    <select name="col" class="form-control">
                        <option value="">-- Select --</option>
                        <option value="f_name" <?php // isset($col) && $col === 'f_name' ? 'selected' : '' 
                                                ?>>Firstname</option>
                        <option value="l_name" <?php // isset($col) && $col === 'l_name' ? 'selected' : '' 
                                                ?>>Lastname</option>
                        <option value="email" <?php // isset($col) && $col === 'email' ? 'selected' : '' 
                                                ?>>Email</option>
                        <option value="salery" <?php // isset($col) && $col === 'salery' ? 'selected' : '' 
                                                ?>>Salery</option>
                    </select>
                </div>
                <div class="col-7">
                    <input type="text" name="q" value="<?php // isset($q) ? ($q) : ('') 
                                                        ?>" class="form-control" placeholder="Search for user">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success text-light fw-bold">Search</button>
                </div>
            </form>
        </div> 
        <div class="col-6"></div>
    </div> -->
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
            <?php if (count($users) === 0) : ?>
                <tr>
                    <th scope="row"># No Data Found</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php else : ?>
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
            <?php endif; ?>
        </tbody>
    </table>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<?= $this->endSection(); ?>