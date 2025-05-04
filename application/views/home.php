<?php
    echo $this->session->flashdata('error');
?>

<div class="row">
    <?php foreach ($home_post as $data): ?>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="position-relative gallery-item">
                <img src="<?php echo site_url('upload/post/' . $data['filename']) ?>" alt="Image" class="img-fluid rounded shadow">

                <!-- Overlay text saat hover -->
                <div class="overlay d-flex justify-content-center align-items-center">
                    <div class="text-white text-center fw-semibold">
                        <?php echo $data['name']; ?>
                        <br>
                        <a href="<?php echo site_url('welcome/index/' . $data['id']) ?>" class="btn btn-sm btn-light mt-2">
                            <i class="bi bi-eye"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Tambahkan di bawah atau dalam view layout -->
<style>
    .gallery-item {
        overflow: hidden;
        cursor: pointer;
    }

    .gallery-item img {
        transition: 0.4s ease-in-out;
        width: 100%;
        height: auto;
        display: block;
    }

    .gallery-item .overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: 0.4s;
    }

    .gallery-item:hover img {
        filter: blur(3px);
        transform: scale(1.05);
    }

    .gallery-item:hover .overlay {
        opacity: 1;
    }
</style>

<!-- Tambahkan Bootstrap Icons (opsional untuk icon mata) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
