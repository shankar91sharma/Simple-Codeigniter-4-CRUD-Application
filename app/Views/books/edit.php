
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Codeigniter 4 CRUD Application </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <h4 style="color: white;"> Simple Codeigniter 4 CRUD Application </h4>
  </div>
</nav>

<div class="container">
  <div class="row">
    
    <div class="col-sm-12">
      <h2> Book Edit 
        <a href="<?php echo base_url('books'); ?>" class="btn btn-primary btn-sm" style="float: right;"> Book List </a>
      </h2>

       <form name="createForm" id="createForm" method="post" action="<?php echo base_url('books/edit/'.$book['id'])?>">

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo set_value('title', $book['title']); ?>">
      <span class="text-danger">
      <?php
      if(isset($validation) && $validation->haserror('title')){
      echo $validation->getError('title');
      }
      ?>
      </span>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ISBN No</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="isbnno" placeholder="ISBN No" value="<?php echo set_value('isbnno', $book['isbn_no']); ?>">
      <span class="text-danger">
        <?php
         if(isset($validation) && $validation->hasError('isbnno'))
         {
          echo $validation->getError('isbnno');
         }
        ?>
      </span>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Autor</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="author" placeholder="Autor" value="<?php echo set_value('author', $book['author']); ?>">
      <span class="text-danger">
        <?php
         if(isset($validation) && $validation->hasError('author'))
         {
          echo $validation->getError('author');
         }
        ?>
      </span>
    </div>
  </div>
 
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Edit Book </button>
    </div>
  </div>
</form>
      
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0;background: #222222;
    color: white;">
  <p> © 2021 designed by S L Sharma . All rights reserved </p>
</div>

</body>
</html>
