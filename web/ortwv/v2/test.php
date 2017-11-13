<?php


$firstLatitude = '13.028812';
$secondLatitude = '13.040440';

$firstLongitude = '80.233633';
$secondLongitude = '80.055557';

echo $distance = sqrt((($firstLongitude-$secondLongitude)*($firstLongitude-$secondLongitude))+(($firstLatitude-$secondLatitude)*($firstLatitude-$secondLatitude)));




?>