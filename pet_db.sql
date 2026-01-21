-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2026-01-21 13:27:11
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `pet_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `pet`
--

CREATE TABLE `pet` (
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `pet`
--

INSERT INTO `pet` (`pid`, `name`, `type`, `thumbnail`, `text`) VALUES
(1, 'ネコ', 'small/cat', 'images/cat.png', '「アメリカンショートヘア」、「シンガプーラ」等様々な種類がいる猫です。<br>何を飼うかにもよりますが、初期費用はおおよそ20,000〜50,000円ほど<br>年間平均費用は約133,000円ほど<br>月の平均費用は約7000円程度です。'),
(2, '柴犬', 'medium/dog', 'images/dog.png', '小型犬などと比べると、実は比較的飼う難易度が高めな柴犬です。<br>平均寿命は約12～15年で、比較的長い傾向にあります。<br>かかる費用は1年に約15~20万円ほど、<br>月に約12,000~16,000円程です。<br>また、飼う時にお住いの市区町村に「畜犬登録」をする必要があります。'),
(3, 'ハムスター', 'small', 'images/comingsoon.png', ''),
(4, 'リス', 'small', 'images/comingsoon.png', ''),
(7, 'オウム', 'medium/bird', 'images/comingsoon.png', ''),
(8, 'チワワ', 'small/dog', 'images/comingsoon.png', ''),
(9, 'ウサギ', 'medium', 'images/comingsoon.png', ''),
(10, 'ブルドッグ', 'medium/dog', 'images/comingsoon.png', ''),
(11, 'ライオン', 'big/cat', 'images/comingsoon.png', ''),
(12, 'オオカミ', 'big/dog', 'images/comingsoon.png', ''),
(13, '鷹', 'big/bird', 'images/comingsoon.png', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `petweb_habit`
--

CREATE TABLE `petweb_habit` (
  `id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `petweb_habit`
--

INSERT INTO `petweb_habit` (`id`, `pid`, `title`, `photo`, `text`) VALUES
(1, 1, '室内飼育', 'images/habi-cat.png', '「猫は外に出してあげないとかわいそう」と思う方も多いと思いますが、猫は狭いなわばりでもストレスなく生きていける動物です。<br>登り降りの運動ができる場所と窓の外が見える環境を用意してあげてください。<br>また、季節によってはエアコンをつけっぱなしにしたりなどの工夫も必要です。'),
(2, 1, '爪切り', NULL, '爪切りをしないと、鋭い爪の先がカーテンやカーペットに引っかかり、爪が根元から折れて出血するといったケガにつながる可能性があります。'),
(3, 2, '散歩', 'images/relax-dog.png', '毎日散歩をさせてあげてください。ボール遊びなども出来れば良いと思います。<br>犬によっては家でトイレが出来ず、散歩中にしかできない子もいるので、散歩は欠かさないであげてください。'),
(4, 2, '歯磨き', NULL, '歯磨きですが、最初の内は歯を触らせてくれたら褒めるところから始めましょう。<br>ただ、柴犬に関わらず犬は歯周病になりやすい動物です。歯周病は最悪臓器にまで影響を及ぼします。<br>歯ブラシを使ってのケアが出来るよう、楽しみながら練習をしてあげてください。'),
(5, 2, 'ブラッシング', NULL, 'ブラッシングも柴犬には必須のケアです。<br>春と秋に訪れる換毛期で抜け毛を放置していると体が蒸れて皮膚病のリスクが高まってしまいます。<br>換毛期は毎日ブラッシングしてあげてください。そうでなくても週に数回はブラッシングしてあげましょう。');

-- --------------------------------------------------------

--
-- テーブルの構造 `petweb_item`
--

CREATE TABLE `petweb_item` (
  `id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `petweb_item`
--

INSERT INTO `petweb_item` (`id`, `pid`, `title`, `photo`, `text`) VALUES
(1, 1, 'キャリーバッグ', 'images/item-cat.png', '家に迎える時や病院に連れていくのに必要なアイテムです。'),
(2, 1, 'キャットタワー', NULL, 'キャットタワーはインドアで暮らす猫にとって運動不足の解消にもつながります。お日様があたる風通しのよいところに配置しましょう。'),
(3, 1, 'キャットフード', NULL, '最初は購入先や譲渡先で食べていたフードと同じものを選びましょう。<br>子猫を飼う場合は猫用のミルクなどライフステージに合ったものを選びましょう。'),
(4, 1, 'トイレ・猫砂', NULL, '猫は環境の変化によるストレスに弱いため、まずは購入先や譲渡先で使用しているものを用意しましょう。'),
(6, 1, 'おもちゃ', NULL, '室内飼いの猫にとっておもちゃを使って本能的な動きをすることは、ストレス解消になります。<br>また、飼い主さんと猫がコミュニケーションを図るうえでも、おもちゃは欠かせないアイテムです。\r\n'),
(7, 2, 'サークル（ケージ）', 'images/item-dog.png', '柴犬が落ち着ける場所を作ってあげてください。<br>サイズは成犬になった時を想定して一回り出来るくらいのものが良いでしょう。'),
(8, 2, 'ハウスやベッド', NULL, 'サークルに設置するものです。落ち着いて眠れる場所を用意してあげてください。<br>季節によってはペットヒーターなどが必要になります。'),
(9, 2, 'トイレ', NULL, 'トイレは、ベッドなど巣になる場所から離れた場所に設置してください。これは柴犬の習性によるもので、彼らは自分の巣の近くでは排泄をほとんどしないからです。'),
(10, 2, 'フード', NULL, '基本的には飼い始める前、ブリーダー等のもとで与えられていたものを用意してください。'),
(11, 2, 'おもちゃ', NULL, '人間用のものだとすぐに壊れてしまうので、必ず犬用のものを用意してください。<br>また、口に完全に入ってしまうサイズのおもちゃは避けましょう。');

-- --------------------------------------------------------

--
-- テーブルの構造 `petweb_vaccine`
--

CREATE TABLE `petweb_vaccine` (
  `id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `petweb_vaccine`
--

INSERT INTO `petweb_vaccine` (`id`, `pid`, `title`, `photo`, `text`) VALUES
(1, 1, 'ワクチン接種について', 'images/h-cat.png', '主にワクチン接種で予防できる猫の病気は6種類です。<br>ワクチン接種後は食欲の低下等の副作用が出ることもあります。<br>接種後は様子を見て副作用が出るようであれば獣医さんに相談に行ってください。<br>また、3種混合～5種混合等の混合ワクチンがありますが、室内飼いであれば3種混合で大丈夫です。<br>外に出る場面があるようであれば5種混合ワクチンを受けましょう。\r\n'),
(2, 1, '去勢・避妊について', NULL, '去勢・避妊を行う事で生理現象（発情など）の問題を無くすことが出来ますが、手術時の全身麻酔などのリスクもあります。<br>必ずすべてのケースで行わなければいけないわけではないので、自身の状況に合わせて判断してください。<br>去勢・避妊を行う時期として最も適しているのは生後6か月ほどのようです。それ以降でも遅すぎることはないので安心してください。\r\n'),
(3, 2, 'ワクチン接種など', 'images/h-dog.png', '免疫力が低い子犬のうちは生後約2か月頃からワクチンを接種する必要があります。<br>多くの場合は混合ワクチンを摂取しますが、副作用のリスクもあるのでどのワクチンを接種するかは必ず獣医師に相談しましょう。<br>また、狂犬病予防を摂取して１週間ほど間隔をあけてから混合ワクチンを摂取する事をお勧めします。順番を逆にする場合は1か月程度あけることが望ましいです。'),
(4, 2, '去勢・避妊について', NULL, '去勢・避妊を行う事で生理現象（発情など）の問題を無くすことが出来ますが、手術時の全身麻酔などのリスクもあります。<br>必ずすべてのケースで行わなければいけないわけではないので、自身の状況に合わせて判断してください。<br>去勢・避妊を行う時期として最も適しているのは生後6か月ほどのようです。それ以降でも遅すぎることはないので安心してください。');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pid`);

--
-- テーブルのインデックス `petweb_habit`
--
ALTER TABLE `petweb_habit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petweb_habit_ibfk_1` (`pid`);

--
-- テーブルのインデックス `petweb_item`
--
ALTER TABLE `petweb_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- テーブルのインデックス `petweb_vaccine`
--
ALTER TABLE `petweb_vaccine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `pet`
--
ALTER TABLE `pet`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `petweb_habit`
--
ALTER TABLE `petweb_habit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `petweb_item`
--
ALTER TABLE `petweb_item`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `petweb_vaccine`
--
ALTER TABLE `petweb_vaccine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `petweb_habit`
--
ALTER TABLE `petweb_habit`
  ADD CONSTRAINT `petweb_habit_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `pet` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `petweb_item`
--
ALTER TABLE `petweb_item`
  ADD CONSTRAINT `petweb_item_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `pet` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `petweb_vaccine`
--
ALTER TABLE `petweb_vaccine`
  ADD CONSTRAINT `petweb_vaccine_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `pet` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
