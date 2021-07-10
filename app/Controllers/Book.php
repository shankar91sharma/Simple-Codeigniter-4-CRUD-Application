<?php 

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController
{
	public function index()
	{
	   $session =  \Config\Services::session();
	   $data['session'] = $session;

	   $model = new BookModel();
	   $booksArray = $model->getRecords();
       $data['books']=$booksArray;

       return view('books/list', $data);
	}

    public function add()
	{
	   $session =  \Config\Services::session();
	   helper('form');

	   $data =[];
       
       if($this->request->getMethod() == 'post'){
       	$input = $this->validate([
         'title'=>'required',
         'isbnno'=>'required',
         'author'=>'required',
       	]);
        
        if($input == true){
           $model  = new BookModel();
        
           $model->save([
             'title' => $this->request->getPost('title'),
             'isbn_no' => $this->request->getPost('isbnno'),
             'author' => $this->request->getPost('author')
           ]);

            $session->setFlashdata('success', 'New Record added successfully');
            return redirect()->to('books');
        }
        else{
           $data['validation'] = $this->validator;
        }

       }

       return view('books/create', $data);
	}

    public function edit($id)
    {
      //echo $id;
       $session =  \Config\Services::session();
	   helper('form');

	   $model  = new BookModel();
       $book =  $model->getRow($id);
       if (empty($book))
       {
       	$session->setFlashdata('error', 'Record not found');
       	return redirect()->to('/books');
       }         
  

	   $data =[];
	   $data['book']= $book;
       
       if($this->request->getMethod() == 'post'){
       	$input = $this->validate([
         'title'=>'required',
         'isbnno'=>'required',
         'author'=>'required'
       	]);
        
        if($input == true){
           $model  = new BookModel();
           
           $model->update($id, [
             'title' => $this->request->getPost('title'),
             'isbn_no' => $this->request->getPost('isbnno'),
             'author' => $this->request->getPost('author')
           ]);

            $session->setFlashdata('success', 'Record update successfully');
            return redirect()->to('books');
        }
        else{
           $data['validation'] = $this->validator;
        }

       }

       return view('books/edit', $data);
    }
    ////////  edit function end 

    public function delete($id){
    	$session =  \Config\Services::session();

	   $model  = new BookModel();
       $book =  $model->getRow($id);
       if (empty($book))
       {
       	$session->setFlashdata('error', 'Record not found');
       	return redirect()->to('/books');
       }

       $model->delete($id);
       $session->setFlashdata('success', 'Record delete successfully');
       return redirect()->to('books');

    }
    ///// delete function end 



}

?>