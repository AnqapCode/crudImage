<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container my-4">

  <!-- Tampilkan error jika ada -->
  <?php if (validation_errors() || $this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
      <?php echo validation_errors(); ?>
<?php echo $this->session->flashdata('error'); ?>
    </div>
  <?php endif; ?>

  <div class="card shadow-sm">
    <div class="card-header bg-teal text-white" style="background-color: #00897b;">
      <h5 class="mb-0">Upload Gambar</h5>
    </div>
    <div class="card-body">
      <form action="<?php echo site_url('welcome/create'); ?>" method="post" enctype="multipart/form-data">

        <!-- Nama -->
        <div class="mb-3">
          <label for="name" class="form-label">Nama Gambar</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama gambar">
        </div>

        <!-- File Upload -->
        <div class="mb-3">
          <label for="image1" class="form-label">Pilih Gambar</label>
          <input class="form-control" type="file" name="image1" id="image1" accept=".jpg,.png,.jpeg" onchange="previewImage(event)">
        </div>

        <!-- Preview + Hapus -->
        <div class="mb-3 text-center">
          <div id="preview-container" class="position-relative d-inline-block d-none" style="max-width: 300px;">
            <img id="preview" src="#" alt="Preview Gambar" class="img-thumbnail w-100 preview-img" />
            <div class="overlay-delete d-flex justify-content-center align-items-center">
              <button type="button" class="btn btn-danger btn-sm rounded-circle" onclick="clearPreview()" title="Hapus Gambar">
                <i class="bi bi-trash3-fill"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Tombol Submit -->
        <div class="text-end">
          <button type="submit" class="btn btn-success">
            <i class="bi bi-upload"></i> Upload
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- CSS Hover Style -->
<style>
  .preview-img {
    transition: 0.4s ease;
  }

  #preview-container:hover .preview-img {
    filter: blur(3px);
    transform: scale(1.02);
  }

  .overlay-delete {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.4);
    transition: 0.4s;
  }

  #preview-container:hover .overlay-delete {
    opacity: 1;
  }
</style>

<!-- JS Preview dan Hapus -->
<script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const container = document.getElementById('preview-container');

    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        container.classList.remove('d-none');
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  function clearPreview() {
    document.getElementById('preview').src = '#';
    document.getElementById('preview-container').classList.add('d-none');
    document.getElementById('image1').value = '';
  }
</script>
