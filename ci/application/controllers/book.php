<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class book extends CI_Controller {
    public $model = NULL; // global var
    function __construct() {
        parent::__construct();
        $this->load->model("M_book"); // load model M_book 
        $this->model = new M_book(); // create object from M_book model Class
    }
    
    public function index(){
        $this->load->view('main');
    }
        
        public function add(){ // view add form only
            $data['content'] = "books/add";
            $this->load->view("main", $data);
        }
        public function add2(){ // insert into database
            $bookName = $this->input->post("bookName");
            $bookAuther = $this->input->post("bookAuther");
            $releaseDate = $this->input->post("releaseDate");
            $publisher = $this->input->post("publisher");
            $coverPage = $this->input->post("coverPage");
            $inputs = array('bookName'=>$bookName, 'bookAuther'=>$bookAuther, 'releaseDate'=>$releaseDate, 'publisher'=>$publisher, 'coverPage'=>$coverPage);
//            echo "<pre>";
//            print_r($inputs);
//            echo "</pre>";
//            exit();
//            $this->load->model("M_news");
//            $model = new M_news();
            $insert = $this->model->addDB($inputs);// send data to model
            if($insert)
                echo "Inserted";
            else
                echo "Not inserted";
        }

        public function view(){
            $data['result'] = $this->model->viewBooksDB();
            $data['content'] = "books/view";
            $this->load->view("main", $data);
        }
        public function update($id){ // $id from url
            $action = $this->input->post("action");
//            echo "Action: $action"; exit();
            if($action == 0){ // view update form only
                $id = intval($id);// convert var to integer
    //            $title = htmlspecialchars($string);
                //$result = $this->M_news->getById($id); // codeigniter
                $data['result'] = $this->model->getByIdDB($id);
//                echo $this->model->print_sql(); exit();
                $data['content'] = "books/update";
                $this->load->view("main", $data);
            }
            elseif($action == 1){ // updated in database
                $id = $this->input->post("id");
                $bookName = $this->input->post("bookName");
                $bookAuther = $this->input->post("bookAuther");
                $releaseDate = $this->input->post("releaseDate");
                $publisher = $this->input->post("publisher");
                $coverPage = $this->input->post("coverPage");
                $inputs = array('bookName'=>$bookName, 'bookAuther'=>$bookAuther, 'releaseDate'=>$releaseDate, 'publisher'=>$publisher, "coverPage"=>$coverPage);
                $update = $this->model->updateDB($id, $inputs);
                if($update)
                    echo "Updated";
                else
                    echo "Not Updated";
            }
            
        }
        
        public function delete(){
            $id = $this->input->post("id");
            $delete = $this->model->deleteDB($id);
//            echo $this->model->print_sql();
            if($delete)
                echo "Deleted";
            else
                echo "Not Deleted";
        }
}
