<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<body>

<!-- Navigation -->
<?php include 'includes/navbar.php'; ?>


<!-- Page Content -->
<div class="container">

<div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">

    <!-- <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1> -->

    <!-- First Blog Post -->
    
    <?php 
        // Get content from db
        if(isset($_GET['category'])){
          $the_category_id = $_GET['category'];
        }

      $query = "SELECT * FROM posts WHERE post_category_id = {$the_category_id}";
      $send_query = mysqli_query($connection, $query);

      $count = mysqli_num_rows($send_query);

      if($count === 0 ){
        echo "<h1>NO RECORDS</h1>";
      }else {
    
        while($row = mysqli_fetch_assoc($send_query)){
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date= $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];                    
          
          ?>
        <h2>
          <a href="#"><?php echo $post_title; ?></a>
        </h2>
        <p class="lead">
          by <a href="index.php"><?php echo $post_author; ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
        <hr>
        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
        <hr>
        <p> <?php echo $post_content; ?></p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        
        <hr>
        <?php 
        }
      }
        ?>
    

    <!-- Second Blog Post -->
    <!-- <h2>
        <a href="#">Blog Post Title</a>
    </h2>
    <p class="lead">
        by <a href="index.php">Start Bootstrap</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
    <hr>
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

    <!-- <hr> -->

    <!-- Third Blog Post -->
    <!-- <h2>
        <a href="#">Blog Post Title</a>
    </h2>
    <p class="lead">
        by <a href="index.php">Start Bootstrap</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
    <hr>
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr> -->

    <!-- Pager -->
    <!-- <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul> -->

</div>

<!-- Blog Sidebar Widgets Column -->
<?php include 'includes/sidebar.php' ?>

</div>
<!-- /.row -->

<!-- <hr> -->

<!-- Footer -->
<?php include 'includes/footer.php' ?>