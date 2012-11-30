<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <title><?php echo $title; ?> - Pemira Himakom 2012</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.responsive.min.css" media="all">
    <link rel="stylesheet" href="css/style.css" media="all">
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>
<body>
    <?php echo $this->load->view('header'); ?>
    
    <div class="container">
        <?php echo $content; ?> 
    </div>

    <?php echo $this->load->view('footer'); ?>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>