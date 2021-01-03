<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">


    <div class="text-center mt-5 mb-5">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-2 text-center color">Create Account</h4>
            <!--<a href="#" class="btn btn-primary m-2"><i class="fab fa-facebook"></i> Login-->
            <!--    with-->
            <!--    Facebook</a>-->
            <!--<a href="#" class="btn btn-danger m-2"><i class="fab fa-google"></i> Login with-->
            <!--    Google</a>-->
            <!--</p>-->
            <!--<p class="divider-text">-->
            <!--    <span class="color">OR</span>-->
            <!--</p>-->
            <?php if (isset($validation)) : ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form class="mt-5" action="<?php echo base_url('/register/save')?>" method="post">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="Fullname" id="InputForName"
                        value="<?= set_value('name') ?>">
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input type="email" name="email" placeholder="Email" class="form-control" id="InputForEmail"
                        value="<?= set_value('email') ?>">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input type="password" name="password" placeholder="Password" class="form-control"
                        id="InputForPassword">
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input type="password" name="confpassword" placeholder="Confirm Password" class="form-control"
                        id="InputForConfPassword">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block mt-3" value="Register" onclick="store()"> Create
                        Account </button>
                </div>
                <p class="text-center color mt-3">Have an account? <a href="<?php echo base_url('/login')?>">Log In</a> </p>
            </form>
        </article>
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
