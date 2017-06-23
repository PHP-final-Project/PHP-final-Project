$(function(){
	 $('.edit').editable('save2.php', {
		 width     :120,
		 height    :18,
		 //onblur    : "ignore",
         cancel    : '取消',
         submit    : '確定',
    //load圖片     indicator : '<img src="css/loader.gif">',
         tooltip   : '點擊修改檔案',
		 callback  : function(value, settings) {
			 $("#modifiedtime").html("刚刚");
         }

     });
	 $('.edit_select').editable('save.php', {

		 type      : "select",
		 cancel    : '取消',
         submit    : '確定',
      //load圖片     indicator : '<img src="css/loader.gif">',
         tooltip   : '點擊修改檔案',
		 style     : 'display: inline'
	 });
	 $(".datepicker").editable('save.php', {
		 width     : 120,
		 type      : 'datepicker',
		 onblur    : "ignore",
		 cancel    : '取消',
         submit    : '確定',
         indicator : '<img src="css/loader.gif">',
         tooltip   : '點擊修改檔案',
		 style     : 'display: inline'
	 });
	 $(".textarea").editable('save.php', {
		 type      : 'textarea',
		 rows      : 6,
		 cols      : 50,
		 onblur    : "ignore",
		 cancel    : '取消',
         submit    : '確定',
         indicator : '<img src="css/loader.gif">'
	 });
});
