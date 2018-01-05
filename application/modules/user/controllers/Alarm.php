<?php

class Alarm extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_builder');
    }

    public function index() {
        $this->render('home');
    }

    public function search() {
        if ($this->input->get())
        {
            $this->load->model('alarm_model', 'alarm');
            $missing = $this->input->get('missing');
            $dead = $this->input->get('dead');
            $pcp = $this->input->get('pcp');
            $fname = $this->input->get('fname');
            $mname = $this->input->get('mname');
            $lname = $this->input->get('lname');
            $gender= $this->input->get('gender');
            $nation= $this->input->get('nationality');
            $complex= $this->input->get('complexion');
            $build = $this->input->get('build');
            $body_mark = $this->input->get('body_mark');


            if ($dead != '' || $missing != '') {
                $str = "where:".($dead != '' ? '`id`=\'2\'' : '');
                $str .= ($dead != '' && $missing != '' ? ' AND ' : '');
                $str .= ($missing != '' ? '`id`=\'1\'' : '');
                $this->alarm->with_alarm_type($str);
            } else {
                $this->alarm->with_alarm_type();
            }
            if ($fname != '' || $mname != '' || $lname !='' || $gender != '' || $nation != '' || $complex != '' ||  $build != '') {
                $str = "where:".($fname != '' ? '`fname`=\''.$fname.'\'' : '');
                $str .= ($fname != '' && $mname != '' ? ' AND ' : '');
                $str .= ($mname != '' ? '`mname`=\''.$mname.'\'' : '');
                $str .= ($mname != '' && $lname != '' ? ' AND ' : '');
                $str .= ($lname != '' ? '`lname`=\''.$lname.'\'' : '');
                $str .= ($lname != '' && $gender != '' ? ' AND ' : '' );
                $str .= ($gender != '' ? '`gender`=\''.$gender.'\'' : '');
                $str .= ($gender != '' && $nation != '' ? ' AND ' : '');
                $str .= ($nation != '' ? '`nationality`=\''.$nation.'\'' : '');
                $str .= ($nation != '' && $complex != '' ? ' AND ' : '');
                $str .= ($complex != '' ? '`complexion`=\''.$complex.'\'' : '');
                $str .= ($complex != '' && $build != '' ? ' AND ' : '');
                $str .= ($build != '' ? '`build`=\''.$build.'\'' : '');
                $str .= ($build != '' && $body_mark != '' ? ' AND ' : '');
                $this->alarm->with_subject($str);
            } else {
                $this->alarm->with_subject();
            }
            if ($body_mark != '') {

                $str = "where:".($body_mark != '' ? '`body_mark_id`=\''.$body_mark.'\'' : '');
                $this->alarm->with_detail($str);
            } else {
                $this->alarm->with_detail();
            }
            if($pcp != '') {
                $str = "where:`id`='$pcp'";
                $this->alarm->with_receiver($str);
            } else {
                $this->alarm->with_receiver();
            }
            $this->mViewData['alarms'] = $this->alarm->get_all();
            $this->render('home');
        } else {
            $this->load->model('body_mark_model', 'body_marks');
            $this->mViewData['body_marks'] = $this->body_marks->get_all();
            $this->load->model('precinct_model', 'pcp');
            $this->mViewData['pcp'] = $this->pcp->as_dropdown('name')->get_all();
            $this->render('alarm/search');
        }

    }

    public function missing() {
        $this->load->model('alarm_model', 'alarms');
        $this->mViewData['alarms'] = $this->alarms
            ->with_alarm_type()
            ->with_subject()
            ->where('alarm_type_id', '1')
            ->get_all();
        $this->render('alarm/missing');
    }

    public function dead() {
        $this->load->model('alarm_model', 'alarms');
        $this->mViewData['alarms'] = $this->alarms
            ->with_alarm_type()
            ->with_subject()
            ->where('alarm_type_id', '2')
            ->get_all();
        $this->render('alarm/dead');
    }

    public function missing_details($alarm_id) {
        $this->mViewData['id'] = $alarm_id;
        $this->load->model('alarm_model', 'alarm');
        $this->load->model('body_mark_model', 'bmark');
        $this->load->model('precinct_model', 'pcp');
        $this->load->model('rank_model', 'rank');
        $this->mViewData['alarm'] = $data = $this->alarm->with_alarm_type()
            ->with_detail()
            ->with_subject()
            ->with_receiver()
            ->where('id', $alarm_id)
            ->get();
        $this->mViewData['body_mark'] = $this->bmark->where( 'id', $data->detail->body_mark_id )->get();
        $this->mViewData['pcp'] = $this->pcp->where( 'id', $data->receiver->precinct_id )->get();
        $this->mViewData['rank'] = $this->rank->where( 'id', $data->receiver->rank_id )->get();
        $this->render('alarm/missing_details');
    }

    public function dead_details($alarm_id) {
        $this->mViewData['id'] = $alarm_id;
        $this->load->model('alarm_model', 'alarm');
        $this->load->model('body_mark_model', 'bmark');
        $this->load->model('precinct_model', 'pcp');
        $this->load->model('rank_model', 'rank');
        $this->mViewData['alarm'] = $data = $this->alarm
            ->with_detail()
            ->with_subject()
            ->with_receiver()
            ->with_alarm_type()
            ->where('id', $alarm_id)
            ->get(1);
        $this->mViewData['body_mark'] = $this->bmark->where( 'id', $data->detail->body_mark_id )->get();
        $this->mViewData['pcp'] = $this->pcp->where( 'id', $data->receiver->precinct_id )->get();
        $this->mViewData['rank'] = $this->rank->where( 'id', $data->receiver->rank_id )->get();
        $this->render('alarm/dead_details');
    }
}