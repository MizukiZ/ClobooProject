<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Post</title>
   <?php include '../_include/common_head.php' ?>
</head>

<body>

  <?php include'../_include/common_nav.php' ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Post item</h5>
            <form method="post" action="../controller/post_controller.php" enctype="multipart/form-data">

              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" />
              </div>

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" id="title" />
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" placeholder="price" name="price" id="price" />
              </div>

              <div class="form-group">
                <label for="price">Description</label>
                <textarea class="form-control" placeholder="description" name="description" id="description"></textarea>
              </div>


              <div class="form-group">
                <label for="description">category</label>
                <input type="text" class="form-control" placeholder="Category" name="category" id="category" />
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Post book</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include'../_include/common_foot.php' ?>
</body>

</html>