<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("components/_common_head"); ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <?php $this->load->view("components/_common_nav"); ?>
    <main id="blogs" class="py-5">
        <div class="container">
            <h1 class="mb-3">All Blogs</h1>
            <div class="row">
                <?php
                foreach ($blogs as $blog) {
                    if ($blog->status == "Published") {
                ?>
                        <div class="col-md-6 col-12">
                            <div class="card d-flex">
                                <div class="card-image">
                                <img src="<?= base_url($blog->thumb_path) ?>" class="w-100" alt="">
                                </div>
                                <div class="card-body">
                                    <h2 class="card-title"><?= $blog->title ?></h2>
                                    <p class="card-text"><?= $blog->description ?></p>
                                    <a href="<?= base_url("blog/" . $blog->slug) ?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <?php $this->load->view("components/_common_js") ?>
</body>

</html>