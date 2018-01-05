<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function index()
	{
		$this->load->model('alarm_model', 'alarms');
		$this->mViewData['alarms'] = $this->alarms->with('alarm_type')->get_all();
		$this->render('home');
	}
}
