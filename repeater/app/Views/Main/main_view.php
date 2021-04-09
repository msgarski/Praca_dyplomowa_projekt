<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Ekran główny<?= $this->endsection() ?>

<?= $this->section('content') ?>

<h1>Ekran główny</h1>



<a href=" <?= site_url('/login/exiting')  ?>">Wyloguj</a>

<a href=" <?= site_url('/course/newCourse')  ?>">Dodaj kurs</a>

<a href=" <?= site_url('/login/exiting')  ?>">Dodaj karty</a>

<div>
    <label for="tryouts">Oczekujące testy:</label>
</div>

<div>
    <label for="repetitions">Powtórki na dziś:</label>
</div>

<p>Twoje kursy:</p>






<?= $this->endsection() ?>