<?php
	header("Content-Type:text/html;charset=utf-8");
	include "conn.inc.php";

	//以更新时间排序
	$sql = "select * from user order by utime desc";

	$result = mysql_query($sql);
	
	echo '<h1>用户会话列表</h1>';
	echo '<table border="1" width="80%">';
	echo '<tr>';
	echo '<td>头像</td><td>名称</td><td>地址</td><td>发送时间</td><td>操作</td>';
	echo '</tr>';
	while($user = mysql_fetch_assoc($result)){
		//如果没有回复的消息记录就显示绿色，如果有查看的就没有颜色
		if($user['message'] == 0){
			$bg = "";
		} else {
			$bg = "green";
		}
		echo '<tr bgcolor="' . $bg .'">';
		echo '<td><img src="' . $user['headimgurl'] . '" width="60"></td>';
		echo '<td>' . $user['nickname'] . '</td>';
		echo '<td>' . $user['province'] . "-" . $user['city'] . '</td>';
		echo '<td>' . date("Y-m-d H:i:s", $user['utime']) . '</td>';
		echo '<td><a href="message.php?openid=' . $user['openid'] . '">查看</a></td>';
		echo '</tr>';
	}
	echo '</table>';
?>
