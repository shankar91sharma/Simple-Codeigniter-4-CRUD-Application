<?php
namespace App\Models;

use CodeIgniter\Model;


class BookModel extends Model{


  protected $table ='books';
  protected $allowedFields =['title', 'isbn_no','author'];

  public function getRecords(){
  	return $this->orderBy('id','DESC')->findAll();
  }

  public function getRow($id){
  	return $this->where('id', $id)->first();
  }

}


?>