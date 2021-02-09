<style>
    .card-img {
        height: 200px;
        width: 200px;
        margin-right: auto;
        margin-left: auto;
        border-radius: 100px;
        display: block;
    }

    .text-center {
        padding: 20px;
    }

    .card-footer {
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <div class="card bg-dark text-white">
        <img src="https://images.unsplash.com/photo-1522800613660-62a595533961?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" class="card-image" alt="gambar" style="height: 490px; margin-top: -30px">
        <div class="card-img-overlay">
            <h5 class="card-title"><?= $title; ?></h5>
            <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="card-img" alt="...">
        </div>
    </div>
    <div class="card text-center">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <ul>
                <li><a href="<?= $user['instagram']; ?>" target="_blank">
                        <img src="https://clipart.info/images/ccovers/1559063342instagram-Logo-PNG-Transparent-Background.png" alt="" style="height: 80px; width: 80px">
                    </a></li>
                <li><a href="<?= $user['facebook']; ?>" target="_blank">
                        <img src="https://www.pngitem.com/pimgs/m/19-196328_logo-computer-icons-like-button-facebook-instagram-snapchat.png" alt="" style="height: 80px; width: 80px">
                    </a></li>
                <li><a href="<?= $user['twitter']; ?>" target="_blank">
                        <img src="https://i.pinimg.com/originals/04/52/ac/0452ac38302c16481666342d3d532c96.png" alt="" style="height: 80px; width: 80px">
                    </a></li>
            </ul>
        </div>
    </div>
</div>