<?PHP
//require '../../configure.php';
	if (isset($_GET['h1'])) {
		$qID = $_GET['h1'];
	} else {
		$qID = 1;
	}
	$question = 'Question not set';
	$answerA = 'unchecked';
	$answerB = 'unchecked';
	$answerC = 'unchecked';
	$A = "";
	$B = "";
	$C = "";
	$database = "survey";

	$db_found = new mysqli("localhost", "phpmyadmin", "accioubuntu", "anu" );
	if ($db_found) {
		$stmt = $db_found->prepare("SELECT ID, Question, OptionA, OptionB, OptionC FROM tblsurvey WHERE ID = ?");
		if ($stmt) {
			$stmt->bind_param('i', $qID);
			$stmt->execute();
			$res = $stmt->get_result();
			if ($res->num_rows > 0) {
				$row = $res->fetch_assoc();
				$qID = $row['ID'];
				$question = $row['Question'];
				$A = $row['OptionA'];
				$B = $row['OptionB'];
				$C = $row['OptionC'];
			}
			else {
				print "Error - No rows";
			}
		}
		else {
			print "Error - DB ERROR";
		}
	}
	else {
		print "Error getting Survey";
	}
?>
