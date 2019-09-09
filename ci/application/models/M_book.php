<?php
class M_book extends CI_Model{
    public function addDB($param){
        $this->db->insert("book", $param);
        return $this->db->insert_id();
    }
    
    public function viewBooksDB(){
        $d=$this->db->get("book"); // return as object
        $e=$d->result_array();// convert object to array to be read
        return $e;
    }
    
    public function getByIdDB($id){
        $where = array("id" =>$id);
        $d=$this->db->get_where("book", $where);
        $e=$d->result_array();
        return $e;
    }
    
    public function updateDB($id, $updateData){
        $where = array("id" =>$id);
        $update = $this->db->update("book",$updateData,$where);
        if($update)
            return true;
        else
            return false;
        //return $this->db->affected_rows();
    }
    
    public function deleteDB($id){
        $where = array("id"=>$id);
        $delete = $this->db->delete("book", $where);
        if($delete)
            return true;
        else
            return false;
    }
    
    public function print_sql(){
        print $this->db->last_query();
    }
            
}