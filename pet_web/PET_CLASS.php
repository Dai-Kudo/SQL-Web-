
<?php

require("pdo.php");

function getData()
{
    global $dbInfo;
    // SQL（検索）の実行
    $sql ="SELECT * FROM pet ORDER BY pid ASC";

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

    return $pets;
}

class PET
{
    private $pid;
    private $name; 
	private $thumbnail; 
	private $text;

    

    public function __construct($pid, $name, $thumbnail, $text) {
		$this->pid = $pid;
		$this->name = $name;
		$this->thumbnail = $thumbnail;
		$this->text = $text;
	}

    

    function printList()
    {   
        echo "<form name='pet". $this->pid. "' action='pet.php' method='post'>";

        echo    "<div class='list-box'>";
        echo       "<a href='javascript:pet". $this->pid. ".submit();'>";
        echo           "<h3>". $this->name. "</h3>";
        echo           "<img src='". $this->thumbnail. "'>";
        echo       "</a>";

        echo       "<input type='hidden' name='pid' value=". $this->pid .">";
        echo       "<input type='hidden' name='name' value=". $this->name .">";
        echo       "<input type='hidden' name='thumbnail' value=". $this->thumbnail .">";
        echo       "<input type='hidden' name='text' value='". $this->text ."'>";

        echo    "</div>";
        echo "</form>";
    }
    function printSearchList()
    {   
        
        echo "<form name='pet". $this->pid. "' action='pet.php' method='post'>";

        echo    "<div class='list-box'>";
        if($this->text != "")
        {
        echo       "<a href='javascript:pet". $this->pid. ".submit();'>";
        }
        else
        {
        echo       "<a href=''>";
        }
        echo           "<h3>". $this->name. "</h3>";
        echo           "<img src='". $this->thumbnail. "'>";
        echo       "</a>";

        echo       "<input type='hidden' name='pid' value=". $this->pid .">";
        echo       "<input type='hidden' name='name' value=". $this->name .">";
        echo       "<input type='hidden' name='thumbnail' value=". $this->thumbnail .">";
        echo       "<input type='hidden' name='text' value='". $this->text ."'>";

        echo    "</div>";
        echo "</form>";
    }

}

?>
