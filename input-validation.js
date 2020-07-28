var xmlHttp;
var unFlag=false;

function GetXmlHttpObject() {
	var xmlHttp=null;
	try
		{
		// Firefox, Opera 8.0+, Safari
		 xmlHttp=new XMLHttpRequest();
		}
	catch (e)
		{
		// Internet Explorer
		try
			{ xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e)
			{  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
		}
		return xmlHttp;
	}

	function checkUN(un){
		var unameExp=/^[a-z]\w{3,9}$/i;


		if (un.length==0){
			m="";
			unFlag=false;
			document.getElementById('unmsg').innerHTML=m;
		}


			else if (!unameExp.test(un)){
					m="Invalid Username";
					c="red";
					unFlag=false;
					document.getElementById('unmsg').style.color=c;
					document.getElementById('unmsg').innerHTML=m;
				}

			else{ //valid

					xmlHttp=GetXmlHttpObject(); //use the same function as the previous example

					if (xmlHttp==null)
					{
						alert ("Your browser does not support AJAX!");
					 return;
				 }

					var url="username-validation.php";
					url=url+"?q="+un;
					url=url+"&sid="+Math.random();

					xmlHttp.onreadystatechange=stateChanged; //function call
					xmlHttp.open("GET",url,true);
					xmlHttp.send(null);
			}     

}//function end

function checkEM(em){
		var emailExp=/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/i;


		if (em.length==0){
			m="";
			emFlag=false;
			document.getElementById('emmsg').innerHTML=m;
		}


			else if (!emailExp.test(em)){
					m="Invalid Email";
					c="red";
					emFlag=false;
					document.getElementById('emmsg').style.color=c;
					document.getElementById('emmsg').innerHTML=m;
				}

			else{ //valid

					xmlHttp=GetXmlHttpObject(); //use the same function as the previous example

					if (xmlHttp==null)
					{
						alert ("Your browser does not support AJAX!");
					 return;
				 }

					var url="email-validation.php";
					url=url+"?em="+em;
					url=url+"&sid="+Math.random();

					xmlHttp.onreadystatechange=stateChanged; //function call
					xmlHttp.open("GET",url,true);
					xmlHttp.send(null);
			}

}//function end

function stateChanged() {
	if (xmlHttp.readyState==4){

		if (xmlHttp.responseText=="valid")
		{
			document.getElementById('unmsg').style.color="green";
			document.getElementById('unmsg').innerHTML="Username is Available";
			unFlag=true;
		}
		else if (xmlHttp.responseText=="notvalid")
		{
			document.getElementById('unmsg').style.color="red";
			document.getElementById('unmsg').innerHTML="Username is Not Available, please choose another username";
			unFlag=false;
		}

		else if (xmlHttp.responseText=="emvalid")
		{
			document.getElementById('emmsg').style.color="green";
			document.getElementById('emmsg').innerHTML="Valid Email";
			emFlag=true;
		}
		else if(xmlHttp.responseText=="emnotvalid")
		{
			document.getElementById('emmsg').style.color="red";
			document.getElementById('emmsg').innerHTML="Email already in use.";
			emFlag=false;
		} 

	}
}


function checkUserInputs(){
document.forms[0].JSEnabled.value="TRUE";
return unFlag;
}
