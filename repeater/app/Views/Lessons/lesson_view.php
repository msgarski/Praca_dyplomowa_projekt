<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Widok lekcji<?= $this->endsection() ?>

<?= $this->section('content') ?>

<h1>Widok lekcji</h1>



<a href=" <?= site_url('/login/exiting')  ?>">Wyloguj</a>

<a href=" <?= site_url('/course/newCourse')  ?>">Dodaj wiele kart</a>

<a href=" <?= site_url('/login/exiting')  ?>">Dodaj karty pojedynczo</a>

<div>
    <label for="tryouts">Oczekujące testy:</label>
</div>

<div>
    <label for="repetitions">Powtórki na dziś:</label>
</div>

<p>Twoje karty w tej lekcji:</p>

<?= $this->endsection() ?>