<?php

	$str ='{"success":1,"data":{"loginq_array":[{"id":"13","servername":"\u6012\u97ad\u7763\u90ae(\u65b0)","remaincount":"\u7a7a\u95f2"}],"server_array":[{"id":"13","servername":"\u6012\u97ad\u7763\u90ae(\u65b0)","remaincount":"\u7a7a\u95f2"},{"id":"12","servername":"\u767d\u8679\u8d2f\u65e5","remaincount":"\u7a7a\u95f2"},{"id":"11","servername":"\u660e\u660e\u5982\u6708","remaincount":"\u7a7a\u95f2"},{"id":"10","servername":"\u661f\u6c49\u707f\u70c2","remaincount":"\u7a7a\u95f2"},{"id":"9","servername":"\u65e5\u6708\u4e4b\u884c","remaincount":"\u7a7a\u95f2"},{"id":"8","servername":"\u4ee5\u89c2\u6ca7\u6d77","remaincount":"\u7a7a\u95f2"}]},"message":"\u6210\u529f"}
';
	$arr = json_decode($str,true);
	$server_array = $arr['data']['server_array'];
	foreach ($server_array as $key => $value) {
		$loginurl="http://www.quegame.com/4game/siteplay.php?id=".$value['id'];
		$server_array[$key]['url'] = $loginurl;
	}
	var_dump($arr['data']['loginq_array']);
?>