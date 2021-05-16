<?= $this->extend("layouts/main") ?>

<?= $this->section("title") ?>Nowa kart<?= $this->endsection() ?>

<script>const url2 = "<?= site_url('/cards/create') ?>";</script>

<?= $this->section("content") ?>

    <h1>Dodaj kartę lub nie ....</h1>


    <p>aktualnie posiadane karty: <?= $recent ?>szt.
        <?php if($before): ?>
            , dodano: <?= $recent-$before ?>
        <?php endif; ?>
    </p>

<!--  Here is my component !!! -->
<div id="app" >
    
</div>



<a href="<?= site_url('/lesson/getInsideLesson/').$lesson_id ?>">Anuluj</a>

<?= $this->endsection() ?>


<!-- New section for import component -->
<?= $this->section('Vue') ?>
    <script type="module">
        import app from "/js/cards/singleInput.js"

        const {createApp} = Vue;
        createApp(app).mount('#app')
    </script>
<?= $this->endsection() ?>
