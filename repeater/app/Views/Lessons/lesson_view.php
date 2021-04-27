<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Widok lekcji<?= $this->endsection() ?>

<?= $this->section('content') ?>

<h1>Widok lekcji</h1>



<button><a href=" <?= site_url('/login/exiting')  ?>">Wyloguj</a></button>

<button><a href=" <?= site_url('/cards/index/').$lessonInfo->id."/".$amount = 2  ?>">Dodaj wiele kart</a></button>

<button><a href=" <?= site_url('/cards/index/').$lessonInfo->id."/".$amount = 1 ?>">Dodaj karty pojedynczo</a></button>


<div>
    <label for="tryouts">Oczekujące testy:</label>
</div>

<div>
    <label for="repetitions">Powtórki na dziś:</label>
</div>

<p>Twoje karty w tej lekcji:</p>

<div>
    <a href="<?=  site_url('/course/getInsideCourse/').$lessonInfo->course_id ?>">Powrót do kursu</a>
</div>




<div>
    <?php if(session()->has('user_id')): ?>
        <p>Jesteś zalogowany</p>
    <?php else: ?>
        <P>Wylogowano</P>
    <?php endif; ?>

</div>

<?= $this->endsection() ?>