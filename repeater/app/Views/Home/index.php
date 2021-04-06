<?= $this->extend("layouts/login") ?>

<?= $this->section("title") ?>Logowanie<?= $this->endsection() ?>

<?= $this->section("content") ?>


<h1>Witaj w programie REPEATER</h1>

<a href=" <?= site_url('/signup') ?>">Nie mam jeszcze konta</a>


<?= $this->endsection() ?>
