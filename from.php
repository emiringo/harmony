<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>お問い合わせ｜中古ブランドショップHarmony</title>
		<meta name="robots" content="noindex">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="description" content="">
		<meta name="keywords" content="お問い合わせ">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bg.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/from.css">
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
				<li>ページ名</li>
			</ol>	
		</div>
		
		<div id="rightkobetu" class="clearfix">
			<main>
				<h2>お問い合わせ</h2>
					<p>下記の項目をご入力の上、お問い合わせ内容をご入力ください。</p>
				<form method="post" action="fromkan.php">
					<table border="1">
						<tr>
							<th>お名前</th>
							<td><input type="text" name="name" value=""></td>
						</tr>
						<tr>
							<th>メールアドレス</th>
							<td><input type="text" name="mail" value=""></td>
						</tr>
						<tr>
							<th>注文番号</th>
							<td><input type="text" name="no" value=""></td>
						</tr>
						<tr>
							<th>お問い合わせ内容</th>
							<td><textarea name="お問い合わせ内容"></textarea></td>
						</tr>
					</table>
					<p><input type="submit" name="sousin" value="メールを送信する"></p>
				</form>
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