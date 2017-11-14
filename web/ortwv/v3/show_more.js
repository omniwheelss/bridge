var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);
//Variables
var loading = $("#loading");
var comments = $("#comments");
var more = $("#more");
var target_page, query, Initial_Display, Total_Record;

//show loading bar
function showLoading(){
	$("#more").hide();	
	loading.slideDown("slow");
}
//hide loading bar
function hideLoading(){
	loading.slideUp("fast");
	$("#more").show();	
};

//update now showing after every click of show more
function update_now()
{
	Initial_Display = parseInt($("#Initial_Display").attr("value")) + parseInt($("#Show_More").attr("value"));
	$("#Initial_Display").attr("value", Initial_Display );
	
	//hide show more when total comments are shown
	Total_Record = parseInt($("#Total_Record").attr("value"));
	if(Initial_Display >= Total_Record)
		more.slideUp("slow");
}

//When show more clicked
more.click(function(){
	showLoading();
	
	//define target page and query string
	if(filename == 'channel3.php')
		target_page = "show-more-history-location-report-ajax.php";
	else if(filename == 'channel4.php')
		target_page = "show-more-idle-report-ajax.php";
	else if(filename == 'channel5.php')
		target_page = "show-more-stoppage-report-ajax.php";
	else if(filename == 'channel_all3.php')
		target_page = "show-more-history-location-report-all-ajax.php";
	else if(filename == 'channel_all4.php')
		target_page = "show-more-idle-report-all-ajax.php";
	else if(filename == 'channel_all5.php')
		target_page = "show-more-stoppage-report-all-ajax.php";


	query = $("#myForm").serialize();
	
	//send request and append the response data in comments area
	$.get(target_page, query , function(data){
		comments.append(data);
		hideLoading();
		update_now();
	});
});

//intially hide loading bar
hideLoading();