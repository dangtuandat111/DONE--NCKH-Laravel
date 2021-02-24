<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Carbon\Carbon;
use DateTime;


class ScheduleImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
    	$i = 0;
    	
    	
    	foreach($collection as $row) {
    		
    			if ($i>=3 and $i<=10) {
    			echo "STT: ".$i."-------Ten mon:  ".$row[4]." ------- Thoi gian:  ".$row[9]."<br />";
    			dump($row);
    			$this->dataChange($row);
    			$i = $i + 1;
    			
    		}
    		else {
    			if($i<10) {
    				$i = $i + 1;
    			}
    			else break;
    		
    		}
    		
    	}

    }

    //Phien ban 1
    public function dataChange(Collection $row){
    	//echo "<br />";
    	
    	$mahp = $row[2];
    	$tenhp = $row[4];
    	$kieu = $row[7];
    	$gv = $row[8];
    	$thoigian = $row[9];
    	$thu[] = [$row[11],$row[13],$row[15],$row[17],$row[19],$row[21],$row[23] ];
    	$room[] = [$row[12],$row[14],$row[16],$row[18],$row[20],$row[22],$row[24] ];
    	$lop = $row[25];
    	$khoa = $row[26];

    	$startTime = explode("-",$thoigian)[0];
    	$endTime = explode("-",$thoigian)[1];
    	
    	print_r($startTime);
    	echo "<br />";
    	print_r($endTime);
    	

    	$day_endTime = explode("/",$endTime)[0];
    	$month_endTime = explode('/',$endTime)[1];
    	$year_endTime = explode('/',$endTime)[2];
    	$year_endTime = "20".$year_endTime;
    	$endTime = $day_endTime."/".$month_endTime."/".$year_endTime;
    	$startTime .= "/";
    	$startTime .= $year_endTime;
    	$day_startTime = explode("/",$startTime)[0];
    	$month_startTime = explode('/',$startTime)[1];
    	$year_startTime = explode('/',$startTime)[2];
    	$startTime = $day_startTime."/".$month_startTime."/".$year_startTime;
    	
    	echo "<br />";
		print_r("Ngay bat dau moi:".$startTime);  
		echo "<br />";
		print_r("Ngay ket thuc moi:".$endTime);  
		echo "<br />";
		print_r($thu);
		echo "<br />";

		$ngay = 2; 
		$ca = 0;
		foreach($thu as $ptthu) {
			foreach($ptthu as $tiet){
				if($tiet != null) {
					echo $tiet;
					echo "<br />";
					echo "Ngay thu: ".$ngay;
					echo "<br />";
					if ($tiet == "1,2,3") {
						$ca = 1;
						echo "Ca: ".$ca;
						echo "<br />";
					}
					break;
				}
				else {
					$ngay = $ngay+1;
				}
			}
		}

		//chuyen tu string sang date
		// $startTime = new DateTime($startTime);
		// $endTime = date('d-m-Y', $endTime);
		// echo date('d-m-Y', $startTime); 
		// echo date('d/m/Y', $endTime); 
		// $myDate = '12/08/2020';

        $startTime = Carbon::createFromFormat('d/m/Y', $startTime)->format('d-m-Y');
        $endTime = Carbon::createFromFormat('d/m/Y', $endTime)->format('d-m-Y');

        $startTime = Carbon::createFromFormat('d-m-Y', $startTime);
        $endTime = Carbon::createFromFormat('d-m-Y', $endTime);

        echo "ngaybatdau ".$startTime." ngayketthuc ".$endTime."<br />";

        $dateBegin = $startTime->addDays($ngay-2);
        $dateEnd = $endTime;

        echo "ngaybatdau1 ".$dateBegin." ngayketthuc1 ".$dateEnd."<br />";

		//$dateint = mktime(0, 0, 0, $month_startTime, ($day_startTime + $ngay - 2), $year_startTime);
		
		

		while($dateEnd >= $dateBegin ) {
			echo "<br />"."da vao"."<br />";
			$date = array("Ngay hoc" => $dateBegin, "Ca hoc" => $ca);
			
			
			echo $date['Ngay hoc']."\t".$date['Ca hoc'];
			$dateBegin = $startTime->addWeeks(1);


		}
				



    	echo "<br />";
    	echo "<br />";
    }

}
