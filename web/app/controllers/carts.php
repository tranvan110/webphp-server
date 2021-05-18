<?php
defined('MVC') or exit('No direct script access allowed');

class carts extends controller
{
	public function index($request, $argument)
	{
		$data['title'] = 'Test';
		$data['description'] = 'abc';
		$data['author'] = 'vs';
		$data['keywords'] = 'test';
		$data['items'] = array("Peter"=>"35", "Ben"=>"37", "Joh"=>"43", "Jee"=>"43");
		$this->view('view_carts', $data);
	}
}
