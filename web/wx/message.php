<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'conn.inc.php';
	include 'ufun.inc.php';
	$openid = $_GET['openid'];
	
	//如果用户提交了
	if(isset($_POST['dosubmit'])){
		//发送给客户
		sendText($openid, $_POST['text']);
		//存入数据库
		insertmessage($openid, $_POST['text'], 1, "text");
	}

	
	$sql = "update user set message = '0' where openid = '{$openid}'";
	mysql_query($sql);

	$user = getUserInfo($openid);
	//查询所有这个用户和公众号对话的消息
	$sql = "select * from message where openid = '{$openid}'";

	$result = mysql_query($sql);

	echo "<table border='1' width='600'>";
	while($mess = mysql_fetch_assoc($result)){
		echo '<tr>';
		if($mess['who'] == 0){
			echo '<td align="left"><img width="60" src="' . $user['headimgurl'] . '">' . $user['nickname'] . '<br>' . $mess['mess'] . '</td>';
		} else {
			echo '<td align="right">' . $mess['mess'] . '：【公众号】</td>';
		}
		echo '</tr>';
	}
	echo "</table>";
?>
<form action="message.php?openid=<?php echo $openid ?>" method="post">
	<textarea name="text" rows="6" cols="40"></textarea><br/>
	<input type="submit" name="dosubmit" value="回复"><br/>

</form>
<br/>

<a href="userinfo.php">返回用户列表</a>
