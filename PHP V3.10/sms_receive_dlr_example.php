<?
/*
.---------------------------------------------------------------------------.
|  Software: 	HTTP API - Receive DLR with Automatic DLR Forwarding		|
|  Version: 	3.1	                                                        |
|  Email: 		sales@solutions4mobiles.com		 							|
|  Info: 			http://www.solutions4mobiles.com						|
|  Phone:			+44 203 318 3618	                                	|
| ------------------------------------------------------------------------- |
| Copyright (c) 1999-2014, Mobiweb Ltd. All Rights Reserved.                |
| ------------------------------------------------------------------------- |
| LICENSE: 																	|
| Distributed under the General Public License v3 (GPLv3)					|
| http://www.gnu.org/licenses/gpl-3.0.html              			        |
| This program is distributed AS IS and in the hope that it will be useful 	|
| WITHOUT ANY WARRANTY; without even the implied warranty of 				|
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                      |
| ------------------------------------------------------------------------- |
| SERVICES:																	|
| We offer a number of paid services at http//www.solutions4mobiles.com:    |
| - Bulk SMS / MMS / Premium SMS Services	/ HLR Lookup Service			|
'---------------------------------------------------------------------------'

/**
* Receive DLR with Automatic DLR Forwarding
* @copyright 1999 - 2014 Mobiweb Ltd.
*/

/**
 * IMPORTANT: It is required that you store SMS data when submitting SMS as well as the unique id returned in the response of your SMS submission.
 */

//Receive DLR Data.

$id=$_GET['id'];
$status=$_GET['status'];
$phone=$_GET['phone'];
$operatorid=$_GET['operatorid'];
$cost=$_GET['cost'];
$date=$_GET['date'];

//Check if all data was received and return error if any data is missing.

if($id=='' || !$status=='' || !$phone=='' || !$operatorid=='' || !$cost=='' || !$date==''){
	header('HTTP/1.1 400 Bad Request', true, 400);die();
}

/**
 * IMPORTANT: Cross check data received from Automatic DLR Forwarding with the data you stored at SMS submission.
 */
/*Check DLR data with message data in your storage. If the unique id has no maching record in the storage
discard DLR data. If the re is a match, update record of message with the DLR data. Store data to persistent storage.
in this example we use PDO connector to a mysql database. In order for this example to work:
i.	$pdo should be the PDO database connector.
ii.	Messages should be stored to database table named sms_messages
iii.	sms_messages should have the following structure:
id				int		autoincrement
u_id			int
sender			varchar
phone			bigint
message			text
sent_date		datetime
status			tinyint
operatorid		int
cost			decimal
status_date		datetime	*/


/*Check if DLR data match with a message sent*/
$stmt=$pdo->prepare('SELECT HIGH_PRIORITY * FROM sms_messages WHERE u_id=? and phone=?');
$stmt->execute(array($id,$phone));

if($stmt->rowCount()>0){
	
	/*If YES update the matching record with the DLR data*/
	$row=$stmt->fetch();
	$stmt=$pdo->prepare('UPDATE sms_messages SET status=?,phone=?,operatorid=?,status_date=?,cost=? WHERE id=?');
	if(!$stmt->execute(array($status,$phone,$operatorid,$date,$cost,$row['id']))){
		
		/*If update failed, return error*/
		header('HTTP/1.1 400 Bad Request', true, 400);die();
	}else{
		/*If update was successfull, return ok*/
		header('HTTP/1.1 200 OK', true, 200);die();
	}
}else{
	/*If NO matching record for DLR data was found, return error*/
	header('HTTP/1.1 400 Bad Request', true, 400);die();
}

/**
* IMPORTANT: Cross check data received from Automatic DLR Forwarding with the data you stored at SMS submission.
*/
?>