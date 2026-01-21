<?php

// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["pid"] )) {
	header ( "Location: index.php" );
}
require_once ("PET_CLASS.php");

// 送信データの取得
$pid = htmlspecialchars($_POST ["pid"],ENT_QUOTES);
$name = $_POST ["name"];
$thumbnail = $_POST ["thumbnail"];
$text = $_POST ["text"];


// データベースへ接続
require("pdo.php");

/////////////////////////////////////////////////
//習慣データ取得
$sql ="SELECT * FROM petweb_habit WHERE pid = ".$pid;
$result = $dbInfo->query ($sql);
$habits = setCONTENT($result);


/////////////////////////////////////////////////
//アイテムデータ取得
$sql ="SELECT * FROM petweb_item WHERE pid = ".$pid;
$result = $dbInfo->query ($sql);
$items = setCONTENT($result);


/////////////////////////////////////////////////
//医療系データ取得
$sql ="SELECT * FROM petweb_vaccine WHERE pid = ".$pid;
$result = $dbInfo->query ($sql);
$vaccines = setCONTENT($result);


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
    <link rel="stylesheet" href="css/pet.css">
    
    <title></title>
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
        <section id="message">
            <h2><?php echo $name ?></h2>
            <div class="mes-content flex-container">
                <img src =<?php echo "'".$thumbnail."'" ?> width=200px>
                <div>
                    <p>
                        <?php echo $text ?>
                    </p>
                </div>
            </div>
        </section>


        <div class="content">
            <section id="habit">
                <div class="div-box">
                    <h2>習慣</h2>
                    <div class="div-content">
                        <?php 
                            foreach($habits as $habit)
                            {
                                $habit->printHabit();
                            }
                        ?>
                    </div>
                </div>
            </section>


            <section id="item">
                <div class="div-box">
                    <h2>必要な物</h2>
                        
                    <div class="div-content">
                        <div class="list flex-container">
                            <?php 
                                foreach($items as $item)
                                {
                                    $item->printItem();
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </section>


            <section id="medical">
                <div class="div-box">
                    <h2>ワクチン接種など</h2>
                    <div class="div-content">
                        <?php 
                            foreach($vaccines as $vaccine)
                            {
                                $vaccine->printVaccine();
                            }
                        ?>
                    </div>
                </div>
            </section>


        </div>
        
    </main>
    

    <footer>

    </footer>
</body>
</html>

<?php

//データを取得・格納
function setCONTENT($result)
{
    $content = new ArrayObject ();
    foreach($result as $record)
    {
        $title = $record ["title"];
        $photo = $record ["photo"];
        $text = $record["text"];
        $value = new CONTENT($title,$photo,$text);
        // 配列に追加
        $content->append ( $value );
    }
    return $content;
}

//コンテンツ描画用クラス
class CONTENT
{
    private $title;
    private $photo;
    private $text;

    public function __construct($title, $photo, $text) {
		$this->title = $title;
		$this->photo = $photo;
		$this->text = $text;
	}

    public function printHabit()
    {
        echo "<div class='hab-content'>";
        echo    "<h3>".$this->title."</h3>";
        if($this->photo <> NULL)
        {
        echo    "<div class='with-img flex-container'>";
        echo         "<img src='".$this->photo."'>";
        echo         "<div>";
        echo            "<p>";
        echo                $this->text;                 
        echo            "</p>";
        echo         "</div>";
        echo    "</div>";
        echo "</div>";
        }
        else
        {
        echo    "<div class='no-img'>";
        echo         "<div>";
        echo            "<p>";
        echo                $this->text;
        echo            "</p>";
        echo         "</div>";
        echo    "</div>";
        echo "</div>";
        }
    }

    public function printItem()
    {
        echo "<div class='list-box'>";
        echo "<div class='text-area'>";
        echo    "<h3>".$this->title."</h3>";
        echo    "<p>";
        echo        $this->text;
        echo    "</p>";
        echo "</div>";
        if($this->photo <> NULL) echo "<img src='".$this->photo."'>";
        echo "</div>";
    }

    public function printVaccine()
    {
        echo "<div class='med-content'>";
        echo    "<h3>".$this->title."</h3>";
        if($this->photo <> NULL)
        {
        echo    "<div class='with-img flex-container'>";
        echo         "<img src='".$this->photo."'>";
        echo         "<div>";
        echo            "<p>";
        echo                $this->text;                 
        echo            "</p>";
        echo         "</div>";
        echo    "</div>";
        echo "</div>";
        }
        else
        {
        echo    "<div class='no-img'>";
        echo         "<div>";
        echo            "<p>";
        echo                $this->text;
        echo            "</p>";
        echo         "</div>";
        echo    "</div>";
        echo "</div>";
        }
    }
}
?>
