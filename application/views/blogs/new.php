<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("components/_common_head"); ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <?php $this->load->view("components/_common_nav"); ?>
    <main>
        <div class="container">
            <h1>New Blog</h1>
            <form method="post" action="<?= base_url("blogs/api_add_new") ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="blogTitle" class="form-label">Blog Title:</label>
                    <input type="text" name="title" id="blogTitle" placeholder="Blog Title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="blogSlug" class="form-label">Custom URL for the Blog:</label>
                    <input type="text" name="slug" id="blogSlug" placeholder="Blog URL" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleImage" class="form-label">Thumbnail Image for the Blog (only, .jpg, .png):</label>
                    <input type="file" name="thumb_image" class="form-control" accept=".png,.jpg,.jpeg">
                </div>
                <div class="mb-3">
                    <label for="exampleInputDesc" class="form-label">Blog Description:</label>
                    <textarea class="form-control" name="description" maxlength="200" placeholder="Write Blog Description in maximum 200 characters."></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputBlog" class="form-label">Start Writing Your Blog...</label>
                    <textarea id="summernote" rows="30" name="body"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Save Blog" class="btn btn-primary">
                    <input type="reset" value="Clear Content" class="btn btn-outline-secondary">
                </div>
            </form>
        </div>
    </main>
    <?php $this->load->view("components/_common_js") ?>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
        $(document).ready(function() {
            $('#blogTitle').change(function() {
                // $("#blogSlug").val();
                var slug = $(this).val().toLowerCase().replaceAll(" ", "-").replaceAll("'", "");

                $('#blogSlug').val(slug);
                // console.log($(this).val());
            })
        })
    </script>
</body>

</html>