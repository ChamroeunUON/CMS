
<?php
    if (isset($_POST['create_post'])) {
        # Handler for button Create Publish Post
        insert_post();
    }
 ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" placeholder="title" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="catID">Post Categories ID</label>
        <input type="text" placeholder="Post Categories ID" name="post_category_id" id="post_category_id" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" placeholder="Post Author" name="author" id="author" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <input type="text" placeholder="Post Author" name="post_status" id="author" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" placeholder="choose a file" name="image" id="image">
    </div>
    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" placeholder="Post Tag" name="post_tags" id="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea placeholder="Post Content" name="post_content" cols="30" rows="10" id="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-success" id="create_post" name="create_post">Publish Post</button>
    </div>
</form>