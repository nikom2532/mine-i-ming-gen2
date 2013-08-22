<?
function mydatetime($date_value){
		if ($date_value){
			$x=substr($date_value,0,10);
			$arr=split("-",$x);
			$myformat=$arr[2]."/".$arr[1]."/".substr($arr[0], 2).substr($date_value,10,10);
		}
return $myformat;
}

function thaidatetime($date_value){
		if ($date_value){
			$x=substr($date_value,0,10);
			$arr=split("-",$x);
			$month[1]="มกราคม";
			$month[2]="กุมภาพันธ์";
			$month[3]="มีนาคม";
			$month[4]="เมษายน";
			$month[5]="พฤษภาคม";
			$month[6]="มิถุนายน";
			$month[7]="กรกฎาคม";
			$month[8]="สิงหาคม";
			$month[9]="กันยายน";
			$month[10]="ตุลาคม";
			$month[11]="พฤศจิกายน";
			$month[12]="ธันวาคม";
			$yyyy=$arr[0]+543;

			$myformat=number_format($arr[2])." ".$month[number_format($arr[1])]." ".$yyyy." ".number_format(substr($date_value,11,2)).substr($date_value,13,3)." น.";
		}

return $myformat;
}

function thaidate($date_value){
		if ($date_value){
			$x=substr($date_value,0,10);
			$arr=split("-",$x);
			$month[1]="มกราคม";
			$month[2]="กุมภาพันธ์";
			$month[3]="มีนาคม";
			$month[4]="เมษายน";
			$month[5]="พฤษภาคม";
			$month[6]="มีถุนายน";
			$month[7]="กรกฎาคม";
			$month[8]="สิงหาคม";
			$month[9]="กันยายน";
			$month[10]="ตุลาคม";
			$month[11]="พฤศจิกายน";
			$month[12]="ธันวาคม";
			$yyyy=$arr[0]+543;

			$myformat=number_format($arr[2])." ".$month[number_format($arr[1])]." ".$yyyy;
		}

return $myformat;
}

//convert sql datetime to strings
function convertDate2String($inputDate,$dateFormat=1) {
	switch ($dateFormat) {
	   case 1:
			return date('F d, Y h:i:s A', strtotime($inputDate));
	   break;
	   case 2:
			return date('F d, Y G:i:s', strtotime($inputDate));
	   break;
	   case 3:
			return date('M d, Y h:i:s A', strtotime($inputDate));
	   break;
	   case 4:
			return date('M d, Y G:i:s', strtotime($inputDate));
	   break;
	}
}
//		print convertDate2String("2009-08-10 18:00:00"); //Outputs: August 10, 2009 06:00:00 PM

?>
