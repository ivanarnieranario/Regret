<?php

class Alarm extends Admin_Controller {

    public function index() {
        $this->render('home');
    }

    public function search() {
        $this->load->model('body_mark_model', 'body_marks');
        $this->mViewData['body_marks'] = $this->body_marks->get_all();
        $this->render('alarm/search');
    }

    public function missing() {
        $this->load->model('alarm_model', 'alarm');
        $this->mViewData['alarms'] = $this->alarm->with( 'alarm_type' )
                                                ->with( 'subject' )
                                                ->get_all( );
        $this->render('alarm/missing');
    }

    public function dead() {
        $this->render('alarm/dead');
    }

    public function missing_details($alarm_id) {
        $this->mViewData['id'] = $alarm_id;
        $this->render('alarm/missing_details');
    }

    public function dead_details($alarm_id) {
        $this->mViewData['id'] = $alarm_id;
        $this->render('alarm/dead_details');
    }
}