<html>
<head>
<meta charset="UTF-8">
</head>
<body style="background-color:#FFEEFF;">
	<div class="parentPetal petalTrans"> <!-- 移動アニメーション用-->
	<div class="petal petalRotate"> <!-- 回転アニメーション用 -->
	  <div class="petalBase petalLeft"></div> <!-- 花びら半分A -->
	  <div class="petalBase petalRight"></div> <!-- 花びら半分B -->
	</div>
	</div>
	<h1>KAKEIBOへようこそ</h1>
	<h2><p>KAKEIBOは月間、年間の収支がグラフに表示されて経費管理が楽々に！</p><p>さらに画像アップロード機能でレシートも管理できる！</p></h2>


	<?php
		//DB接続
			$dsn='データベース名';
			$user='ユーザー名';
			$password='パスワード';
			$pdo=new PDO($dsn,$user,$password);

	?>

	//	エラー表示
	<?php
		session_start();
		echo $_SESSION['error'];
		unset($_SESSION['error'] );
	?>

	//入力画面作成
	<div class="form-inch">
		<center><div class="form-style-3">
			<form action="mission_6-1_loginkakunin.php" method="post" enctype="multipart/form-data">
				<fieldset><legend>ユーザー情報</legend>
					<label for="field1"><span>ユーザー名 <span class="required">*</span></span><input type="text" name="name" size="35" maxlength="255" placeholder="ユーザー名"></label>
					<label for="field2"><span>パスワード<span class="required">*</span></span><input type="password" name="pass" size="35" maxlength="25" placeholder="パスワード"></label>
					<label><span>&nbsp;</span><input type="submit" value="送信"></label>
				</fieldset>
			</form>
			<a href="mission_6-1_login.php">ログインはこちら</a>
		</div></center>
	</div>	

	//css記入
	<style type="text/css">
	h1,h2{
		text-align:center;
		color:#FF00FF;
	}
	h1{

		padding-top:100px;
	}

	.form-style-3{
		text-align:center;
	    max-width: 450px;
	    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	}
	.form-style-3 label{
	    display:block;
	    margin-bottom: 10px;
	}
	.form-style-3 label > span{
	    float: left;
	    width: 100px;
	    color: #F072A9;
	    font-weight: bold;
	    font-size: 13px;
	    text-shadow: 1px 1px 1px #fff;
	}
	.form-style-3 fieldset{
	    border-radius: 10px;
	    -webkit-border-radius: 10px;
	    -moz-border-radius: 10px;
	    margin: 0px 0px 10px 0px;
	    border: 1px solid #FFD2D2;
	    padding: 20px;
	    background: #FFF4F4;
	    box-shadow: inset 0px 0px 15px #FFE5E5;
	    -moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	    -webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
	}
	.form-style-3 fieldset legend{
	    color: #FFA0C9;
	    border-top: 1px solid #FFD2D2;
	    border-left: 1px solid #FFD2D2;
	    border-right: 1px solid #FFD2D2;
	    border-radius: 5px 5px 0px 0px;
	    -webkit-border-radius: 5px 5px 0px 0px;
	    -moz-border-radius: 5px 5px 0px 0px;
	    background: #FFF4F4;
	    padding: 0px 8px 3px 8px;
	    box-shadow: -0px -1px 2px #F1F1F1;
	    -moz-box-shadow:-0px -1px 2px #F1F1F1;
	    -webkit-box-shadow:-0px -1px 2px #F1F1F1;
	    font-weight: normal;
	    font-size: 12px;
	}
	.form-style-3 textarea{
	    width:250px;
	    height:100px;
	}
	.form-style-3 input[type=text],
	.form-style-3 input[type=password],
	.form-style-3 input[type=date],
	.form-style-3 input[type=datetime],
	.form-style-3 input[type=number],
	.form-style-3 input[type=search],
	.form-style-3 input[type=time],
	.form-style-3 input[type=url],
	.form-style-3 input[type=email],{
	    border-radius: 3px;
	    -webkit-border-radius: 3px;
	    -moz-border-radius: 3px;
	    border: 1px solid #FFC2DC;
	    outline: none;
	    color: #F072A9;
	    padding: 5px 8px 5px 8px;
	    box-shadow: inset 1px 1px 4px #FFD5E7;
	    -moz-box-shadow: inset 1px 1px 4px #FFD5E7;
	    -webkit-box-shadow: inset 1px 1px 4px #FFD5E7;
	    background: #FFEFF6;
	    width:50%;
	}
	.form-style-3  input[type=submit],
	.form-style-3  input[type=button]{
		float:right;
	    background: #EB3B88;
	    border: 1px solid #C94A81;
	    padding: 5px 15px 5px 15px;
	    color: #FFCBE2;
	    box-shadow: inset -1px -1px 3px #FF62A7;
	    -moz-box-shadow: inset -1px -1px 3px #FF62A7;
	    -webkit-box-shadow: inset -1px -1px 3px #FF62A7;
	    border-radius: 3px;
	    border-radius: 3px;
	    -webkit-border-radius: 3px;
	    -moz-border-radius: 3px;    
	    font-weight: bold;
	}
	.required{
	    color:red;
	    font-weight:normal;
	}
	/* 花びら(parent) */
	.petal {
	 width: 15px;
	 height: 10px;
	}

	/* 花びらの半分基礎 */
	.petalBase {
	 border-radius: 6px 0px 0px 0px;
	 position: absolute;
	 top: 0px;
	 left: 3px;
	 width: 9px;
	 height: 6px;
	}

	/* 花びらの左半分になるところ */
	.petalLeft {
	 background: -webkit-gradient(
	   linear, left top, right bottom,
	   from(rgba(224, 176, 192, 1)),
	   to(rgba(255, 240, 240, 1))
	 );
	 -webkit-transform: skew(-30deg) scale(1.2, 1) rotate(12deg);
	}

	/* 花びらの右半分になるところ */
	.petalRight {
	 top: 4px;
	 background: -webkit-gradient(
	   linear, left bottom, right top,
	   from(rgba(224, 176, 192, 1)),
	   to(rgba(255, 240, 240, 1))
	 );
	 -webkit-transform: skew(30deg) scale(1.2, -1) rotate(12deg);
	}

	/* 花びら回転 */
	.petalRotate {
	 -webkit-animation-iteration-count: infinite;
	 -webkit-animation-timing-function: linear;
	 -webkit-animation-duration: 1s;
	 -webkit-animation-name: rotateX;
	}

	@-webkit-keyframes rotateX {
	    0% {-webkit-transform: rotate(-58deg) rotateX(0deg);}
	  100% {-webkit-transform: rotate(-58deg) rotateX(360deg);}
	}

	/* 花びら移動 */
	.animationArea {
	 position: relative;
	 overflow: hidden;
	 width: 100%;
	 height: 100%;

	}

	/* 移動アニメ適用div */
	.parentPetal {
	 position: absolute;
	}

	/* 花びら落下 */
	.petalTrans {
	 -webkit-animation-iteration-count: infinite;
	 -webkit-animation-timing-function: linear;
	 -webkit-animation-duration: 10s;
	 -webkit-animation-name: transPetal;
	}

	@-webkit-keyframes transPetal {
	    0% {top: -5%; left: 90%;}
	    5% {top: -5%; left: 90%;}
	   95% {top: 105%; left: 10%;}
	  100% {top: 105%; left: 10%;}
	}
	</style>


	<div class="animationArea">
	 <div class="parentPetal petalTrans">
	   <div class="petal petalRotate">
	     <div class="petalBase petalLeft"></div>
	     <div class="petalBase petalRight"></div>
	   </div>
	 </div>
	</div>
	</style>
</body>
</html>