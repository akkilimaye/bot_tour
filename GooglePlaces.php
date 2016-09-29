<?php


class SavePlaces
{
	 var $lat=0.0;
	 var $lng=0.0;
	 var $google_places_key="";

	function __construct($latitude,$longitude){

		echo "constructor called";

		$this->lat=$latitude;
		$this->lng=$longitude;
		$this->google_places_key='AIzaSyD6qp5rZCwKBe5o1-BMmMwlCC194Fgz3xg';
	}

	function getLatitude(){
		return $this->lat;
	}
	function getLongitude(){
		return $this->lng;
	}

	function getGoogleKey(){
		return $this->google_places_key;
	}

	function getPlaces($sender,$access_token,$type)
	{

		$la=$this->getLatitude();
		$ln=$this->getLongitude();
		$google_places_key=$this->getGoogleKey();
		//echo $la;
		//echo $ln;
		//echo $google_places_key;
		$url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$la,$ln&radius=50000&type=$type&key=$google_places_key";
		$json=json_decode(file_get_contents($url),true);

		echo "\n\n$type";
		foreach($json['results'] as $result)
		{
			$place_lat=$result['geometry']['location']['lat'];
			$place_lon=$result['geometry']['location']['lng'];
			$place_name=$result['name'];
			$place_id=$result['id'];
			

			echo "\n".$place_name;
			//echo "\n".$place_name."\n".$place_id."\n".$place_lat."\n".$place_lon;
		}
		//$show=$json['results'][0]['geometry']['location']['lat'];
		//echo $show;
		//GiveReply($sender,"$show",$access_token);


	}

}











?>