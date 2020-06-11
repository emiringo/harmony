<?php
//変数の初期化
$icate = "";
$catename = "";
$bno = "";
$burando = "";

//カテゴリが送信された場合
if(isset($_GET["icate"])){
	$icate = (int)$_GET["icate"];
}elseif(isset($_GET["bno"])){
	$bno = (int)$_GET["bno"];
}elseif(isset($_POST["burando"])){
	$burando = (int)$_GET["burando"];
}


//==============================================================================
//■データベース情報を設定
//==============================================================================
$dsn = 'mysql:dbname=emirin123_harmony;host=mysql1b.xserver.jp;charset=utf8';

$user = 'emirin123_harmo';  //ユーザー名
$password = 'harmony123';  //パスワード

//==============================================================================
//■try(正常処理)
//==============================================================================
try{
	//PDOオブジェクトの作成
	$dbh = new PDO($dsn, $user, $password);

//==============================================================================
//■エラーの表示内容を指定
//　setAttribute：データベースハンドルの属性を設定
//　PDO::ATTR_ERRMODE　エラーレポート
//　PDO::ERRMODE_EXCEPTION　DB操作中に問題が発生した場合、その内容を受け取る
//　PDO::ERRMODE_SILENT: エラーコードのみ受け取る
//==============================================================================
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//==============================================================================
//■SQL命令
//　実行するSQL命令を変数に代入
//==============================================================================
	$sql = "select * from syohin";
	$cateneme = "すべて";
	
	if($icate === 1){
		$sql = "select * from syohin where icategory=1";
		$cateneme = "バッグ";
	}elseif($icate === 2){
		$sql = "select * from syohin where icategory=2";
		$cateneme = "財布";
	}elseif($icate === 3){
		$sql = "select * from syohin where icategory=3";
		$cateneme = "アクセサリー";
	}elseif($icate === 4){
		$sql = "select * from syohin where icategory=4";
		$cateneme = "靴";
	}elseif($icate === 5){
		$sql = "select * from syohin where icategory=5";
		$cateneme = "ワンピース";
	}elseif($icate === 6){
		$sql = "select * from syohin where icategory=6";
		$cateneme = "アウター";
	}elseif($icate === 7){
		$sql = "select * from syohin where icategory=7";
		$cateneme = "トップス";
	}elseif($icate === 8){
		$sql = "select * from syohin where icategory=8";
		$cateneme = "ボトムス";
	}elseif($icate === 9){
		$sql = "select * from syohin where icategory=9";
		$cateneme = "スーツ";
	}
	
	if($bno === 1){
		$sql = "select * from syohin where bnumber=1";
		$cateneme = "CHANEL(シャネル)";
	}elseif($bno === 2){
		$sql = "select * from syohin where bnumber=2";
		$cateneme = "GUCCI(グッチ)";
	}elseif($bno === 3){
		$sql = "select * from syohin where bnumber=3";
		$cateneme = "PRADA(プラダ)";
	}elseif($bno === 4){
		$sql = "select * from syohin where bnumber=4";
		$cateneme = "BURBERRY(バーバリー)";
	}elseif($bno === 5){
		$sql = "select * from syohin where bnumber=5";
		$cateneme = "HERMES(エルメス)";
	}elseif($bno === 6){
		$sql = "select * from syohin where bnumber=6";
		$cateneme = "FOXEY(フォクシー)";
	}elseif($bno === 7){
		$sql = "select * from syohin where bnumber=7";
		$cateneme = "FENDI(フェンディ)";
	}elseif($bno === 8){
		$sql = "select * from syohin where bnumber=8";
		$cateneme = "LOUIS VUITTON(ルイ・ヴィトン)";
	}elseif($bno === 9){
		$sql = "select * from syohin where bnumber=9";
		$cateneme = "BOTTEGA VENETA(ボッテガ・ヴェネタ)";
	}


	if($burando === 1){
		$sql = "select * from syohin where bnumber=1";
		$cateneme = "CHANEL(シャネル)";
	}
		
//==============================================================================
//■SQL命令の実行の準備
//==============================================================================
	$stmt = $dbh->prepare($sql);

//==============================================================================
//■SQL命令の実行
//==============================================================================
	$stmt->execute();

//==============================================================================
//■データ抽出の場合、以下の処理を行う
//　　抽出結果を保存するために、配列（$data）を用意　$data = array();
//　　抽出結果がなくなるまで、1件ずつ連想配列形式でデータを取得
//==============================================================================
	$data = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$data[] = $row;
	}

//==============================================================================
//■抽出結果件数を取得
//==============================================================================
	$count = $stmt->rowCount();

//==============================================================================
//■エラー発生時（例外処理）
//　PDOException $e  $eにエラー内容を格納
//　echo($e->getMessage());　例外メッセージを取得してエラーを表示
//　die()　処理を停止
//==============================================================================
}catch (PDOException $e){
	echo($e->getMessage());
	die();
}
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>商品検索｜中古ブランドショップHarmony</title>
		<meta name="robots" content="noindex">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="description" content="">
		<meta name="keywords" content="中古,ブランド,商品,検索">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bg.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/kensaku.css">
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

		<div id="left" class="clearfix">
		<nav id="lnav1">
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
		</nav>
		<nav id="lnav2">
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
		</nav>
		</div><!-- leftの閉じ -->

		<div class="breadnav">
			<ol class ="breadcrumb">
				<li><a href="index.php">HOME</a></li>
				<li>商品検索</li>
			</ol>	
		</div>
		
		<div id="right" class="clearfix">
			<main>
				<h2>商品検索</h2>
			<p><?php echo $cateneme ?>の商品数は、<?php echo $count ?>件です。</p>     
		<div class="sentakusi">
			<select name="burando">
          		<option value="">ブランド選択</option>
          		<option value="1"><a href="kensaku.php?bno=1">シャネル</a></option>
          		<option value="2">グッチ</option>
          		<option value="3">プラダ</option>
          		<option value="4">バーバリー</option>
          		<option value="5">エルメス</option>
          		<option value="6">フォクシー</option>
          		<option value="7">フェンディ</option>
          		<option value="8">ルイ・ヴィトン</option>
          		<option value="9">ボッテガ・ヴェネタ</option>
        	</select>
        
        	<select name="item">
          		<option value="">アイテム選択</option>
          		<option value="1">バッグ</option>
          		<option value="2">財布</option>
          		<option value="3">アクセサリー</option>
          		<option value="4">靴</option>
          		<option value="5">ワンピース</option>
         		<option value="6">アウター</option>
          		<option value="7">トップス</option>
          		<option value="8">ボトムス</option>
          		<option value="9">スーツ</option>
        	</select></p>
		</div>
		
		<?php foreach($data as $row){ ?>
			<a href="kobetu.php?code=<?php echo $row["code"]; ?>">
				<div class="syouhinbox">
					<img src="images/item/<?php echo $row["picture"]; ?>" width="230" alt="<?php echo $row["hinmei"]; ?>">
					<br><span class="brando"><?php echo $row["brandname"]; ?></span><br>
					<span class="hinmei"><?php echo $row["hinmei"]; ?></span><br>
					<span class="rank"><?php echo $row["jyotai"]; ?></span><br>
					<span class="nedan"><?php echo $row["price"]; ?>円 (税込)</span><br>
				</div>
			</a>
		<?php } ?>
			</main>
		</div><!-- rightの閉じ -->
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