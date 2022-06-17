


<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadual extends CI_Controller {

    var $admin_email = '';

    function __construct() {
        parent::__construct();

        if (!$this->tank_auth->is_logged_in()) {
            redirect('auth/login');
        }

        $this->load->model('Room_model');
        $this->load->model('Booking_model');
        $this->load->model('jadual_model');
        $this->load->model('User_model');

    }

    function index($status_id = 0, $page = '') {
        $this->status($status_id, $page);
    }

    function status($status_id = 0, $page = '') {
        
        $tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $tomorrow1 = date("Y-m-d", $tomorrow);
        $per_page = $this->config->item('pagination_per_page');

   
                $request_id = 'all';
                $status_id = 'all';

        $params1 = array(
            'status_id' => $request_id,
            'sorting_type' => 'form-list',
            'where' => array(
                'users.deleted' => 0,
            ),
            'pagination' => array(
                'page' => (!empty($page) ? $page : 1),
                'per_page' => $per_page,
            ),
        );

        $params2 = array(
            'status_id' => $request_id,
        );

        $bookings = $this->jadual_model->getAllRecords('',$tomorrow1);
        if($bookings){
            $sec = $bookings[0]->secretariat;
        } else {
            $sec = '';
        }
        //$getname = $this->User_model->getEmelNotelSec($sec);
        $config = array();
        $config['base_url'] = site_url() . '/booking_rooms/status/' . $status_id . '/';
        $config['total_rows'] = $this->Booking_model->getCountBookingRecordsForRoom($params1);
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();

        $data['pagination'] = $pagination;
        $data['bookings'] = $bookings;
        //$data['getname'] = $getname;
        $data['loadpage'] = 'auth/jadual';
        $data['pagetitle'] = 'Jadual Bilik Mesyuarat';
        $data['breadcrumb'] = array(
            'Jadual' => 'jadual',
        );

        $this->load->view('include/master-nonauth-empty', $data);
    }
    

}
