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

    public function add_alarm() {
        $form = $this->form_builder->create_form();
        $this->load->model('details_model', 'detail');
        $this->load->model('subject_model', 'subject');
        $this->load->model('precinct_model', 'precinct');
        $this->load->model('reportee_model', 'reportee');
        $this->load->model('alarm_model', 'alarm');
        if ( !empty($this->input->post()) )
        {
            $fname = $this->input->post('fname');
            $mname = $this->input->post('mname');
            $lname = $this->input->post('lname');
            $age = $this->input->post('age');
            $rep_fname = $this->input->post('rep_fname');
            $rep_mname = $this->input->post('rep_mname');
            $rep_lname = $this->input->post('rep_lname');
            $alarm_type = $this->input->post('alarm_type');
            $gender = $this->input->post('gender');
            $nationality = $this->input->post('nationality');
            $complex = $this->input->post('complexion');
            $build = $this->input->post('build');
            $b_mark = $this->input->post('body_mark');
            $b_mark_loc = $this->input->post('body_mark_loc');
            $uc = $this->input->post('upper_cloth');
            $ucc = $this->input->post('upper_cloth_color');
            $lc = $this->input->post('lower_cloth');
            $lcc = $this->input->post('lower_cloth_color');
            $pec = $this->input->post('peculiarity');
            $loc_det = $this->input->post('loc_detail');
            $desc = $this->input->post('desc');
            $rel = $this->input->post('rel_to_subj');
            $contact_no = $this->input->post('contact_no');
            $addr = $this->input->post('addr');
            $rep_addr = $this->input->post('rep_addr');
            $height = $this->input->post('height');
            $weight = $this->input->post('weight');
            $hcolor = $this->input->post('hcolor');

            $detail_id = $this->detail->insert(array(
                'upper_cloth' => $uc,
                'upper_cloth_color' => $ucc,
                'lower_cloth' => $lc,
                'lower_cloth_color' => $lcc,
                'peculiarity' => $pec,
                'body_mark_id' => $b_mark,
                'body_mark_loc' => $b_mark_loc,
                'location_detail' => $loc_det,
                'description' => $desc
            ), false);

            $subject_id = $this->subject->insert(array(
                'fname' => $fname,
                'mname' => $mname,
                'lname' => $lname,
                'age' => $age,
                'gender' => $gender,
                'addr' => $addr,
                'nationality' => $nationality,
                'height' => $height,
                'weight' => $weight,
                'complexion' => $complex,
                'build' => $build,
                'hair_color' => $hcolor
            ), false);

            $reportee_id = $this->reportee->insert(array(
                'fname' => $rep_fname,
                'lname' => $rep_lname,
                'mname' => $rep_mname,
                'addr' => $rep_addr,
                'contact_no' => $contact_no,
                'rel_to_subj' => $rel
            ), false);

        }
        $pcp = array();
        foreach ($this->precinct->get_all() as $precinct) {
            $pcp[$precinct->id] = $precinct->name;
        }
        $this->load->model('body_mark_model', 'marks');
        $this->mViewData['body_marks'] = $this->marks->get_all();
        $this->mPageTitle = 'Create Alarm';
        $this->mViewData['form'] = $form;
        $this->render('alarm/add_alarm');
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