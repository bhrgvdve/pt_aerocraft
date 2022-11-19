<?php if (!defined('BASEPATH')) exit('No direct script access alowed');

if (!function_exists('get_week_days')) {
    function get_week_days($reqWeekDays)
    {
        $ci = get_instance(); // CI_Loader instance
        $arWeekDays = $ci->config->item('arWeekDays');
        $response = array();
        if (count($reqWeekDays) > 0) {
            foreach ($reqWeekDays as $reqWeekDay) {
                $response[] = $arWeekDays[$reqWeekDay];
            }
        }
        return implode(",", $response);
    }
}
