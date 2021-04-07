<?= $this->extend('layouts/login') ?>

<?= $this->section('title') ?>Rejestracja<?= $this->endsection() ?>

<?= $this->section('content') ?>

<h1>Rejestracja</h1>


<!-- signup form: -->

<!-- <form action="app/controllers/signup/create" method="post"> -->

<?= form_open("/signup/create") ?>

<div>
    <label for="name">Imię</label>
    <input type="text" name="name" id="name" value=" <?= old('name') ?>">
</div>

<div>
    <label for="email">Adres e-mail</label>
    <input type="text" name="email" id="email" value=" <?= old('email') ?>">
</div>

<div>
    <label for="password">Hasło</label>
    <input type="password" name="password" id="password">
</div>

<div>
    <label for="password_confirmation">potwierdź hasło</label>
    <input type="password" name="password_confirmation" id="password_confirmation">
</div>

<button>Stwórz konto</button>

</form>

<a href=" <?= site_url("/") ?>"><button>Wyjście</button></a>

<?= $this->endsection() ?>