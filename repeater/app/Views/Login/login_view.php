<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Logowanie<?= $this->endsection() ?>

<?= $this->section('content') ?>

<h1>Logowanie</h1>

<?= form_open("/login/entering") ?>

        <div>
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="<?= old("email") ?>">
        </div>

        <div>
        <label for="password">Password</label>
        <input type="password" name="password">
        </div>

        <button>Log in</button>

    </form>
    <a href=" <?= site_url('/home/index')  ?>"><button>Wyjście</button></a>

<?= $this->endsection() ?>
