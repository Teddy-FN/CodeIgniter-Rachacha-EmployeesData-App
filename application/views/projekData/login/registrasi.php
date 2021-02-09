<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?php echo base_url('web/registrasi') ?>">
                            <div class="form-group">
                                <!-- Set_value() Berfungsi jika ada form yang belum terisi atau salah maka isi form yang sudah diisi tidak hilang -->
                                <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name" value="<?= set_value('name'); ?>">
                                <!-- Pemberitahuan kalau terjadi eror -->
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <!-- Dibagian Password Tidak usah di tambahi value -->
                                    <input type="text" class="form-control form-control-user" id="place_birth" placeholder="Place Birth" name="place_birth">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control form-control-user" id="date" name="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="adress" placeholder="Address" name="adress" value="<?= set_value('adress'); ?>">
                                <?= form_error('adress', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="city" placeholder="City" name="city" value="<?= set_value('city'); ?>">
                                <?= form_error('city', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <!-- Dibagian Password Tidak usah di tambahi value -->
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                                </div>
                            </div>
                            <button href="login.html" class="btn btn-primary btn-user btn-block" type="submit">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('web/page') ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>