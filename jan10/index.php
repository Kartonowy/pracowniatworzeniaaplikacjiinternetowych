<?php 
$data = date("Y F l dS, H:ia");
$next_year = explode($data, " ");

$next_year[0] += 1;

$next_year_f = implode($next_year);

echo $data;
echo $next_year_f;

