<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container my-5">
    <?php if (validation_errors()): ?>
        <div class="alert alert-warning">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo site_url('welcome/update/' . $post->id); ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input name="name" id="name" type="text" class="form-control" value="<?php echo $post->name; ?>">
        </div>

        <div class="text-center mb-4">
            <img id="image" src="<?php echo site_url('upload/post/' . $post->filename); ?>" 
                 alt="Current Image" 
                 class="img-thumbnail rounded" 
                 style="max-width: 300px; height: auto;">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Upload New Image</label>
            <input class="form-control" type="file" name="image" id="file" onchange="thumbnail();">
        </div>

        <div class="text-center">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>
</div>

<script type="text/javascript">
  function thumbnail() {
    var preview = document.querySelector('#image');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }
</script>
