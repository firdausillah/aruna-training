<?php
class MY_Controller extends CI_Controller
{
    public $logo;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProfileModel');
        $this->load->model('RawModel');

        $this->logo = $this->ProfileModel->findBy(['id' => 1])->row();
        $this->load->vars('profile', $this->logo);
    }
}
