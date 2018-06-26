<?php
//trasforma data para inclusao no MySQL
function data_mysql($data_dma){  
	if(!$data_dma) return false;
  $data_array = explode("/", $data_dma);
  $data = $data_array[2] ."-".$data_array[1]."-".$data_array[0];
  return $data;
}

function data_br($data_mysql){
	if(!$data_mysql) return false;
	$data = new DateTime($data_mysql);
	return $data->format("d/m/Y"); 
}