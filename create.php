<?php 
include("path.php");
include("app/controllers/posts.php");
?>
<?php
$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
  $posts = getPostsByTopicId($_GET['t_id']);
  $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
  $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
  $posts = searchPosts($_POST['search-term']);
} else {
  $posts = getPublishedPosts();
}

?>
<!DOCTYPE html>
<html lang="en">
   
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="assets/css/admin.css">

        <title>Add Post</title>
    </head>

    <body>
 
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>   
    <div class="content">

<h2 class="page-title " style="text-align: center;">Add Post</h2>


<form action="create.php" method="post" enctype="multipart/form-data">
    <div>
        <label>Title</label>
        <input type="text" name="title" value="" class="text-input">
    </div>
    <div>
        <label>Body</label>
        <textarea name="body" id="body"></textarea>
    </div>
    <div>
        <label>Image</label>
        <input type="file" name="image" class="text-input">
    </div>
    <div>
        <label>Topic</label>
        <select name="topic_id" class="text-input">
            <option value=""></option>
            <?php foreach ($topics as $key => $topic): ?>
                <?php if (!empty($topic_id) && $topic_id == $topic['id'] ): ?>
                    <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                <?php else: ?>
                    <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                <?php endif; ?>

            <?php endforeach; ?>

        </select>
    </div>
    <div>
        <?php if (empty($published)): ?>
            <label>
                <input type="checkbox" name="published">
                Publish
            </label>
        <?php else: ?>
            <label>
                <input type="checkbox" name="published" checked>
                Publish
            </label>
        <?php endif; ?>
    

    </div>
    <div>
        <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
    </div>
</form>

</div>


    


        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        <!-- Custom Script -->
        <script src="assets/js/scripts.js"></script>

    </body>

</html>