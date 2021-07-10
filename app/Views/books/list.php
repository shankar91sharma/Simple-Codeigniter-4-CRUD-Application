
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
      <h2>Books List <a href="<?php echo base_url('books/add'); ?>" class="btn btn-primary btn-sm" style="float: right;"> Add Book </a></h2>
      
      <?php
       if(!empty($session->getFlashdata('success'))) {
       	?>
        <p class="text-success">
        	<?php echo $session->getFlashdata('success'); ?>
        </p>
       	<?php
       }
      ?>

      <?php
       if(!empty($session->getFlashdata('error'))) {
       	?>
        <p class="text-danger">
        	<?php echo $session->getFlashdata('error'); ?>
        </p>
       	<?php
       }
      ?>

      <table class="table">
  <thead>
    <tr>
      <th scope="col"># ID</th>
      <th scope="col">Title</th>
      <th scope="col">ISBN No</th>
      <th scope="col">Author</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php
    if (!empty($books)) {
    foreach ($books as $booksdata) {
  	?>
    <tr>
      <th scope="row"><?php echo $id=$booksdata['id'] ?></th>
      <td><?php echo $booksdata['title'] ?></td>
      <td><?php echo $booksdata['isbn_no'] ?></td>
      <td><?php echo $booksdata['author'] ?></td>
      <td>
		<a href="<?php echo base_url('books/edit/'.$id)?>" class="btn btn-primary btn-sm">Edit</a>
		<a href="#" onclick="deleteConfirm(<?php echo $id ?>);" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    <?php
     }
     }
     else
     {
     ?>
     <tr>
      <td scope="row" colspan="5"> No Records </td>
    </tr>
     <?php
     }
     ?>
    
  </tbody>
</table>
      
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0;background: #222222;
    color: white;">
  <p> © 2021 designed by S L Sharma . All rights reserved </p>
</div>

</body>

<script type="text/javascript">
	function deleteConfirm(id) {
		//alert(id);
		if (confirm("Are u sure want to delete ?")) {
			window.location.href='<?php echo base_url('books/delete/')?>/'+id;
		}
	}
</script>
</html>
