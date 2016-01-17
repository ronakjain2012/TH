<?php

	include '_config.php';

	$con = connect();

	$q = strtolower($_REQUEST['q']);

	$sql = "SELECT * FROM routes WHERE source LIKE '{$q}%' GROUP BY source";
	$arr;

	$res = $con->query($sql);
	if ($res->num_rows > 0) {
		while ($row = $res->fetch_assoc()) {
			$arr[] = $row['source'];
		}
	}

	$list = "";

	if (!empty($q) && !empty($arr)) {
		foreach ($arr as $name) {
			if ($list === "") {
	            $list = "<option value='$name'>$name</option>";
	        } else {
	            $list .= "<option value='$name'>$name</option>";
	        }
		}
	}

	echo $list === "" ? "no suggestion" : $list;

?>