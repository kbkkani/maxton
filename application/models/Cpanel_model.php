<?php
class Cpanel_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }


        public function addNewTour(){

        	$data = [
        	'tour_title'=>$this->input->post('tour_title'),
        	'tour_description'=>$this->input->post('tour_description'),
        	'tour_cost'=>$this->input->post('tour_cost'),
        	'tour_duration'=>$this->input->post('tour_duration')
        	];

        	$this->db->insert('tour',$data);
        	return $this->db->insert_id();
        }



        public function getAllTours(){
        	$query = "select * from tour where online = 1";
        	return $this->db->query($query)->result_array();
        }

        function addTourEventInfo(){
            $data = [
                'tour_event'=>$this->input->post('event_title'),
                'online'=>1,
            ];

            $this->db->insert('tour_event',$data);
            return true;
        }

        function allTourEvent(){
            $query = "select * from tour_event where online = 1";
            return $this->db->query($query)->result_array();
        }

        function editTourEventInfo(){
            $data = array(
                'tour_event' => $this->input->post('event_title'),
            );
            $this->db->where('id', $this->security->xss_clean($this->input->post('id')));
            $query = $this->db->update('tour_event', $data);

            if($query) {
                return true;
            } else {
                return false;
            }
        }

        function removeEvent(){
            $data = array(
                'online' => 0,
            );
            $this->db->where('id', $this->security->xss_clean($this->input->post('id')));
            $sql = $this->db->update('tour_event', $data);
            if($sql) {
                return true;
            } else {
                return false;
            }
        }

    function allTourPackage(){
        $query = "select p.*, t.tour_title as tour_title from package p JOIN tour t WHERE p.tour_id = t.id";
        return $this->db->query($query)->result_array();
    }

    function getPackageEvent($id){
        $query = "select * from package_has_tour_event p JOIN tour_event t WHERE p.tour_event_id = t.id AND p.package_id=$id";
        return $this->db->query($query)->result_array();
    }

    function checkEvent($event){
        $package = $this->input->post('package');
        $query = "select * from package_has_tour_event p JOIN tour_event t WHERE p.tour_event_id = t.id AND p.tour_event_id= $event AND p.package_id=$package";
        return $this->db->query($query)->num_rows();
    }

    function addTourPackageInfo(){
        $data = [
            'tour_id'=>$this->input->post('tour_id'),
            'title'=>$this->input->post('title'),
        ];
        $query =  $this->db->insert('package',$data);
        if($query) {
            $package_id = $this->db->insert_id();
            if(isset($_POST['event_id'])){
                for ($j = 0; $j <= count($_POST['event_id']); $j++) {
                    if(!empty($_POST['event_id'][$j])){
                        $data = array(
                            'package_id' => $package_id,
                            'tour_event_id' => $_POST['event_id'][$j],
                        );
                        $this->db->insert('package_has_tour_event',$data);
                    }
                }
            }
            return true;
        } else {
            return false;
        }

    }


    function editTourPackage(){
        $data = array(
            'tour_id'=>$this->input->post('tour_id'),
            'title'=>$this->input->post('title'),
        );
        $this->db->where('id', $this->security->xss_clean($this->input->post('id')));
        $query = $this->db->update('package', $data);

        if($query) {
            $this->db->where('package_id', $this->input->post('id'));
            $this->db->delete('package_has_tour_event');
            if(isset($_POST['event_id'])){
                for ($j = 0; $j <= count($_POST['event_id']); $j++) {
                    if(!empty($_POST['event_id'][$j])){
                        $data = array(
                            'package_id' => $this->input->post('id'),
                            'tour_event_id' => $_POST['event_id'][$j],
                        );
                        $this->db->insert('package_has_tour_event',$data);
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }

    function removePackage(){
        $this->db->where('package_id', $this->input->post('id'));
        $sql = $this->db->delete('package_has_tour_event');
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('package');

        if($sql) {
            return true;
        } else {
            return false;
        }
    }



    function addServiceInfo(){
        $data = [
            'service_title'=>$this->input->post('title'),
        ];

        $this->db->insert('service',$data);
        return true;
    }

    function allService(){
        $query = "select * from service";
        return $this->db->query($query)->result_array();
    }

    function editServiceInfo(){
        $data = array(
            'service_title' => $this->input->post('title'),
        );
        $this->db->where('id', $this->security->xss_clean($this->input->post('id')));
        $query = $this->db->update('service', $data);

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function removeService(){
        $this->db->where('id', $this->input->post('id'));
        $sql= $this->db->delete('service');
        if($sql) {
            return true;
        } else {
            return false;
        }
    }


    function addOfferInfo(){
        $data = [
            'special_offer_title'=>$this->input->post('title'),
        ];

        $this->db->insert('special_offer',$data);
        return true;
    }

    function allOffer(){
        $query = "select * from special_offer";
        return $this->db->query($query)->result_array();
    }

    function editOfferInfo(){
        $data = array(
            'special_offer_title' => $this->input->post('title'),
        );
        $this->db->where('id', $this->security->xss_clean($this->input->post('id')));
        $query = $this->db->update('special_offer', $data);

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    function removeOffer(){
        $this->db->where('id', $this->input->post('id'));
        $sql= $this->db->delete('special_offer');
        if($sql) {
            return true;
        } else {
            return false;
        }
    }
}
