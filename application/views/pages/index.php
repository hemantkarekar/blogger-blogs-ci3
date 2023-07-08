<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("components/_common_head"); ?>
</head>

<body>
    <?php $this->load->view("components/_common_nav"); ?>
    <main class="py-5">
        <div class="container">
            <h2>Welcome, <?= $user['full_name'] ?></h2>
        </div>
    </main>
    <?php $this->load->view("components/_common_js") ?>
</body>

</html>