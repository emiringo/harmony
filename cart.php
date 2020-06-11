<?php

//セッション利用の宣言
session_start();

//$_SESSION["cart"]を用意していない場合
if(!isset($_SESSION["cart"])){
	$_SESSION["cart"] = array();
}

//カートに商品を入れたとき
if(isset($_GET["code"])){
	$code = $_GET["code"];
	$hinmei = $_GET["hinmei"];
	$price = $_GET["price"];
	$suu = $_GET["suu"];
	//$souryou = 800;

	//同一商品がカートの中にある場合は数量のみ加算する
	$umu = 0;		//0:同一商品なし	1：同一商品あり
	$sinakazu = count($_SESSION["cart"]);	//すでにカート内にある商品数
	for($i=0; $i<$sinakazu; $i++){
		if($_SESSION["cart"][$i]["code"] === $code){
				$_SESSION["cart"][$i]["suu"] = $_SESSION["cart"][$i]["suu"] + $suu;
				$umu = 1;
				break;
		}
	}
	
	//セッションにデータを保存
	if($umu === 0){
			$i = count($_SESSION["cart"]);
			$_SESSION["cart"]["$i"]["code"] = $code;
			$_SESSION["cart"]["$i"]["hinmei"] = $hinmei;
			$_SESSION["cart"]["$i"]["price"] = $price;
			$_SESSION["cart"]["$i"]["suu"] = $suu;
	}
	header("Location: cart.php");
	exit;
}

//カートの中を空にする
if(isset($_GET["delete"])){
		$_SESSION["cart"] = array();
		
	header("Location: cart.php");
	exit;
}

//任意の商品を削除する
if(isset($_GET["delno"])){
	$delno = $_GET["delno"];
	unset($_SESSION["cart"][$delno]);
	$_SESSION["cart"] = array_values($_SESSION["cart"]);
	
	header("Location: cart.php");
	exit;
}




?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ショッピングカート｜中古ブランドショップHarmony</title>
		<meta name="robots" content="noindex">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="description" content="中古ブランドショップHarmonyのショッピングカート">
		<meta name="keywords" content="ショッピングカート,中古ブランドショップHarmony">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bg.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/cart.css">
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
				<li>ショッピングカート</li>
			</ol>	
		</div>
		
		<div id="rightkobetu" class="clearfix">
			<main>
				<h2>ショッピングカート</h2>
					<p>カートに入っている商品は以下の通りです。<br>
					なお、これらの商品はこの時点では購入が完了しておらず、他の方もお買い上げ頂ける状態となっています。<br>
					他の方がお買い上げになられた場合、ご購入いただけないことがありますので、なるべく早くご注文手続きされることをおすすめします。</p>
					
					<?php 
					$sinakazu = count($_SESSION["cart"]);
					if($sinakazu === 0){
					?>
					<p><table border=1><tr><td>カートの中は空です。</td></tr></table></p>
					<?php }else{
					$subtotal = 0;
					$kingaku = 0;
					?>
					
					<table border=1>
						<tr>
							<th>商品コード</th>
							<th>商品名</th>
							<th>単価（税込）</th>
							<th>個数</th>
							<th>小計（税込）</th>
							<th>取消</th>
						</tr>
						
						<?php for($i=0; $i<$sinakazu; $i++){ ?>
						<tr>
							<td><?php echo $_SESSION["cart"][$i]["code"]; ?></td>
							<td><?php echo $_SESSION["cart"][$i]["hinmei"]; ?></td>
							<td><?php echo $_SESSION["cart"][$i]["price"]; ?>円</td>
							<td><?php echo $_SESSION["cart"][$i]["suu"]; ?></td>
							<td><?php 
							$kingaku = $_SESSION["cart"][$i]["price"] * $_SESSION["cart"][$i]["suu"];
							echo $kingaku;
							$subtotal = $subtotal + $kingaku;
							?>
							円</td>
							<td><a href="cart.php?delno=<?php echo $i; ?>">取消</a></td>
						</tr>
						<?php } ?>
						
						<tr>
							<td colspan="4">合計（税込）+送料無料</td>
							<td><?php echo $subtotal; ?>円</td>
							<td></td>
						</tr>
					</table>
					
					<?php } ?>
					
					<p><a href="http://localhost/www19/kensaku.php">お買い物を続ける方はこちらをクリック</a></p>
					<p>お買い物手続きへお進みになるお客様は、以下のいずれかにお進みください。</p>
					
					<h3>オンラインストア会員のお客様</h3>
					<p>以下フォームページよりログインし、ご注文手続きにお進みください。<br><br>
						
					<a href="login.php">ログインしてご注文手続きに進む</a></p>

					<h3>はじめてご利用のお客様</h3>
					<p>新規会員登録をした後に、ご注文手続きにお進みいただけます。<br><br>
					<a href="touroku.php">新規会員登録はこちら</a></p>

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