<?php
// データベースへ接続
require_once ("PET_CLASS.php");

$pets = getData();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/index.css">

    <title>ペットを飼うために</title>
</head>
<body>
    <header>
        <nav>
            <h1>ペットを飼うための準備！サイト</h1>
        </nav>
    </header>
    

    <main>
        <section id="slider">
            <ul class="slider-inner">
                
            </ul>
            <div id="Fbutton-inner">
                <img id="foot-button" src="images/foot-button.png">
            </div>

            <div class="message flex-container">
                <div id="Preface"><p>前置き</p></div>
                <div class="mes-p">
                    <p>このサイトはペット飼い始めるにあたって必要なことは何か、浅く広く知る事ご紹介いたします！
                    </p>
                </div>
                
            </div>
        </section>



        <div class="content">
                
            <section id="select">
                <div class="div-box">
                    <h2>おすすめペット</h2>

                    <div class="list div-content">

                        <div class="flex-container">
                            <?php
                                $cnt = 0;
                                foreach ($pets as $pet)
                                {
                                    $pet->printList();
                                    $cnt+=1;
                                    if($cnt>=2){break;}
                                }
                            ?>    
                        </div>

                        <form name='search' action='search.php' method='post'>
                            <div class="more"><a href="javascript:search.submit()">もっと見る</a></div>
                            <input type="hidden" name="pets" value=<?php $pets ?>>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </main>
    
    <footer>

    </footer>

    <script src="js/slider.js"></script>
</body>
</html>

