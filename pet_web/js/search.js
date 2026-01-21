


$("#reset").on("click",function()
{
    $('input[class=typeCheck]').prop("checked", false);
    $("#s-textBox").val("");
});


// チェックを外す
var nowchecked = [];
$('input[type="radio"]:checked').each(function(){
  nowchecked.push( $(this).attr('id') );
});

$('input[type="radio"]').click(function(){
  var idx = $.inArray( $(this).attr('id'), nowchecked ); // nowcheckedにクリックされたボタンのidが含まれるか判定。なければ-1が返る。
	if( idx >= 0 ) { // クリックしたボタンにチェックが入っていた場合
		$(this).prop('checked', false); // チェックを外す
		nowchecked.splice(idx,1); // nowcheckedからこのボタンのidを削除
	} else { // チェックが入っていなかった場合
	// 同じname属性のラジオボタンをnowcheckedから削除する
    var name = $(this).attr('name');
    $('input[name="' + name + '"]').each(function(){
      var idx2 = $.inArray( $(this).attr('id'), nowchecked);
      if( idx2 >= 0 ){
        nowchecked.splice(idx2,1);
      }
    });
    // チェックしたものをnowcheckedに追加
		nowchecked.push( $(this).attr('id') );
	}
});

