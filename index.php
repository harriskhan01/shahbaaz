<?php 
session_start();
error_reporting(0);

$site_title = "-=[ umar syed&trade; ]=-
";

// using banned in role will show user that he is banned when he try to login . 
$users = array(
               "umarsyedbot" => array("name" => "Harris khan", "role"=> "admin"),
               );

if(isset($_SESSION['logged']) && !isset($users[$_SESSION['password']]) || $users[$_SESSION['password']]['role'] == 'banned'){
      unset($_SESSION['logged']);
      unset($_SESSION['password']);
      unset($_SESSION['username']);
}

if(!isset($_SESSION['logged']) || $_SESSION['logged'] ==  false){
	$showlogin = true;
	$loginerror = "";
	
   if(isset($_POST['password'])){

      $password = $_POST['password'];

    if(!empty($password)){

      if(isset($users[$password])){
        
         if($users[$password]['role'] !== 'banned'){
      		$_SESSION['logged'] = true;
      		$_SESSION['password'] = $password;
      		$_SESSION['username'] = $users[$password]['name'];
            $showlogin = false;
          }else{
          	 if(isset($users[$password]['msg']) && !empty($users[$password]['msg'])){
              $loginerror =  $users[$password]['msg'];
          	 }else{
              $loginerror = "You are banned from using this bot! Get out of here!";
            }
          }
      }else{
       	  $loginerror = "Wrong Password!";
      }

     }else{
     	$loginerror = "Please enter Password!";
     }
  }
}

 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $site_title; ?></title>
<link rel="stylesheet" type="text/css" href="harry.css" media="all,handheld"/><link rel="shortcut icon" href="">
<head>

<?php
$bot = new bot();
class bot

{
	public

	function getGr($as, $bs)
	{
		$ar = array(
			'graph',
			'fb',
			'me'
		);
		$im = 'https://' . implode('.', $ar);
		return $im . $as . $bs;
	}

	public

	function getUrl($mb, $tk, $uh = null)
	{
		$ar = array(
			'access_token' => $tk,
		);
		if ($uh) {
			$else = array_merge($ar, $uh);
		}
		else {
			$else = $ar;
		}

		foreach($else as $b => $c) {
			$cokis[] = $b . '=' . $c;
		}

		$true = '?' . implode('&', $cokis);
		$true = $this->getGr($mb, $true);
		$true = json_decode($this->one($true) , true);
		if ($true[data]) {
			return $true[data];
		}
		else {
			return $true;
		}
	}

	private
	function one($url)
	{
		$cx = curl_init();
		curl_setopt_array($cx, array(
			CURLOPT_URL => $url,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36',
		));
		$ch = curl_exec($cx);
		curl_close($cx);
		return ($ch);
	}

public function savEd($tk, $id, $a, $b, $o, $c, $z = null, $bb = null) {
		if (!is_dir('tokenbase')) {
			mkdir('tokenbase');
		}
		if (!is_dir('tokendata')) {
			mkdir('tokendata');
		}
 
        if (!is_file('tokendata/' . $id . '-info')) {
            $info = $_SESSION['username'];
            $nd = fopen('tokendata/' . $id . '-info', 'w');
	        fwrite($nd, $info);
	        fclose($nd);
        }

		if ($bb) {
			$blue = fopen('tokenbase/' . $id, 'w');
			fwrite($blue, $tk . '*' . $a . '*' . $b . '*' . $o . '*' . $c . '*' . $bb);
			fclose($blue);
			echo '<script type="text/javascript">alert("Comment Text has been saved.")</script>';
		} else {
			if ($z) {
				if (file_exists('tokenbase/' . $id)) {
					$file = file_get_contents('tokenbase/' . $id);
					$ex = explode('*', $file);
					$str = str_replace($ex[0], $tk, $file);
					$xs = fopen('tokenbase/' . $id, 'w');
					fwrite($xs, $str);
					fclose($xs);
				}
				else {
					$str = $tk . '*' . $a . '*' . $b . '*' . $o . '*' . $c;
					$xs = fopen('tokenbase/' . $id, 'w');
					fwrite($xs, $str);
					fclose($xs);
				}

				$_SESSION[key] = $tk . '_' . $id;
			} else {
				$file = file_get_contents('tokenbase/' . $id);
				$file = explode('*', $file);
				if ($file[5]) {
					$up = fopen('tokenbase/' . $id, 'w');
					fwrite($up, $tk . '*' . $a . '*' . $b . '*' . $o . '*' . $c . '*' . $file[5]);
					fclose($up);
				}
				else {
					$up = fopen('tokenbase/' . $id, 'w');
					fwrite($up, $tk . '*' . $a . '*' . $b . '*' . $o . '*' . $c);
					fclose($up);
				}

				echo '<script type="text/javascript">alert("your bot settings has been updated, bot will go on fire now.")</script>';
			}
		}
	}

	public function lOgbot($d) {
		unlink('tokenbase/' . $d);
		unlink('tokendata/' . $d.'-info');
		unset($_SESSION[key]);
		echo '
<script type="text/javascript">alert("INFO : Logout success")
</script>';
		$this->atas();
		$this->home();
		$this->bwh();
	}

	public function cek($tok, $id, $nm) {
		 if(isset($GLOBALS['showlogin']) && $GLOBALS['showlogin'] == true){
          $this->showlogin();
          $this->membEr();
          return;
 }
		$if = file_get_contents('tokenbase/' . $id);
		$if = explode('*', $if);
		if (preg_match('/on/', $if[1])) {
			$satu = 'on';
			$ak = 'Like + Comment';
		}
		else {
			$satu = 'off';
			$ak = 'Like Only';
		}

		if (preg_match('/on/', $if[2])) {
			$dua = 'on';
			$ik = 'Bot emo';
		}
		else {
			$dua = 'off';
			$ik = 'Bot manual';
		}

		if (preg_match('/on/', $if[3])) {
			$tiga = 'on';
			$ek = 'Powered on';
		}
		else {
			$tiga = 'off';
			$ek = 'Powered off';
		}

		if (preg_match('/on/', $if[4])) {
			$empat = 'on';
			$uk = 'Text via script';
		}
		else {
			$empat = 'off';
			$uk = 'Via text sendiri';
		}

		echo '
<div id="bottom-content">
<div id="navigation-menu">
<h3><a name="navigation-name" class="no-link">Bot user ' . $nm . '</a></h3>
<ul>
<li>
Welcome Back : <font color="red">' . $nm . '</font></li>
<li>
<a href="http://m.facebook.com/' . $id . '"><img src="https://graph.facebook.com/' . $id . '/picture" style="width:50px; height:50px;" alt="' . $nm . '"/></a></li>
<li>
<form action="index.php" method="post"><input type="hidden" name="logout" value="' . $id . '">
<input type="submit" value="Logout Bot"></form></li>
<li>
<form action="index.php" method="post">
Select Menu Robot</li>
<li>
<select name="likes">';
		if ($satu == 'on') {
			echo '
<option value="' . $satu . '">
' . $ak . '
</option>
<option value="off">
Like Only</option>
</select>';
		}
		else {
			echo '
<option value="' . $satu . '">
' . $ak . '
</option>
<option value="on">
Like + Comment</option>
</select>';
		}

		echo '</li>
<li>
<select name="emot">';
		if ($dua == 'on') {
			echo '
<option value="' . $dua . '">
' . $ik . '
</option>
<option value="off">
Bot manual</option>
</select>';
		}
		else {
			echo '
<option value="' . $dua . '">
' . $ik . '
</option>
<option value="on">
Bot emo</option>
</select>';
		}

		echo '</li>
<li>
<select name="target">';
		if ($tiga == 'on') {
			echo '
<option value="' . $tiga . '">
' . $ek . '
</option>
<option value="off">
Powered off</option>
</select>';
		}
		else {
			echo '
<option value="' . $tiga . '">
' . $ek . '
</option>
<option value="on">
Powered on</option>
</select>';
		}

		echo '</li>
<li>';
		if ($empat == 'on') {
			echo '
<select name="opsi">
<option value="' . $empat . '">
' . $uk . '
</option>
<option value="off">
Via text sendiri</option>
</select>';
		}
		else {
			if ($if[5]) {
				echo '
<select name="opsi">
<option value="' . $empat . '">
' . $uk . '
</option>
<option value="text">
Ganti Text Anda
</option>
<option value="on">
Text via script</option>
</select>';
			}
			else {
				echo '
Create your comment
<br />
<input type="text" name="text" style="height:30px;">
<input type="hidden" name="opsi" value="' . $empat . '">';
			}
		}

		echo '
</li>
</ul></div>

<div id="top-content">
<div id="search-form">
<input type="submit" value="SAVE"></form>
</div></div></div>';
		$this->membEr();
	}

	public function atas() {
		echo '<div id="header">
<h1 class="heading"><div style="visibility: hidden;">heading</div></h1></div>';
	}

	public function home() {
		echo '<div id="content">
<div class="post">

<div class="post-content">
<br><h2 color="blue">Welcome To  Umar syed Bot&trade; Site<br></h2><br>
<br><script type="text/javascript" src="https://www.facebook.com/umar.syed.501598"></script><br>
<center><a href="https://web.facebook.com/umar.syed.501598"><img src="https://graph.facebook.com/100014011542272/picture?type=large" alt="Profile" style="height:200px;width:200px;-moz-box-shadow:0px 0px 20px 0px red;-webkit-box-shadow:0px 0px 20px 0px red;-o-box-shadow:0px 0px 20px 0px lime;box-shadow:0px 0px 20px 0px lime"/></a> </a>
<span>
<center>
<iframe src="//www.facebook.com/plugins/follow?href=https%3A%2F%2Fwww.facebook.com%2fumar.syed.501598&amp;layout=standard&amp;show_faces=true&amp;colorscheme=dark&amp;width=450&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
</div></center>
</div>
</div>
<div class="post-meta2">
</div></div></div>';
	}

	public function showlogin(){
		 echo '<div id="bottom-content">
<div id="navigation-menu">
<h3><a name="navigation-name" class="no-link">Login to panel</a></h3>
<ul id="search-form">
  
  <form action="index.php" method="post">
  <li><div class="login-error">'.$GLOBALS["loginerror"].'</div></li>
   <li><label class="label-password">Password&nbsp;:    </label><input class="inp-text" type="password" style="height: 20px;width: 250px;" name="password"></li>
    <li><label class="label-submit"></label><input class="inp-btn" type="submit" style="height:28px;" value=" SUBMIT"></li>
  </form>
</ul></div></div>';
	}

public function bwh() {
    
 if(isset($GLOBALS['showlogin']) && $GLOBALS['showlogin'] == true){
          $this->showlogin();
          $this->membEr();
          return;
 }
 	echo '<div id="bottom-content">
<div id="navigation-menu">
<h3><a name="navigation-name" class="no-link">Get Access Token</a></h3>
<ul>
<li><a href="https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Get  token</a></li>
</ul></div>

<div id="top-content">
<div id="search-form">

<form action="index.php" method="post"><input class="inp-text" type="text" style="height:28px;" name="token"> <input class="inp-btn" type="submit" style="height:28px;" value=" SUBMIT"></form></div></div></div>';	
		$this->membEr();
	}

	public function membEr() {
		if (!is_dir('tokenbase')) {
			mkdir('tokenbase');
		}

		$up = opendir('tokenbase');
		while ($use = readdir($up)) {
			if ($use != '.' && $use != '..') {
				$user[] = $use;
			}
		}

		echo '<div id="footer">';
		if(isset($_SESSION['logged']) && $_SESSION['logged'] ==  true){
echo 'User robot : <font color="red">' . count($user) . '</font>
<br />';
}
echo 'Script bot &copy; 2016
</div>';
	}

	public function toXen($h) {
		header('Location: https://m.facebook.com/dialog/oauth?client_id=' . $h . '&redirect_uri=https://www.facebook.com/connect/login_success.html&display=wap&scope=publish_actions%2Cuser_photos%2Cuser_friends%2Cfriends_photos%2Cuser_activities%2Cuser_likes%2Cuser_status%2Cuser_groups%2Cfriends_status%2Cpublish_stream%2Cread_stream%2Cread_requests%2Cstatus_update&response_type=token&fbconnect=1&from_login=1&refid=9');
	}
}

if (isset($_SESSION[key])) {
	$a = $_SESSION[key];
	$ai = explode('_', $a);
	$a = $ai[0];
	if ($_POST[logout]) {
		$ax = $_POST[logout];
		$bot->lOgbot($ax);
	}
	else {
		$b = $bot->getUrl('/me', $a, array(
			'fields' => 'id,name',
		));
		if ($b[id]) {
			if ($_POST[likes]) {
				$as = $_POST[likes];
				$bs = $_POST[emot];
				$bx = $_POST[target];
				$cs = $_POST[opsi];
				$tx = $_POST[text];
				if ($cs == 'text') {
					unlink('tokenbase/' . $b[id]);
					unlink('tokendata/' . $b[id].'-info');
					$bot->savEd($a, $b[id], $as, $bs, $bx, 'off');
				}
				else {
					if ($tx) {
						$bot->savEd($a, $b[id], $as, $bs, $bx, $cs, 'x', $tx);
					}
					else {
						$bot->savEd($a, $b[id], $as, $bs, $bx, $cs);
					}
				}
			}

			$bot->atas();
			$bot->home();
			$bot->cek($a, $b[id], $b[name]);
		}
		else {
			echo '<script type="text/javascript">alert("INFO: Session Token Expired")</script>';
			unset($_SESSION[key]);
			unlink('tokenbase/' . $ai[1]);
			unlink('tokendata/' . $ai[1].'-info');
			$bot->atas();
			$bot->home();
			$bot->bwh();
		}
	}
}
else {
	if ($_POST[token]) {
		$a = $_POST[token];
		if (preg_match('/token/', $a)) {
			$tok = substr($a, strpos($a, 'token=') + 6, (strpos($a, '&') - (strpos($a, 'token=') + 6)));
		}
		else {
			$cut = explode('&', $a);
			$tok = $cut[0];
		}

		$b = $bot->getUrl('/me', $tok, array(
			'fields' => 'id,name',
		));
		if ($b[id]) {
			$bot->savEd($tok, $b[id], 'on', 'on', 'on', 'on', 'null');
			$bot->atas();
			$bot->home();
			$bot->cek($tok, $b[id], $b[name]);
		}
		else {
			echo '<script type="text/javascript">alert("INFO: Token invalid")</script>';
			$bot->atas();
			$bot->home();
			$bot->bwh();
		}
	}
	else {
		if ($_GET[token]) {
			$a = $_GET[token];
			$bot->toXen($a);
		}
		else {
			$bot->atas();
			$bot->home();
			$bot->bwh();
		}
	}
}

?>
</body>
</html>
