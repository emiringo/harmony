<?php

//セッション利用の宣言
session_start();

//==================================================
// 初期値設定
//==================================================

//データ受け取り用
$name    = '';
$furigana     = '';
$yubin = '';
$todoufuken    = '';
$sityoson  = '';
$tatemono    = '';
$tel  = '';
$mail = '';

//エラーメッセージ用
$name_err    = "";
$furigana_err      = "";
$yubin_err = "";
$todoufuken_err    = "";
$sityoson_err  = "";
$tel_err      = "";
$mail_err      = "";

//エラーの有無
$errflg = 0;   //0:なし   1:あり

//POSTされたとき＆値を取得
if($_SERVER['REQUEST_METHOD']==="POST"){
	$name = htmlspecialchars($_POST["name"],ENT_QUOTES,"UTF-8");
	$furigana = htmlspecialchars($_POST["furigana"],ENT_QUOTES,"UTF-8");
	$yubin = htmlspecialchars($_POST["yubin"],ENT_QUOTES,"UTF-8");
	$todoufuken = htmlspecialchars($_POST["todoufuken"],ENT_QUOTES,"UTF-8");
	$sityoson = htmlspecialchars($_POST["sityoson"],ENT_QUOTES,"UTF-8");
	$tatemono = htmlspecialchars($_POST["tatemono"],ENT_QUOTES,"UTF-8");
	$tel = htmlspecialchars($_POST["tel"],ENT_QUOTES,"UTF-8");
	$mail = htmlspecialchars($_POST["mail"],ENT_QUOTES,"UTF-8");
}
	
//半角全角の変換
	$name = mb_convert_kana($name,"KV","UTF-8");
	$furigana = mb_convert_kana($furigana,"KV","UTF-8");
	
//---------------------------------------------
//	エラーチェック
//---------------------------------------------

	//名前（テキストボックス）
	if(mb_strlen($name) === 0){
		$name_err = '<p class="error">※名前を入力して下さい。</p>';
		$errflg = 1;
	}

	//名前フリガナ（テキストボックス）
	if(mb_strlen($furigana) === 0){
		$furigana_err = '<p class="error">※名前（フリガナ）を入力して下さい。</p>';
		$errflg = 1;
	}
	
	//郵便番号（テキストボックス）
	if(mb_strlen($yubin) === 0){
		$yubin_err = '<p class="error">※郵便番号を入力して下さい。</p>';
		$errflg = 1;
	}

	//都道府県（セレクトメニュー）
	if($todoufuken === 0){
		$todoufuken_err = '<p class="error">※都道府県を選択して下さい。</p>';
		$errflg = 1;
	}
	
		//市区町村と番地（テキストボックス）
	if(mb_strlen($sityoson) === 0){
		$sityoson_err = '<p class="error">※市区町村名を入力して下さい。</p>';
		$errflg = 1;
	}

	//電話番号（自宅もしくは携帯番号）（テキストボックス）
	if(mb_strlen($tel) === 0){
		$tel_err = '<p class="error">※電話番号（自宅 or 携帯番号）を入力して下さい。</p>';
		$errflg = 1;
	}
	
		//メールアドレス（テキストボックス）
	if(mb_strlen($mail) === 0){
		$mail_err = '<p class="error">※メールアドレスを入力してください。</p>';
		$errflg = 1;
	}

//---------------------------------------------
// エラーがない場合、確認画面に遷移する
//---------------------------------------------
	
	if($errflg === 0){
		//セッションにデータを保存
		$_SESSION["name"] = $name;
		$_SESSION["furigana"] = $furigana;
		$_SESSION["yubin"] = $yubin;
		$_SESSION["todoufuken"] = $todoufuken;
		$_SESSION["sityoson"] = $sityoson;
		$_SESSION["tel"] = $tel;
		$_SESSION["mail"] = $mail;
		//確認画面に遷移
		header("Location: kakunin.php");
		exit;
	}
	
//---------------------------------------------
// 入力したデータを修正したいとき
//---------------------------------------------

	if(isset($_GET["henkou"])){
		$name       = $_SESSION["name"];
		$furigana   = $_SESSION["furigana"];
		$yubin      = $_SESSION["yubin"];
		$todoufuken = $_SESSION["todoufuken"];
		$sityoson   = $_SESSION["sityoson"];
		$tatemono   = $_SESSION["tatemono"];
		$tel        = $_SESSION["tel"];
		$mail       = $_SESSION["mail"];
	
	}



?>


<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>新規会員登録｜中古ブランドショップHarmony</title>
		<meta name="robots" content="noindex">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="description" content="">
		<meta name="keywords" content="新規会員登録">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bg.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/touroku.css">
	</head>
	<body>
		<header>
			<h1><a href="index.php">Harmony</a></h1>
		</header>
		<div id="container" class="clearfix">
		<nav id="gnav">
			<ul>
				<li><a href="brand.php">ブランド別</a></li>
				<li><a href="item.php">アイテム別</a></li>
				<li><a href="kensaku.php">商品検索</a></li>
				<li><a href="login.php">ログイン</a></li>
				<li><a href="touroku.php">会員登録</a></li>
				<li><a href="cart.php">カート</a></li>
				<li><a href="from.php">お問い合わせ</a></li>
			</ul>
		</nav>
		
		<div class="breadnav">
			<ol class ="breadcrumb">
				<li><a href="index.php">HOME</a></li>
				<li>新規会員登録</li>
			</ol>	
		</div>
		
		<div id="rightkobetu" class="clearfix">
			<main>
				<h2>新規会員登録（無料）</h2>
					<p>会員登録は入会金、年会費など一切かかりません。<br>
					お買い物の際に必要になりますので、何とぞご了承ください。</p>
			<form method="post" action="kakunin.php">
				<table border="1">
					<tr>
						<th>名前<span class="hisu">必須</span></th>
							<td><input type="text" name="name" value="<?php echo $name; ?>" class="nagasa" autofocus><br><?php echo $name_err; ?></td>
					</tr>
					<tr>		
						<th>名前（フリガナ）<span class="hisu">必須</span></th>
							<td><input type="text" name="furigana" value="<?php echo $furigana; ?>" class="nagasa"><br><?php echo $furigana_err; ?></td>
					</tr>
					<tr>		
						<th>郵便番号<span class="hisu">必須</span></th>
							<td><input type="text" name="yubin" value="<?php echo $yubin; ?>" class="nagasa"><br><?php echo $yubin_err; ?></td>
					</tr>
					<tr>		
						<th>都道府県<span class="hisu">必須</span></th>
							<td>
								<select name="todoufuken" class="nagasa2">
									<option value="">選択して下さい</option>
									<option value="1"<?php if($todoufuken === "1"){ echo  ' selected'; } ?>>北海道</option>
									<option value="2"<?php if($todoufuken === "2"){ echo  ' selected'; } ?>>青森</option>
									<option value="3"<?php if($todoufuken === "3"){ echo  ' selected'; } ?>>東京都</option>
									<option value="4"<?php if($todoufuken === "4"){ echo  ' selected'; } ?>>神奈川県</option>
									<option value="5"<?php if($todoufuken === "5"){ echo  ' selected'; } ?>>沖縄県</option>
								</select>
							<br><?php echo $todoufuken_err; ?></td>
					</tr>
					<tr>		
						<th>市区町村と番地<span class="hisu">必須</span></th>
							<td><input type="text" name="sityoson" value="<?php echo $sityoson; ?>" class="nagasa"><br><?php echo $sityoson_err; ?></td>
					</tr>
					<tr>		
						<th>建物名</th>
							<td><input type="text" name="tatemono" value="<?php echo $tatemono; ?>" class="nagasa"></td>
					</tr>
					<tr>
						<th>電話番号<br>（自宅もしくは携帯番号）<span class="hisu">必須</span></th>
							<td><input type="text" name="tel" value="<?php echo $tel; ?>" class="nagasa"><br><?php echo $tel_err; ?></td>
					</tr>
					<tr>		
						<th>メールアドレス<span class="hisu">必須</span></th>
							<td><input type="text" name="mail" value="<?php echo $mail; ?>" class="nagasa"><br><?php echo $mail_err; ?></td>
					</tr>
				</table>
					<input type="submit" name="kakunin" value="入力内容を確認する">
			</main>
		</div><!-- rightkobetuの閉じ -->
		</div><!-- containerの閉じ -->


		<nav id="fnav" class="clearfix">
			<nav id="fnav0">
				<nav id="fnav1">
					<p>お買い物について</p>
						<ul>
							<li><a href="okaimono.html">お買い物ガイド</a></li>
							<li><a href="okaimono.html#guide2">会員登録について</a></li>
							<li><a href="okaimono.html#guide4">お支払い方法</a></li>
							<li><a href="okaimono.html#guide3">配送・お届け</a></li>
							<li><a href="okaimono.html#guide5">送料・手数料</a></li>
							<li><a href="okaimono.html#guide1">商品状態について</a></li>
							<li><a href="okaimono.html#guide6">返品・交換について</a></li>
						</ul>
				</nav><!-- fnav1の閉じ -->
		
				<nav id="fnav2" class="clearfix">
					<p>ブランド</p>
						<ul>
							<li><a href="kensaku.php?bno=1">CHANEL（シャネル）</a></li>
							<li><a href="kensaku.php?bno=2">GUCCI（グッチ）</a></li>
							<li><a href="kensaku.php?bno=3">PRADA（プラダ）</a></li>
							<li><a href="kensaku.php?bno=4">BURBERRY（バーバリー）</a></li>
							<li><a href="kensaku.php?bno=5">HERMES（エルメス）</a></li>
							<li><a href="kensaku.php?bno=6">FOXEY（フォクシー）</a></li>
							<li><a href="kensaku.php?bno=7">FENDI（フェンディ）</a></li>
							<li><a href="kensaku.php?bno=8">LOUIS VUITTON<br>（ルイ・ヴィトン）</a></li>
							<li><a href="kensaku.php?bno=9">BOTTEGA VENETA<br>（ボッテガ・ヴェネタ）</a></li>
						</ul>
				</nav><!-- fnav2の閉じ -->
		
				<nav id="fnav3">
					<p>アイテム</p>
						<ul>
							<li><a href="kensaku.php?icate=1">バッグ</a></li>
							<li><a href="kensaku.php?icate=2">財布</a></li>
							<li><a href="kensaku.php?icate=3">アクセサリー</a></li>
							<li><a href="kensaku.php?icate=4">靴</a></li>
							<li><a href="kensaku.php?icate=5">ワンピース</a></li>
							<li><a href="kensaku.php?icate=6">アウター</a></li>
							<li><a href="kensaku.php?icate=7">トップス</a></li>
							<li><a href="kensaku.php?icate=8">ボトムス</a></li>
							<li><a href="kensaku.php?icate=9">スーツ</a></li>
						</ul>
				</nav><!-- fnav3の閉じ -->
				
				<nav id="fnav4">
					<p>サービス・会社案内</p>
						<ul>
							<li><a href="from.php">お問い合わせ</a></li>
							<li><a href="tokutei.html">特定商取引法・古物営業法に基づく表記</a></li>
							<li><a href="kojinhogo.html">個人情報保護方針</a></li>
							<li><a href="kaisya.html">会社概要</a></li>
						</ul>
				</nav><!-- fnav4の閉じ -->
				
			</nav><!-- fnav0の閉じ -->
		</nav><!-- fnavの閉じ -->
		<footer>
			<p class="copyright clearfix"><small>(C) 2020 中古ブランドショップHarmony</small></p>
		</footer>
	</body>
</html>