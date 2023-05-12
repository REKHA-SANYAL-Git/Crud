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

    <title>Employee Manager | Skills</title>
</head>

<body>

    <div class="container mt-5">
        <h3 class="mb-3">Skills</h3>
        <a href="<?= base_url('skills/create') ?>">
            <button class="btn btn-sm btn-info text-light fw-bold mb-2">
                Add Skill
            </button>
        </a>
    </div>

    <?= $this->endSection(); ?>