<?php

class Alarm_model extends MY_Model {

    public function __construct()
    {
        $this->timestamps = false;
        $this->after_create[] = 'add_activity';
        $this->has_one['detail'] = array('details_model','id', 'detail_id');
        $this->has_one['subject'] = array('subject_model', 'id', 'subject_id');
        $this->has_one['reportee'] = array('reportee_model', 'id', 'reportee_id');
        $this->has_one['receiver'] = array('user_model', 'id', 'receiver_id');
        $this->has_one['alarm_type'] = array('alarm_type_model', 'id', 'alarm_type_id');
        parent::__construct();
    }
}
