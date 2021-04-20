<?= $this->extend("layouts/main") ?>

<?= $this->section("title") ?>Wprowadzanie kart<?= $this->endsection() ?>

<?= $this->section("content") ?>


<h1>Wprowadzanie wielu kart</h1>
<p>Wprowadź listę słów:</p>
<?= form_open("/masscardinput/reachCards") ?>
<div>
    <label for="cardsInput"></label>
    <textarea rows="10" cols="100" name="cardsInput" id="cardsInput">
    Jakiś tekst domyślny...
    </textarea>
</div>

<div>
    <label for="reckon">wykrywaj znaki rozdzielające</label>
    <input type="checkbox" name="reckon" id="reckon" checked>
</div>

<button>Zapisz</button>

</form>






<?= $this->endsection() ?>
