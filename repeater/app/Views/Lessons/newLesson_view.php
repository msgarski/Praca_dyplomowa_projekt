<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dodawanie lekcji<?= $this->endsection() ?>

<?= $this->section('content') ?>

<h1>Dodaj lekcję</h1>



<a href=" <?= site_url('/login/exiting')  ?>">Wyloguj</a>

<?php form_open('/lesson/create') ?>

<div>
    <label for="courseName">nazwa kursu: </label>
    <input type="text" name="courseName" id="courseName" >
</div>

<div>
    <label for="lessonName">nazwa lekcji: </label>
    <input type="text" name="lessonName" id="lessonName" >
</div>

    <div>   
        <label for="description">Opis</label>
        <textarea rows="5" cols="50" id="description" name="description" placeholder="Tematyka lekcji..."></textarea>
    </div>

<button>Zatwierdź</button>

</form>

<a href="">Anuluj</a>

<?= $this->endsection() ?>