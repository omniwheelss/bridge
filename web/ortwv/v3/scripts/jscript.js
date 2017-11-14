/* #########

	Form Validation

#############
*/
function FormValid(Valid_Arr,Form1){
	var Split_Arr = Valid_Arr.split(",");

	for(i = 0;i < Split_Arr.length; i++){
		var Field_Val = $("#"+Split_Arr[i]).val();
		var Field_Type = $("#"+Split_Arr[i]).get(0).type;
		if(Field_Type == 'text' || Field_Type == 'password' || Field_Type == 'textarea' ){
				if(Field_Val == ''){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Please enter a value.');
					$("#Main_Error_Div").show('slow');
					var E = 1;
				}
		}
		
		if(Field_Type == 'select-one'){
				if(Field_Val == '0'){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Select the Values');
					var E = 1;
				}
		}

	}

	if(E == 1){
			return false;
	}
}



/* #########

	Ajax Function For Login

#############
*/


function Ajax_Func_Login(Valid_Arr,Url,Img_Div,Output_Div){

	var Split_Arr = Valid_Arr.split(",");

	for(i = 0;i < Split_Arr.length; i++){
		var Field_Val = $("#"+Split_Arr[i]).val();
		var Field_Type = $("#"+Split_Arr[i]).get(0).type;
		if(Field_Type == 'text' || Field_Type == 'password' || Field_Type == 'textarea' ){
				if(Field_Val == ''){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Please enter a value.');
					$("#Main_Error_Div").show('slow');
					var E = 1;
				}
		}
		if(Field_Type == 'select-one'){
				if(Field_Val == '0'){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Select the Values');
					var E = 1;
				}
		}

	}

	if(E == 1){
			return false;
	}
	else{/*
		if(Url != ''){
			document.getElementById(Img_Div).style.display= 'block';
	
			var xmlhttp;
			if (window.XMLHttpRequest){
			  xmlhttp=new XMLHttpRequest();
			}
			else if (window.ActiveXObject){
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			else{
			  alert("Your browser does not support XMLHTTP!");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4){
					if(xmlhttp.responseText.length == '13'){
						window.location = 'http://localhost/P/home.php';
					}
					else{
						document.getElementById(Img_Div).style.display= 'none';
						document.getElementById(Output_Div).style.display= 'block';
						document.getElementById(Output_Div).innerHTML=xmlhttp.responseText;
					}
				}
			}
			var Old_Email = $("#Old_Email").val();
			var Email = $("#Email").val();
			Url1 = Url+"?Old_Email="+Old_Email+"&Email="+Email;alert(Url1);
			xmlhttp.open("GET",Url1,true);
			xmlhttp.send(null);
		}*/
	}
		
}


/* #########

	Ajax Function For Forget Password

#############
*/


function Ajax_Func_Forget_Password(Valid_Arr,Url,Img_Div,Output_Div){

	var Split_Arr = Valid_Arr.split(",");

	for(i = 0;i < Split_Arr.length; i++){
		var Field_Val = $("#"+Split_Arr[i]).val();
		var Field_Type = $("#"+Split_Arr[i]).get(0).type;
		if(Field_Type == 'text' || Field_Type == 'password' || Field_Type == 'textarea' ){
				if(Field_Val == ''){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Please enter a value.');
					$("#Main_Error_Div").show('slow');
					var E = 1;
				}
		}
		if(Field_Type == 'select-one'){
				if(Field_Val == '0'){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Select the Values');
					var E = 1;
				}
		}

	}

	if(E == 1){
			return false;
	}
	else{
		document.getElementById(Img_Div).style.display= 'block';

		var xmlhttp;
		if (window.XMLHttpRequest){
		  xmlhttp=new XMLHttpRequest();
		}
		else if (window.ActiveXObject){
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else{
		  alert("Your browser does not support XMLHTTP!");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4){
				document.getElementById(Img_Div).style.display= 'none';
				document.getElementById(Output_Div).style.display= 'block';
				document.getElementById(Output_Div).innerHTML=xmlhttp.responseText;
			}
		}
		var Email = $("#Email").val();
		Url1 = Url+"?Email="+Email;
		xmlhttp.open("GET",Url1,true);
		xmlhttp.send(null);
	}
		
}


/* #########

	Ajax Function

#############
*/


function Ajax_Func_Current_Location(Url,Img_Div,Output_Div){
	
	var xmlhttp;
	if (window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject){
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	else{
	  alert("Your browser does not support XMLHTTP!");
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4){//alert(xmlhttp.responseText);
			//document.getElementById(Img_Div).style.display= 'none';
			document.getElementById('Current_Location').style.display= 'block';
			
			//document.getElementById(Output_Div).innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET",Url,true);
	xmlhttp.send(null);
}


/* #########

	Tooltip Function

#############
*/

function logged_box_func_show(){
	$("#shareit-box").show('slow');
}

function logged_box_func_hide(){
	$("#shareit-box").hide('slow');
}



/* #########

	History Location Ajax

#############
*/

function History_Location_ajax(IMEI,Start_Datetime,End_Datetime,Url){

	//document.getElementById('History_Location_Summary_Ajax').style.display = 'block';
	var xmlhttp;
	if (window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject){
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	else{
	  alert("Your browser does not support XMLHTTP!");
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4){
			//document.getElementById(Img_Div).style.display= 'none';
			//document.getElementById('History_Location_Summary_Ajax').style.display= 'none';
			document.getElementById('History_Location_Info').innerHTML= xmlhttp.responseText;
			document.getElementById('History_Location_Info').style.display= 'block';
			
		}
	}
	Url1 = Url+"?IMEI="+IMEI+"&Start_Date="+Start_Datetime+"&End_Date="+End_Datetime;
	xmlhttp.open("GET",Url1,true);
	xmlhttp.send(null);
}


/* #########

	Check Dates

#############
*/

function check_dates(days){

	t1= $("#inputDate").val();
	t2=$("#inputDate1").val();
	
   //Total time for one day
	var one_day=1000*60*60*24; 
	
	var x=t1.split("-");     
	var y=t2.split("-");
  //date format(Fullyear,month,date) 

	var date1=new Date(x[2],(x[1]-1),x[0]);
	var date2=new Date(y[2],(y[1]-1),y[0])
	var month1=x[1]-1;
	var month2=y[1]-1;
    //Calculate difference between the two dates, and convert to days
    _Diff=Math.ceil((date2.getTime()-date1.getTime())/(one_day)); 
	if(_Diff >= days){
		document.getElementById('Report_Sel_Info').innerHTML= 'Selection range cannot be process for more than '+days+' days.Kindly check again.';
		document.getElementById('Report_Sel_Info').style.display= 'block';
		return  false;
	}
	return true;
}



/* #########

	Hide all Vehicle div

#############
*/
function hide_allvehiclediv(get_val){
	$("#"+get_val).hide();
}
function show_allvehiclediv(get_val){
	$("#"+get_val).show();
}


/* #########

	Ajax Function For Change Email Address

#############
*/


function Ajax_Func_Change_Email(Valid_Arr,Url,Img_Div,Output_Div){

	var Split_Arr = Valid_Arr.split(",");

	for(i = 0;i < Split_Arr.length; i++){
		var Field_Val = $("#"+Split_Arr[i]).val();
		var Field_Type = $("#"+Split_Arr[i]).get(0).type;
		if(Field_Type == 'text' || Field_Type == 'password' || Field_Type == 'textarea' ){
			if(Field_Val == ''){
				$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
				$("#"+Split_Arr[i]+"v").show('animate');
				$("#"+Split_Arr[i]+"v").html('Please enter a value.');
				$("#Main_Error_Div").show('slow');
				var E = 1;
			}
			
			if(Field_Val != ''){
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(Field_Val)) {
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Enter the Correct Email Address');
					var E = 1;
				}				
			}
		}
		
		if(Field_Type == 'select-one'){
				if(Field_Val == '0'){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Select the Values');
					var E = 1;
				}
		}

	}

	if(E == 1){
			return false;
	}
	else{
		document.getElementById(Img_Div).style.display= 'block';

		var xmlhttp;
		if (window.XMLHttpRequest){
		  xmlhttp=new XMLHttpRequest();
		}
		else if (window.ActiveXObject){
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else{
		  alert("Your browser does not support XMLHTTP!");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4){
				document.getElementById(Img_Div).style.display= 'none';
				document.getElementById('Change_Email_Div').style.display= 'none';
				document.getElementById(Output_Div).style.display= 'block';
				document.getElementById(Output_Div).innerHTML=xmlhttp.responseText;
			}
		}
		var Old_Email = $("#Old_Email").val();
		var Email = $("#Email").val();
		Url1 = Url+"?Old_Email="+Old_Email+"&Email="+Email;
		xmlhttp.open("GET",Url1,true);
		xmlhttp.send(null);
	}
		
}



/* #########

	Ajax Function For Change Email Address

#############
*/


function Ajax_Func_Change_Pass(Valid_Arr,Url,Img_Div,Output_Div){

	var Split_Arr = Valid_Arr.split(",");

	for(i = 0;i < Split_Arr.length; i++){
		var Field_Val = $("#"+Split_Arr[i]).val();
		var Field_Type = $("#"+Split_Arr[i]).get(0).type;
		if(Field_Type == 'text' || Field_Type == 'password' || Field_Type == 'textarea' ){
			if(Field_Val == ''){
				$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
				$("#"+Split_Arr[i]+"v").show('animate');
				$("#"+Split_Arr[i]+"v").html('Please enter a value.');
				$("#Main_Error_Div").show('slow');
				var E = 1;
			}
			
		}
		
		if(Field_Type == 'select-one'){
				if(Field_Val == '0'){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					$("#"+Split_Arr[i]+"v").show('animate');
					$("#"+Split_Arr[i]+"v").html('Select the Values');
					var E = 1;
				}
		}

	}

	if(E == 1){
			return false;
	}
	else{
		document.getElementById(Img_Div).style.display= 'block';

		var xmlhttp;
		if (window.XMLHttpRequest){
		  xmlhttp=new XMLHttpRequest();
		}
		else if (window.ActiveXObject){
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else{
		  alert("Your browser does not support XMLHTTP!");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4){
				$("#"+Img_Div).hide();
				$("#Change_Pass_Div").hide();
				$("#"+Output_Div).show();
				document.getElementById(Output_Div).innerHTML=xmlhttp.responseText;
			}
		}
		var Old_Pass = $("#Old_Pass").val();
		var Pass = $("#Pass").val();
		Url1 = Url+"?Old_Pass="+Old_Pass+"&Pass="+Pass;
		xmlhttp.open("GET",Url1,true);
		xmlhttp.send(null);
	}
		
}


/* #########

	Ajax Function For Vehicle List

#############
*/

function Show_Vehicle_List(Url,Img_Div,Output_Div){

	$("#vehicle_ajax_img1").show();
	var xmlhttp;
	if (window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject){
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else{
	  alert("Your browser does not support XMLHTTP!");
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4){
			$("#vehicle_ajax_img1").hide();
			$("#"+Output_Div).show();
			document.getElementById(Output_Div).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",Url,true);
	xmlhttp.send(null);
}

/* #########

	Ajax Function For Vehicle List

#############
*/

function Poi_Creation(){
	
	var POI_Name_Geo = $("#POI_Name_Geo").val();
	if(POI_Name_Geo == ''){
		$("#POI_Name_Geo").css('background-color', '#F6DDD8');
		//$("#"+Split_Arr[i]+"v").show('animate');
		//$("#"+Split_Arr[i]+"v").html('Please enter a value.');
		//$("#Main_Error_Div").show('slow');
		var E = 1;
	}

	if(E == 1){
			return false;
	}
	else{
		$("#poi_creation").hide();
		$("#poi-ajax").show();
		var xmlhttp;
		if (window.XMLHttpRequest){
		  xmlhttp=new XMLHttpRequest();
		}
		else if (window.ActiveXObject){
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else{
		  alert("Your browser does not support XMLHTTP!");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4){
				$("#poi-ajax").hide();
				$("#poi_thankyou").show();
				document.getElementById('Output_txt').innerHTML=xmlhttp.responseText;
			}
		}
		var Point = $("#Point").val();
		var POI_Name = $("#POI_Name_Geo").val();
		Url = 'poi-creation-ajax.php?Point='+Point+'&POI_Name='+POI_Name;
		xmlhttp.open("GET",Url,true);
		xmlhttp.send(null);
	}
}

/* #########

	Create New POI 

#############
*/

function Create_New_POI(){
	
	$("#Creat_POI_Window").toggle('slow');
}

function New_POI_Creation(Valid_Arr){
	
	var Split_Arr = Valid_Arr.split(",");

	for(i = 0;i < Split_Arr.length; i++){
		var Field_Val = $("#"+Split_Arr[i]).val();
		var Field_Type = $("#"+Split_Arr[i]).get(0).type;
		if(Field_Type == 'text' || Field_Type == 'password' || Field_Type == 'textarea' ){
			if(Field_Val == ''){
				$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
				$("#"+Split_Arr[i]+"v").show('animate');
				$("#"+Split_Arr[i]+"v").html('Please enter a value.');
				//$("#Main_Error_Div").show('slow');
				var E = 1;
			}
			
		}
		
		if(Field_Type == 'select-one'){
				if(Field_Val == '0'){
					$("#"+Split_Arr[i]).css('background-color', '#F6DDD8');
					//$("#"+Split_Arr[i]+"v").show('animate');
					//$("#"+Split_Arr[i]+"v").html('Select the Values');
					var E = 1;
				}
		}

	}

	if(E == 1){
			return false;
	}
	else{
		$("#Creat_POI_Window").hide();
		$("#Creat_POI_Window1").show();
		$("#poi-ajax1").show();
		var xmlhttp;
		if (window.XMLHttpRequest){
		  xmlhttp=new XMLHttpRequest();
		}
		else if (window.ActiveXObject){
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else{
		  alert("Your browser does not support XMLHTTP!");
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4){
				$("#poi-ajax1").hide();
				document.getElementById('New_Poi_Output_txt').innerHTML=xmlhttp.responseText;
				//setTimeout("document.getElementById('Creat_POI_Window1').style.display='none'",2000);
				setTimeout("$('#Creat_POI_Window1').hide('slow');",2000);
			}
		}
		var Latitude = $("#Latitude").val();
		var Longitude = $("#Longitude").val();
		var POI_Name = $("#POI_Name").val();
		var Radius = $("#Radius").val();
		Url = 'poi-creation-ajax1.php?Latitude='+Latitude+'&Longitude='+Longitude+'&POI_Name='+POI_Name+'&Radius='+Radius;
		xmlhttp.open("GET",Url,true);
		xmlhttp.send(null);
	}
}

function hide_New_Poi_txt(){
		$("#hide_New_Poi_txt").hide('slow');
}

