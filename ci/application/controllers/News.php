<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    public $model = NULL; // global var
    function __construct() {
        parent::__construct();
        $this->load->model("M_news"); // load model M_news 
        $this->model = new M_news(); // create object from M_news model Class
    }
    
    public function index(){
        $this->load->view('main');
    }
        
        public function add(){ // view add form only
            $data['content'] = "news/add";
            $this->load->view("main", $data);
        }
        public function add2(){ // insert into database
            $title = $this->input->post("title");
            $details = $this->input->post("details");
            $publish = $this->input->post("publish");
            $news_dt = $this->input->post("news_dt");
            $inputs = array('title'=>$title, 'details'=>$details, 'news_dt'=>$news_dt, 'publish'=>$publish);
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
            $data['result'] = $this->model->viewNewsDB();
            $data['content'] = "news/view";
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
                $data['content'] = "news/update";
                $this->load->view("main", $data);
            }
            elseif($action == 1){ // updated in database
                $id = $this->input->post("id");
                $title = $this->input->post("title");
                $details = $this->input->post("details");
                $publish = $this->input->post("publish");
                $news_dt = $this->input->post("news_dt");
                $inputs = array('title'=>$title, 'details'=>$details, 'news_dt'=>$news_dt, 'publish'=>$publish);
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
