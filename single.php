<?php include("path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');

if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
$comments=serachCommentByPost($_GET['id'])

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title><?php echo $post['title']; ?> | Blog item</title>
</head>

<body>
  <!-- Facebook Page Plugin SDK -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=285071545181837&autoLogAppEvents=1">
  </script>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content Wrapper -->
      <div class="main-content-wrapper">
        <div class="main-content single">
          <h1 class="post-title"><?php echo $post['title']; ?></h1>
          <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="single-image">
          <div class="post-content">
            <?php echo html_entity_decode($post['body']); ?>
          </div>
          <div class="post-comment">
            <h5>Add a Comment</h5>
            <form id="myForm" name="add-comment" method="POST" enctype="multipart/form-data">
              <textarea name="comment" id="comment" ></textarea>
              <input type="hidden" id="postID" name="postID" value="<?php echo $post['id']; ?>">
              <input type="hidden" id="logerIn" name="logerIn" value="<?php echo isset($_SESSION['id']) ? htmlspecialchars($_SESSION['id']) : ''; ?>">
                <button type="submit" name="add-comment">publish</button>
            </form>
            <div class="List-comment">
              <h3>Comments</h3>
              <?php foreach ($comments as $comm): ?>
              <div class="comment">  
                <div class="comment-item">
                  <svg xmlns="http://www.w3.org/2000/svg" width="58.764" height="58.5" viewBox="0 0 58.764 75.5">
                  <g id="Group_681" data-name="Group 681" transform="translate(0.532)">
                    <path id="Exclusion_4" data-name="Exclusion 4" d="M57.643,25.786V22.422A22.422,22.422,0,0,0,35.221,0H22.441A22.423,22.423,0,0,0,.018,22.422v3.363S-1.757,38.028,29.512,38.028,57.643,25.786,57.643,25.786Z" transform="translate(0 36.972)" fill="#acacac" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1"/>
                  <g id="Group_451" data-name="Group 451" transform="translate(12.02 0)">
                    <ellipse id="Ellipse_69" data-name="Ellipse 69" cx="16.659" cy="16.659" rx="16.659" ry="16.659" fill="#acacac"/>
                  </g>
                  </g>
                  </svg>
                  <div>
                    <p><?php echo $comm['username']?></p>
                    <p><?php echo $comm['created_at']?></p>
                  </div>
                </div>
                <p><?php echo $comm['content']?></p>
              </div>  
              <?php endforeach; ?>

            </div>  
            
          </div>

        </div>
      </div>
      <!-- // Main Content -->

      <!-- Sidebar -->
      <div class="sidebar single">
        <div class="section popular">
          <h2 class="section-title">Popular</h2>

          <?php foreach ($posts as $p): ?>
            <div class="post clearfix">
              <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
              <a href="single.php?id=<?php echo $p['id']; ?>" class="title">
                <h4><?php echo $p['title'] ?></h4>
              </a>
            </div>
          <?php endforeach; ?>
          

        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $topic): ?>
              <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>
      <!-- // Sidebar -->

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
  <!-- Custom Script -->
  <script src="assets/js/single.js"></script>

</body>

</html>