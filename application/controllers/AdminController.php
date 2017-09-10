<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    private $lastInsertTourId;

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('Cpanel_model');
    }



    public function index()
    {
        if(empty($this->session->userdata('lastInsertTourId'))){
            $this->load->view('admin/header');
            $this->load->view('admin/index');
            $this->load->view('admin/footer');
        }else{
            redirect('AdminController/addTourImages');
        }
    }

    public function addNewTour(){
        $this->lastInsertTourId = $this->Cpanel_model->addNewTour();
        $this->session->set_userdata('lastInsertTourId',$this->lastInsertTourId);
        redirect("AdminController/addTourImages");
    }

    public function addTourImages(){
        $this->load->view('admin/header');
        $this->load->view('admin/add-tour-images');
        $this->load->view('admin/footer');
    }

    public function setTourImages(){
        $this->lastInsertTourId = $this->session->userdata('lastInsertTourId');



        //set the upload path
        $filename = './img/tourimages/' . $this->lastInsertTourId . '/';
        if (!file_exists($filename)) {
            mkdir('./img/tourimages/' . $this->lastInsertTourId . '/');
        }
        $path = './img/tourimages/' . $this->lastInsertTourId. '/';
        //get file array cont
        $count = count($_FILES['tour_image']['name']);
        //if file ayyar count exd minimum count
        if ($count > 5) {
            $count = 5;
        }
        foreach ($_FILES as $key => $value) {
            $a = 0;
            for ($s = 0; $s <= $count - 1; $s++) {
                $_FILES['tour_image']['name'] = str_replace('_', '', str_replace(' ', '', strtolower($value['name'][$s])));
                $_FILES['tour_image']['type'] = $value['type'][$s];
                $_FILES['tour_image']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['tour_image']['error'] = $value['error'][$s];
                $_FILES['tour_image']['size'] = $value['size'][$s];
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png';
                $config['overwrite'] = true;
                $this->load->library('upload', $config);
                $this->upload->do_upload('tour_image');
                $ar = array(
                    'tour_id' => $this->lastInsertTourId,
                    'image' => ($_FILES['tour_image']['name']) ? $_FILES['tour_image']['name'] : '0',
                    'listed' => $a
                );
                $this->db->insert('tour_images', $ar);
                if ($a == 0 AND !empty($_FILES['tour_image']['name'])) {
                    $this->imageOptimize($this->lastInsertTourId, $_FILES['tour_image']['name']);
                }
                $a++;
            }
            if ($count < 5) {
                $i = 0;
                for ($x = 0; $x <= (5 - $count) - 1; $x++) {
                    $ar = array(
                        'tour_id' => $this->lastInsertTourId,
                        'image' => 0,
                        'listed' => $a + $i
                    );
                    $this->db->insert('tour_images', $ar);
                    $i++;
                }
            }

        }
        $this->session->unset_userdata('lastInsertTourId');

        redirect('Admincontroller');
    }

    public function imageOptimize($folder, $image)
    {
        $this->load->library('image_lib');
        //create thumb folder
        if (!is_dir(FCPATH . 'img/tourimages/' . $folder . '/thumb')) {
            mkdir(FCPATH . 'img/tourimages/' . $folder . '/thumb', 0777, true);
        } else {
            //remove files from thumb folder
            delete_files(FCPATH . 'img/tourimages/' . $folder . '/thumb/', true);
        }
        //copy image
        copy(FCPATH . 'img/tourimages/' . $folder . '/' . $image, FCPATH . 'img/tourimages/' . $folder . '/thumb/' . $image);
        //reize image
        $config['image_library'] = 'gd2';
        $config['source_image'] = FCPATH . 'img/tourimages/' . $folder . '/thumb/' . $image;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = true;
        $config['width'] = 250;
        $config['height'] = 250;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    public function allTours(){
        $data['tours'] = $this->Cpanel_model->getAllTours();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/all-tours');
        $this->load->view('admin/footer');
    }

    public function editTour(){
        echo "edit tour";
    }


    public function addTourEvent()
    {

        $this->load->view('admin/header');
        $this->load->view('admin/add-tour-event');
        $this->load->view('admin/footer');

    }

    public function addTourEventInfo(){

        $add = $this->Cpanel_model->addTourEventInfo();
        if($add){
            $this->session->set_flashdata('add_event', 'done');
        }else{
            $this->session->set_flashdata('add_event', 'error');
        }

        redirect("AdminController/addTourEvent");
    }

    function allTourEvent(){
        $data['event'] = $this->Cpanel_model->allTourEvent();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/all-events');
        $this->load->view('admin/footer');
    }

    function editTourEventInfo(){
        $edit = $this->Cpanel_model->editTourEventInfo();
        if($edit){
            $this->session->set_flashdata('edit_event', 'done');
        }else{
            $this->session->set_flashdata('edit_event', 'error');
        }
        redirect("AdminController/allTourEvent");
    }

    function removeEvent(){
        $this->Cpanel_model->removeEvent();

        redirect("AdminController/allTourEvent");
    }


    public function addTourPackage(){
        $data['tour'] = $this->Cpanel_model->getAllTours();
        $data['event'] = $this->Cpanel_model->allTourEvent();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/add-tour-package');
        $this->load->view('admin/footer');

    }

    public function addTourPackageInfo(){

        $add = $this->Cpanel_model->addTourPackageInfo();
        if($add){
            $this->session->set_flashdata('add_package', 'done');
        }else{
            $this->session->set_flashdata('add_package', 'error');
        }

        redirect("AdminController/addTourPackage");
    }

    function allTourPackage(){
        $data['package'] = $this->Cpanel_model->allTourPackage();
        $data['tour'] = $this->Cpanel_model->getAllTours();
        $data['event'] = $this->Cpanel_model->allTourEvent();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/all-package');
        $this->load->view('admin/footer');
    }

    function getPackageEvent($id){
        $data = $this->Cpanel_model->getPackageEvent($id);
        return $data;
    }

    function checkEvent($event){
        $data =  $this->Cpanel_model->checkEvent($event);
        return $data;
    }

    function showEvent(){
        $event = $this->Cpanel_model->allTourEvent();
        foreach ($event as $event):
            $check_event = $this->checkEvent($event['id']);
            ?>
            <input type="checkbox" <?php if($check_event == 1){ echo 'checked'; }  ?> name="event_id[]" id="hobby2" value="<?= $event['id']; ?>" class="flat" /> <?= $event['tour_event']; ?>
            <br />
        <?php endforeach;
    }

    function editTourPackage(){
        $edit = $this->Cpanel_model->editTourPackage();
        if($edit){
            $this->session->set_flashdata('edit_package', 'done');
        }else{
            $this->session->set_flashdata('edit_package', 'error');
        }
        redirect("AdminController/allTourPackage");
    }

    function removePackage(){
        $this->Cpanel_model->removePackage();
        redirect("AdminController/allTourPackage");
    }

    function addService() {
        $this->load->view('admin/header');
        $this->load->view('admin/add-service');
        $this->load->view('admin/footer');
    }

    public function addServiceInfo(){
        $add = $this->Cpanel_model->addServiceInfo();
        if($add){
            $this->session->set_flashdata('add_service', 'done');
        }else{
            $this->session->set_flashdata('add_service', 'error');
        }
        redirect("AdminController/addService");
    }

    function allService(){
        $data['service'] = $this->Cpanel_model->allService();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/all-service');
        $this->load->view('admin/footer');
    }

    function editServiceInfo(){
        $edit = $this->Cpanel_model->editServiceInfo();
        if($edit){
            $this->session->set_flashdata('edit_service', 'done');
        }else{
            $this->session->set_flashdata('edit_service', 'error');
        }
        redirect("AdminController/allService");
    }

    function removeService(){
        $this->Cpanel_model->removeService();
        redirect("AdminController/allService");
    }


    function addOffer() {
        $this->load->view('admin/header');
        $this->load->view('admin/add-special');
        $this->load->view('admin/footer');
    }

    public function addOfferInfo(){
        $add = $this->Cpanel_model->addOfferInfo();
        if($add){
            $this->session->set_flashdata('add_offer', 'done');
        }else{
            $this->session->set_flashdata('add_offer', 'error');
        }
        redirect("AdminController/addOffer");
    }

    function allOffer(){
        $data['offer'] = $this->Cpanel_model->allOffer();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/all-special');
        $this->load->view('admin/footer');
    }

    function editOfferInfo(){
        $edit = $this->Cpanel_model->editOfferInfo();
        if($edit){
            $this->session->set_flashdata('edit_offer', 'done');
        }else{
            $this->session->set_flashdata('edit_offer', 'error');
        }
        redirect("AdminController/allOffer");
    }

    function removeOffer(){
        $this->Cpanel_model->removeOffer();
        redirect("AdminController/allOffer");
    }
}
