const imgList=
[
    'dog',
    'cat'
];


for(var i=0;i<imgList.length;i++)
{
    //画像描画関係
    var slide=document.createElement("li");
    slide.innerHTML = "<a href='pet/" + imgList[i] + ".html'><img src='images/" + imgList[i] + ".png'></a>";
    document.getElementsByClassName("slider-inner")[0].appendChild(slide);
}


const imageSlide=document.getElementsByClassName('slider-inner')[0].getElementsByTagName('li');

let nowIndex=0;
//現在表示されている画像とドットナビにクラス名を付ける
imageSlide[nowIndex].classList.add('show');

//スライド中かどうか
let isChanging = false;
let slideTimer;

//別のスライド(val番目)に変化する
function sliderSlide(val)
{
    if(isChanging === true)//変化中なら変化しない
    {
        return false;
    }
    isChanging=true;

    //現在表示されている画像とナビのクラス名を削除
    imageSlide[nowIndex].classList.remove("show");
    nowIndex=val;

    //クラス名を付けなおす
    imageSlide[nowIndex].classList.add("show");

    
    
    buttonAction();

    setTimeout(function()
    {
        isChanging=false;
    },800);
}


function nextSlide()
{
    if(nowIndex+1>=imgList.length) { sliderSlide(0); }
    else { sliderSlide(nowIndex+1);  }    
}


setInterval(nextSlide,5000);


//ボタンを押した処理
document.getElementById("foot-button").addEventListener("click",
    function()
    {
        console.log("click");
        nextSlide();
    }
)

function buttonAction()
{
    var button = document.getElementById("foot-button");
    bAction_scale(button);
}

function bAction_scale(button)
{
    button.classList.add("scale");
    setTimeout(function()//自動的に変化
    {
        button.classList.remove("scale");
    },600);
}
