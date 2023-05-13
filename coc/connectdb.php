<?php

	error_reporting(~E_NOTICE);

	$Host = "localhost";
	$User = "root";
	$Pass = "";
	$Database = "meeting_registration";


$Host = "localhost";
$User = "cp951329_idmc";
$Pass = "8MVXucn4e";
$Database = "cp951329_idmc";


	// $User = "elecsoftne_elecsoftne";
	// $Pass = "DevX@2020";
	// $Database = "elecsoftne_coc";


	$Title_Web = "STGP-Counting";
	$Title_System = "Chusch of Covenant";
	$Title_Store = "Bangkok";


	$conn =  mysqli_connect($Host,$User,$Pass,$Database);
	if (!$conn)
	   die("Cannot connection to MYSQL Database");

	mysqli_query($conn,"SET character_set_results=utf8");//ตั้งค่าการดึงข้อมูลออกมาให้เป็น utf8
	mysqli_query($conn,"SET character_set_client=utf8");//ตั้งค่าการส่งข้อมุลลงฐานข้อมูลออกมาให้เป็น utf8
	mysqli_query($conn,"SET character_set_connection=utf8");//ตั้งค่าการติดต่อฐานข้อมูลให้เป็น utf8

	date_default_timezone_set('Asia/Bangkok');


		function Money_Split($Total)  // Insert comma in the money
		{
				$Total_1 = "";
				$Total_2 = "";
				if (strlen($Total)>3)
				{
						$Total_1 = substr($Total,strlen($Total)-3,3);
						$Total = substr($Total,0,strlen($Total)-3);
				}
				if (strlen($Total)>3)
				{
						$Total_2 = substr($Total,strlen($Total)-3,3);
						$Total = substr($Total,0,strlen($Total)-3);
				}
				if (($Total_1!="") && ($Total_2!=""))
						$Total = $Total.",".$Total_2.",".$Total_1;
				elseif (($Total_1!="") && ($Total_2==""))
						$Total = $Total.",".$Total_1;
				else
						$Total = $Total;

				return $Total;
		}

		function Money2Integer($x)  // Convert 10,000.48 to 10000.48
		{
				$tmp = "";
				for ($i=0; $i<strlen($x); $i++)
				{
						 $xCh = substr($x,$i,1);
						 if (($xCh=="0") || ($xCh=="1") || ($xCh=="2") || ($xCh=="3") || ($xCh=="4") || ($xCh=="5") || ($xCh=="6") || ($xCh=="7") || ($xCh=="8") || ($xCh=="9") || ($xCh=="."))
						 {
								$tmp = $tmp.$xCh;
						 }
				}

				return $tmp;
		}

		function th_month_small($Month)
		{
				switch ($Month)
				{
						case 1: $Month = "�.�."; 		break;
						case 2: $Month = "�.�."; 	break;
						case 3: $Month = "��.�."; 		break;
						case 4: $Month = "��.�."; 	break;
						case 5: $Month = "�.�."; 	break;
						case 6: $Month = "��.�."; 		break;
						case 7: $Month = "�.�."; 		break;
						case 8: $Month = "�.�."; 		break;
						case 9: $Month = "�.�."; 		break;
						case 10: $Month = "�.�."; 	break;
						case 11: $Month = "�.�."; 	break;
						case 12: $Month = "�.�."; 	break;
						default: $Month = $Month;
				}
				return $Month;
		}

		function th_month($Month)
		{
				switch ($Month)
				{
						case 1:	 $Month = "���Ҥ�"; 		break;
						case 2:	 $Month = "����Ҿѹ��"; 	break;
						case 3:	 $Month = "�չҤ�"; 		break;
						case 4:	 $Month = "����¹"; 		break;
						case 5:	 $Month = "����Ҥ�"; 	break;
						case 6:	 $Month = "�Զع�¹"; 		break;
						case 7:	 $Month = "�áîҤ�"; 	break;
						case 8:	 $Month = "�ԧ�Ҥ�"; 		break;
						case 9:	 $Month = "�ѹ��¹"; 		break;
						case 10: $Month = "���Ҥ�"; 			break;
						case 11: $Month = "��Ȩԡ�¹"; 	break;
						case 12: $Month = "�ѹ�Ҥ�"; 		break;
						default: $Month = $Month;
				}
				return $Month;
		}

		function month_int($Str)
		{
				if (($Str=="���Ҥ�") || ($Str=="����") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 1;
				elseif (($Str=="����Ҿѹ��") || ($Str=="�����") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 2;
				elseif (($Str=="�չҤ�") || ($Str=="�չ�") || ($Str=="��.�") || ($Str=="��.�."))
					$Month = 3;
				elseif (($Str=="����¹") || ($Str=="����") || ($Str=="��.�") || ($Str=="��.�."))
					$Month = 4;
				elseif (($Str=="����Ҥ�") || ($Str=="�����") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 5;
				elseif (($Str=="�Զع�¹") || ($Str=="�Զع�") || ($Str=="��.�") || ($Str=="��.�."))
					$Month = 6;
				elseif (($Str=="�á�Ҥ�") || ($Str=="�á���") || ($Str=="�á�Ҥ�") || ($Str=="�á���") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 7;
				elseif (($Str=="�ԧ�Ҥ�") || ($Str=="�ԧ��") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 8;
				elseif (($Str=="�ѹ��¹") || ($Str=="�ѹ��") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 9;
				elseif (($Str=="���Ҥ�") || ($Str=="����") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 10;
				elseif (($Str=="��Ȩԡ�¹") || ($Str=="��Ȩԡ�") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 11;
				elseif (($Str=="�ѹ�Ҥ�") || ($Str=="�ѹ��") || ($Str=="�.�") || ($Str=="�.�."))
					$Month = 12;
				else
					$Month = $Str;
		}

		function en_month($Month)
		{
				switch ($Month)
				{
						case 1:	 $Month = "January"; 		break;
						case 2:	 $Month = "February"; 		break;
						case 3:	 $Month = "March"; 			break;
						case 4:	 $Month = "April"; 				break;
						case 5:	 $Month = "May"; 				break;
						case 6:	 $Month = "June"; 			break;
						case 7:	 $Month = "July"; 				break;
						case 8:	 $Month = "August"; 			break;
						case 9:	 $Month = "September"; break;
						case 10: $Month = "October"; 		break;
						case 11: $Month = "November"; 	break;
						case 12: $Month = "December"; 	break;
						default: $Month = $Month;
				}
				return $Month;
		}

		function DateDiff($strDate1,$strDate2)
		{
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
				//  echo "Date Diff = ".DateDiff("2008-08-01","2008-08-31")."<br>";
		}
		function TimeDiff($strTime1,$strTime2)
		{
				// return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
				return (strtotime($strTime2) - strtotime($strTime1))/   1 ; // 1 Hour =  60*60
				// echo "Time Diff = ".TimeDiff("00:00","19:00")."<br>";
		}
		function DateTimeDiff($strDateTime1,$strDateTime2)
		{
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
				// echo "Date Time Diff = ".DateTimeDiff("2008-08-01 00:00","2008-08-01 19:00")."<br>";
		}


?>