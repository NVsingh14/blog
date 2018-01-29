<?php 
session_start();
error_reporting(0);
include("config-cms.php");
include("../library/class.imageresizer.php");

$REQDataRaw = file_get_contents("php://input");
$REQData = json_decode($REQDataRaw);
//$REQ = $REQData->call;

$type =  trustme($REQData->type);
$type;

switch($type)
{
         case "saveData":
            saveData();
        break;

        case "list_data":
        	list_data();
        	break;
		
}

function saveData()
{
	global $dCON, $REQData;

	$firstname = trim($REQData->name);
	$lastname = trim($REQData->lastname);
	$email = trim($REQData->lastname);
	$mobile = trim($REQData->mobile);
	$address = trim($REQData->address);
	$password = md5(trim($REQData->password));
	$user_id = intval($REQData->user_id);

	if(intval($user_id) == intval(0) )
	{
	$SQL = "";
	$SQL .= "INSERT INTO " .USER_TBL. " SET ";
	$SQL .= " firstname = :firstname, ";
	$SQL .= " lastname = :lastname, ";
	$SQL .= " email=:email, ";
	$SQL .=" mobile_number = :mobile, ";
	$SQL .= " address=:address, ";
	$SQL .= " password=:password ";

	$stmt = $dCON->prepare($SQL);
	$stmt->bindParam(":firstname", $firstname); 
	$stmt->bindParam(":lastname",$lastname);
	$stmt->bindParam(":email",$email);
	$stmt->bindParam(":mobile",$mobile);
	$stmt->bindParam(":address",$address);
	$stmt->bindParam(":password",$password);
	$rs = $stmt->execute();
	$stmt->closeCursor();
	}
	else if(intval($user_id)>intval(0))
	{
		$SQL ="";
		$SQL .= "UPDATE " . USER_TBL . " SET ";
		$SQL .= " firstname = :firstname, ";
		$SQL .= " lastname = :lastname, ";
		$SQL .= " email=:email, ";
		$SQL .=" mobile_number = :mobile, ";
		$SQL .= " address=:address, ";
		$SQL .= " password=:password ";
		$SQL .= " WHERE user_id=:user_id ";

		$stmt = $dCON->prepare($SQL);
		$stmt->bindParam(":firstname", $firstname); 
		$stmt->bindParam(":lastname",$lastname);
		$stmt->bindParam(":email",$email);
		$stmt->bindParam(":mobile",$mobile);
		$stmt->bindParam(":address",$address);
		$stmt->bindParam(":password",$password);
		$stmt->bindParam(":user_id",$user_id);

		$rs = $stmt->execute();
		$stmt->closeCursor();
	}
	else
	{
		$rs = 2;
	}

	$RETURN_ARRAY = array();
			 switch($rs)
			{
				case "1":
						$RETURN_ARRAY['SUCCESS'] = 1;
						$RETURN_ARRAY['MSG'] = "&#x2714; Successfully saved.";
						
						break;
				case "2":
						
						$RETURN_ARRAY['SUCCESS'] = 2;
						$RETURN_ARRAY['MSG'] = "&#x2757; Already Exists.";
						break; 
				default:
						$RETURN_ARRAY['SUCCESS'] = 0;
						$RETURN_ARRAY['MSG'] = "&#x2718; Sorry cannot process your request.";
						break;
			}

	echo json_encode($RETURN_ARRAY);
}

function list_data()
{
	global $dCON,$REQData;

	$page = intval($REQData->page) == 0 ? 1 : $REQData->page;

	$SQL = "";
	$SQL .= " SELECT U.* ";
	$SQL .= " FROM " . USER_TBL . " AS U WHERE U.status <> 2 ";
	$SQL .= " $search ";
    $SQL .= " ORDER BY U.user_id DESC ";
    //echo $SQL;
    
    $SQL_COUNT  = "";
    $SQL_COUNT .= " SELECT COUNT(*) AS CT FROM ( ";
        $SQL_COUNT .= $SQL;
    $SQL_COUNT .= " ) as aa ";
    
    
    $stmtCnt =  $dCON->prepare($SQL_COUNT);
    $stmtCnt->execute($searchArr);
    $noOfRecords_row = $stmtCnt->fetchObject();
    $stmtCnt->closeCursor();
    $noOfRecords = intval($noOfRecords_row->CT);
    
    $rowsPerPage = 25;

    $page = intval($page) - 1;
    $offset = $rowsPerPage * $page ;

    $SQL .= " LIMIT " . $offset . "," . $rowsPerPage;

    $stmt = $dCON->prepare($SQL);
    $stmt->execute($searchArr);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    
    $RETURN_ARRAY['data'] = $row;
    $RETURN_ARRAY['total_records'] = $noOfRecords;
    
    echo json_encode($RETURN_ARRAY);
}


?>
