<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="row row-padding justify-content-center mt-5">
        <div class="col-md-4 text-center">
            <form action="<?php echo base_url('/login/auth')?>" method="post" class="form-signin ">
                <h2 class="color">
                    Sign in
                </h2>
                <h1 class="h3 mb-3 font-weight-normal color">Please sign in</h1>

                <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="far fa-envelope"></i> </span>
                    </div>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" placeholder="Email" class="form-control" id="InputForEmail"
                        value="<?= set_value('email') ?>">
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password"
                        id="InputForPassword">
                </div>

                <div class="checkbox m-5 color">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="check()">Sign
                    in</button>
                <p class="m-5 sub-title color">Dont Have an Account ? <a href="<?php echo base_url('/register')?>">Register</a>
                </p>
            </form>
        </div>
    </div>
</div>

<style>

html{
    
    overflow:hidden;
}
a,.color{
    color: white;
}

a:hover{
   color: white;
    font-weight: bold;
}
</style>

<?= $this->endSection(); ?>
