<?= $this->extend('layouts/login') ?>

<?= $this->section('title') ?>Rejestracja<?= $this->endsection() ?>

<?= $this->section('content') ?>

<h1>Rejestracja</h1>


<!-- signup form: -->

<form action="app/controllers/signup/create" method="POST">

<button>Stwórz konto</button>
</form>

<?= $this->endsection() ?>