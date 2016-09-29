<?php

include 'GooglePlaces.php';


function GetLatLon($location)
{
	$geocoding_api_key="AIzaSyA0HYYfMDYEF0dkiomhGvf09uNhkiLrIvc";
$url="https://maps.googleapis.com/maps/api/geocode/json?address=$location&key=$geocoding_api_key";
		$json=file_get_contents($url);
		$obj=json_decode($json,true);
		$latitude=$obj['results'][0]['geometry']['location']['lat'];
		$longitude=$obj['results'][0]['geometry']['location']['lng'];
		echo $latitude;	
		echo $longitude;

	$places=new SavePlaces($latitude,$longitude);

	$types=array(
		'natural_feature',
		'place_of_worship',
		'point_of_interest',
		'amusement_park',
		'art_gallery',
		'casino',
		'church',
		'clothing_store',
		'hindu_temple',
		'museum',
		'shopping_mall',
		'zoo'
		);
	foreach($types as $type)
	{
		$places->getPlaces("1234","12345",$type);
	}

}

$location="Nagpur";
GetLatLon($location);





?>