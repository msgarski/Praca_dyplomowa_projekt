<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Widok kursu<?= $this->endsection() ?>

<?= $this->section('content') ?>

<h1>Widok kursu</h1>


<a href=" <?= site_url('/login/exiting')  ?>">Wyloguj</a>

<div>
    
</div>

<div>
    <a href="<?= site_url('/porch/getinto')  ?>">Powrót</a>
</div>



<?= $this->endsection() ?>