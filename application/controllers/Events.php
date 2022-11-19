<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->helper("app_helper");
		$this->load->model("events_model");
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$page_data['events'] = $this->events_model->getEvents();

		$this->load->view('list', $page_data);
	}

	public function add()
	{
		$this->load->view('add');
	}

	public function save()
	{


		$this->form_validation->set_rules('eTitle', 'Event Title', 'required');
		$this->form_validation->set_rules('eStartDate', 'Start Date', 'required');
		$this->form_validation->set_rules('eEndDate', 'End Date', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('flash_message', array('flash_message' => validation_errors(), 'class' => 'danger'));

			redirect('events/add');
		}


		$eTitle = $this->input->post('eTitle');
		$eStartDate = $this->input->post('eStartDate');
		$eEndDate = $this->input->post('eEndDate');
		$eRecurrance = $this->input->post('eRecurrance');
		$eIsRepeat = $this->input->post('eIsRepeat');

		if ($eIsRepeat == 1 && $eRecurrance != 'D') {
			if ($eRecurrance == 'W') {
				$dayOfWeeks =  $this->input->post('eDayofWeeks');
				$rFormat =  implode(",", $dayOfWeeks);
			} else {
				$rFormat =  $this->input->post('eOccurance');
			}
		} else {
			$rFormat = 1;
		}

		$this->db->insert('events', array(
			'event_title' => $eTitle,
			'start_date' =>  $eStartDate,
			'end_date' =>  $eEndDate,
			'event_recurrence' =>  $eRecurrance,
			'repeat_on' =>  $eIsRepeat,
			'recurrence_format' =>  $rFormat,
			'created_at' =>  date("Y-m-d H:i:s"),
			'modified_at' => date("Y-m-d H:i:s"),
		));

		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('flash_message', array('flash_message' => 'Added Successfully.', 'class' => 'success'));
		} else {
			$this->session->set_flashdata('flash_message', array('flash_message' => 'Error.', 'class' => 'danger'));
		}
		redirect('events/add');
	}

	public function view($eId = '')
	{
		if (!$eId) {
			redirect('events/index');
		}
		$page_data['event'] = $this->events_model->getEvents($eId);
		if (!$page_data['event']) {
			redirect('events/index');
		}
		$page_data['recurrence'] = $this->events_model->getRecurrence($page_data['event']);

		$this->load->view('view', $page_data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('events');
		redirect('events/index');
	}
}
