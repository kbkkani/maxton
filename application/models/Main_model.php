<?php
class Main_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }



    public function getAllHotestTours(){
        $query = "SELECT tour.*,(SELECT image FROM tour_images WHERE tour_images.listed =0 AND tour_images.tour_id = tour.id) AS image FROM `tour` WHERE tour.online = 1 AND tour.hotest = 1";
        return $this->db->query($query)->result_array();
    }
    
     public function getAllFeturedTours(){
        $query = "SELECT tour.*,(SELECT image FROM tour_images WHERE tour_images.listed =0 AND tour_images.tour_id = tour.id) AS image FROM `tour` WHERE tour.online = 1 AND tour.featured = 1";
        return $this->db->query($query)->result_array();
    }
    
    public function getAllTours(){
        $query = "SELECT tour.*,(SELECT image FROM tour_images WHERE tour_images.listed =0 AND tour_images.tour_id = tour.id) AS image FROM `tour` WHERE tour.online = 1";
        return $this->db->query($query)->result_array();
        
    }
    
    public function getSelectedTour($id=null){
        $query = "SELECT * FROM tour where id = '".$id."'";
        $tour  = $this->db->query($query)->result_array();
        
        $query2 = "SELECT * FROM tour_images where tour_id = '".$id."'";
        $tourImages  = $this->db->query($query2)->result_array();
        
        
       return [
           'tour'=>$tour,
           'tour_images'=>$tourImages
       ];
        
    }

}
