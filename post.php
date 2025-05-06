<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-4">
            <h1><?php echo $post->name; ?></h1>
        </div>

        <div class="col-6 text-center mb-3">
            <a href="<?php echo site_url('welcome/delete/' . $post->id); ?>" class="btn btn-danger">Delete</a>
        </div>
        <div class="col-6 text-center mb-3">
            <a href="<?php echo site_url('welcome/update/' . $post->id); ?>" class="btn btn-primary">Update</a>
        </div>

        <div class="col-12 text-center mt-4">
            <img src="<?php echo site_url('upload/post/' . $post->filename); ?>" 
                 alt="Post's Image" 
                 class="img-thumbnail rounded"
                 style="max-width: 100%; height: auto;">
        </div>
    </div>
</div>
