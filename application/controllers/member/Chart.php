<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends MY_Controller
{
    public $defaultVariable = 'task';
    public $url_index = 'member/task';

    function __construct()
    {
        parent::__construct();
        $this->load->model('TaskModel', 'defaultModel');
        $this->load->model('ActivityModel');
        $this->load->model('MemberModel');
        $this->load->model('RawModel');
        $this->load->helper('slug');
        $this->load->helper('upload_file');
    }

    public function index()
    {
        $data = [
            'title' => 'Chart',
            'content' => 'chart'
        ];

        $this->load->view('layout_member/base', $data);
    }
}
