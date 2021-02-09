<style>
    .card-img {
        height: 150px;
        width: 150px;
        border-radius: 75px;
    }
</style>

<div class="content-warpper">
    <h1 class=" h3 ml-4 text-gray-800"><?= $title; ?></h1>

    <div class="card m-2">
        <img src="https://images.unsplash.com/photo-1543928069-4ce45659e968?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" class="card-img-top" alt="image" style="height: 250px;">
        <div class="carousel-caption" style="margin-top: 200px;">
            <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="card-img" alt="<?= $user['name']; ?>">
        </div>
    </div>
    <!-- Untuk bagian Upload -->
    <!-- Mengarah ke bagian controller dan method -->
    <div class="container">
        <?= form_open_multipart('user/edit'); ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email : </label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="name">Full Name : </label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                <!-- Form Error -->
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert" style="margin-top: 5px; margin-bottom: -20px;">
                        <button type="button" class="close" data-dismiss="alert" arial-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= form_error('name', '<small class="text-danger pl-3">', ' </small> ') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">City : </label>
                <input type="text" class="form-control" id="city" name="city" value="<?= $user['city']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="date">Date Birth : </label>
                <input type="date" class="form-control" id="date">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone">Phone : </label>
                <input type="text" class="form-control" id="phone" name="phone" value="">
            </div>
            <div class="form-group col-md-6">
                <label for="region">Region : </label>
                <input type="text" class="form-control" id="region" value="<?= $user['city']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="adress">Addres : </label>
            <input type="text" class="form-control" id="adress" placeholder="Adress" name="adress" value="<?= $user['adress']; ?>">
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-4">
                <label for="instagram">Instagram : </label>
                <input type="text" class="form-control" id="instagram" placeholder="Instagram">
            </div>
            <div class="col-md-4 mb-4">
                <label for="facebook">Facebook : </label>
                <input type="text" class="form-control" id="facebook" placeholder="Facebook">
            </div>
            <div class="col-md-4 mb-4">
                <label for="twitter">Twitter : </label>
                <input type="text" class="form-control" id="twitter" placeholder="Twitter">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                Picture :
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
        </form>
    </div>