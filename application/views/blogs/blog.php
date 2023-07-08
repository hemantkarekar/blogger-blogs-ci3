<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("components/_common_head"); ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <?php 
    $this->load->view("components/_common_nav"); 
    $name = $this->db->query("SELECT `full_name` FROM `users` INNER JOIN `blog_post` ON `users`.`id` = '" . $blog->created_by. "'")->result()[0]->full_name;
    ?>
    <main id="blogs" class="py-5">
        <div class="container">
            <div class="mb-3">
                <h1><?= $blog->title ?></h1>
            </div>
            <div class="row gap-4">
                <div class="col-auto">
                <?= $blog->created_at ?>
                </div>
                <div class="col-auto">
                <?= $name ?>
                </div>
            </div>
            <div class="">
                <?= $blog->body?>
            </div>
        </div>
    </main>
    <?php $this->load->view("components/_common_js") ?>
</body>
</html>