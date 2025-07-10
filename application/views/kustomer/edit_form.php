<main>
    <div class="container-fluid px-4">
        <!-- Judul Halaman -->
        <h1 class="mt-4">Edit Kustomer</h1>

        <!-- Breadcrumb Navigasi -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('kustomer') ?>">Kustomer</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Formulir Edit Data Kustomer
            </div>
            <div class="card-body">
                <!-- Arahkan form ke controller kustomer/edit -->
                <form action="<?php echo site_url('kustomer/edit') ?>" method="post">

                    <!-- Input tersembunyi untuk ID Kustomer -->
                    <input type="hidden" name="id" value="<?php echo $kustomer->id; ?>" />

                    <!-- NIK -->
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK <code>*</code></label>
                        <input class="form-control" id="nik" type="text" name="nik" placeholder="Masukkan NIK Kustomer" required value="<?php echo $kustomer->nik; ?>" />
                    </div>

                    <!-- Nama Kustomer -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kustomer <code>*</code></label>
                        <input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" id="name" type="text" name="name" placeholder="Masukkan Nama Lengkap" required value="<?php echo $kustomer->name; ?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('name') ?>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <code>*</code></label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap" required rows="3"><?php echo $kustomer->alamat; ?></textarea>
                    </div>

                    <!-- Telepon -->
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telepon <code>*</code></label>
                        <input class="form-control" id="telp" type="text" name="telp" placeholder="Masukkan Nomor Telepon" required value="<?php echo $kustomer->telp; ?>" />
                    </div>
                    
                    <!-- Tombol Simpan Perubahan -->
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save me-1"></i> Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</main>
