<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model
{

    function getEvents($eID = '')
    {

        $this->db->select('id,event_title,start_date,end_date,event_recurrence,repeat_on,recurrence_format,created_at,modified_at');
        $this->db->order_by("id", "desc");

        if (!empty($eID)) {
            $this->db->where(array('id' => $eID));
            $q = $this->db->get('events');
            $response = $q->row_array();
        } else {
            $q = $this->db->get('events');
            $response = $q->result_array();
        }


        //echo $this->db->last_query(); exit;
        return (!empty($response) ? $response : []);
    }

    function getRecurrence($event = array())
    {


        $begin = new DateTime($event['start_date']);
        $end   = new DateTime($event['end_date']);

        $date = new DateTime();
        $weekdays = array();

        switch ($event['event_recurrence']) {
            case 'W':
                $rModify = 1;
                $rformat = 'day';
                break;
            case 'M':
                $rModify = $event['recurrence_format'];
                $rformat = 'month';
                break;
            case 'Y':
                $rModify = $event['recurrence_format'];
                $rformat = 'year';
                break;
            default:

                //Default D
                $rModify = 1;
                $rformat = 'day';
                break;
        }

        $response = array();


        for ($i = $begin; $i <= $end; $i->modify('+' . $rModify . ' ' . $rformat)) {
            if ($event['event_recurrence'] == 'W') {
                $arWeekDays = explode(",", $event['recurrence_format']);
                if (in_array(date('w', strtotime($i->format('Y-m-d'))), $arWeekDays)) {
                    $response[] = $i->format('Y-m-d');
                }
            } else {
                $response[] = $i->format('Y-m-d');
            }
        }
        return $response;
    }
}
