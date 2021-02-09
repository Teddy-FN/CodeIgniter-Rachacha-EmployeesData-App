<header>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="#"><i class="fab fa-facebook-square"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul>
    <div class="container">
        <h1 class="display-4">Fluid jumbotron</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        <div class="p-5">
            <!-- Untuk Action kita arahakan ke dalam controller web/page -->
            <form class="user" action="<?= base_url('web/page') ?>" method="post">
                <!-- Hasil Pemberitahuan tadi dari controller di load disini -->
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                    <!-- Set_value berfungsi untuk jika user menginputkan email/dsb salah maka inputan tadi ttp masih termpangpang karena secara default jika user salah memasukan inputan maka yang diinputkan tadi hilang -->

                    <!-- set error sama seperti di registrasi di bagian email dan password -->
                    <?= form_error('email', '<small class="text-danger pl-3">', ' </small> ') ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('web/registrasi') ?>">Create an Account!</a>
                    </div>
                    <hr>
                    <button type="submit" href="index.html" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>