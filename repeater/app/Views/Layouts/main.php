<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css"> -->
        
        <link rel="stylesheet" href="<?= site_url('/css/style.css') ?>">
        
        <!-- Vue.js 3.0 (development build) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.11/vue.global.js"></script>
        
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        

        <title><?= $this->renderSection("title") ?></title>
    </head>


    <body>
    <!-- <div id="app"></div> -->

            <?php if (session()->has('warning')): ?>
                <div class="warning">
                    <?= session('warning') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('info')): ?>
                <div class="info">
                    <?= session('info') ?>
                </div>
            <?php endif; ?>


            <?= $this->renderSection("content") ?>
            


            <!-- Inserting Vue instance -->
            <?= $this->renderSection("Vue") ?>


        <!-- <script type="module">
            // import app from './app.js'
            // w 'app' jest kotwica do #app , a więc do naszego div-a na górze
            // const {createApp} = Vue;
            // createApp(app).mount('#app');
        </script> -->

    </body>

</html>