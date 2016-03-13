<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

function pagination($total_rows, $per_page, $base_url = NULL, $uri_segment = 3)
{
	$ci =& get_instance();
	
	//mengambil base_url otomatis berdasarkan class dan method yang memanggilnya
	if (is_null($base_url))
	{
		$segment[] = $ci->router->class;
		$segment[] = $ci->router->method;
		$base_url = implode('/', $segment);
	}
	
	$config['total_rows'] = $total_rows;
	$config['per_page'] = $per_page;
	$config['uri_segment'] = $uri_segment;
	$config['base_url'] = site_url($base_url);
	$ci->load->library('pagination'); //ci akan menggunakan konfigurasi di config/pagination.php
	$ci->pagination->initialize($config);
	return $ci->pagination->create_links();
}