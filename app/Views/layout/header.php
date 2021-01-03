<?php
$session = session();
?>
<div id="header" class="row" >
    <nav class="col navbar navbar-expand">
        <a href="<?php echo base_url('/')?>"> <i class="fas fa-medkit h2 ml-2 text-green p-0"></i></a>
        <div class="col collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" style="margin:0 30px 0 auto;">
            <?php if ($session->get('user_name') != NULL): ?>
                    <a class='btn btn-info ml-2' href='<?php echo base_url('/pages/caridokter')?>'>Cari Dokter</a>
                    <a class="btn btn-outline-light ml-2" href='<?php echo base_url("/pages/dashboard/{$session->get('user_id')}")?>'>Dashboard</a>
                    <a class="btn btn-outline-light ml-2" href='<?php echo base_url('/login/logout')?>'>Logout</a>
            <?php else : ?>
                <a class='btn btn-info ml-2' href='<?php echo base_url('/pages/caridokter')?>'>Cari Dokter</a>
                <a class='btn btn-outline-light ml-2 ' href='<?= base_url('login')?>' >Login</a>
                <a class='btn btn-outline-light ml-2' href='<?php echo base_url('/register')?>'>Register</a>
            <?php endif ?>
            </div>
        </div>
    </nav>
</div>

<style>
    #header{
        background: linear-gradient(90deg, rgba(4,123,221,0.5) 0%, rgba(24,186,0,0.5) 50%, rgba(69,219,252,0.5) 100%);
    }
    #header nav span.user{
        color:white;
    }
    .dropdown-menu li a.text{
        color:black;
    }
    #header nav a i{
        font-weight:bolder;
        color:white;
    }
    @media only screen and (max-width: 600px) {
        #header nav a.btn{
         font-size:2.5vw;
        }
    }
</style>



