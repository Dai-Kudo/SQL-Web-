<?php
    require_once ("PET_CLASS.php");

    global $dbInfo;
    // SQL（検索）文の作成
    $sql ="SELECT * FROM pet ";
    
    $kigo = " WHERE ";

    if (isset ( $_POST ["size"] )) 
    {
        $sql.=$kigo."type LIKE '%".$_POST ["size"]."%' ";
        $kigo = " AND ";
    }
    if (isset ( $_POST ["type"] )) 
    {
        $sql.=$kigo."type LIKE '%".$_POST ["type"]."%' ";
        $kigo = " AND ";
    }
    if (isset ( $_POST ["name"] )) 
    {
        $sql.=$kigo."name LIKE '%".$_POST ["name"]."%' ";
    }
    
    $sql .= "ORDER BY pid ASC";


    $pets = new ArrayObject ();

    // データの数だけ繰り返し
    // ここに追加
    $result = $dbInfo->query ($sql);
    foreach($result as $record)
    {
        $pid = $record ["pid"];
        $name = $record ["name"];
        $thumbnail = $record ["thumbnail"];
        $text = $record["text"];
        $value = new PET($pid,$name,$thumbnail,$text);
        // 配列に追加
        $pets->append ( $value );
    }

    // データベースの切断
    $dbInfo = null;
    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/search.css">
    <title>ペットの種類</title>
</head>
<body>
        <header>
            <a href="index.php">
                <nav>
                    <h1>ペットを飼うための準備！サイト</h1>
                </nav>
            </a>
        </header>

    <main>
        
        <h1>ペット一覧</h1>

        <div id="searchBox">
            
            
            
            <form name='search' action='search.php' method='post'>
                <div id="type-box">
                    <h4>種類別</h4>
                    <div id="size-box">
                        <label for="type1"><input type="radio" name="size" value="small" id="type1" class="typeCheck" <?php if( isset($_POST['size']) && $_POST['size']=="small") echo 'checked'?> >小型</label>
                        <label for="type2"><input type="radio" name="size" value="medium" id="type2" class="typeCheck" <?php if( isset($_POST['size']) && $_POST['size']=="medium") echo 'checked'?> >中型</label>                        
                        <label for="type3"><input type="radio" name="size" value="big" id="type3" class="typeCheck" <?php if( isset($_POST['size']) && $_POST['size']=="big") echo 'checked'?> >大型</label>                        
                    </div>
                    <div>
                        <label for="type4"><input type="radio" name="type" value="dog" id="type4" class="typeCheck" <?php if( isset($_POST['type']) && $_POST['type']=="dog") echo 'checked'?>>犬類</label>
                        <label for="type5"><input type="radio" name="type" value="cat" id="type5" class="typeCheck" <?php if( isset($_POST['type']) && $_POST['type']=="cat") echo 'checked'?>>猫類</label>                        
                        <label for="type6"><input type="radio" name="type" value="bird" id="type6" class="typeCheck" <?php if( isset($_POST['type']) && $_POST['type']=="bird") echo 'checked'?>>鳥類</label>
                    </div>
                </div>
                
                <div id="s-text">
                    <h4>動物名</h4>
                    <input type="text" id="s-textBox" placeholder="動物名を入力" name="name"  <?php if( isset($_POST['name'])) echo "value='" .$_POST['name']."'"?>>
                </div>

                
                <div class="button-box inline-b">
                    <input type="submit" value="検索" class="btn">
                    <button id="reset">リセット</button>
                </div>
            </form>

        </div>
        
        
            <div class="list flex-container">
                <?php
                    if($pets->count() > 0)
                    {
                        foreach ($pets as $pet)
                        {
                            $pet->printSearchList();
                        }
                    }
                    else
                    {
                        echo "<p>お探しのペットは見つかりませんでした・・・。</p>";
                    }
                ?>
            </div>
        
        

    </main>

    <footer>

    </footer>

<script src="js/jquery-3.6.3.min.js"></script>
<script src="js/search.js"></script>

</body>
</html>

