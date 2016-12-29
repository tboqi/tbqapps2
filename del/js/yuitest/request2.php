<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Connection Manager GET Transaction</title>

<style type="text/css">
/*margin and padding on body element
  can introduce errors in determining
  element position and are not recommended;
  we turn them off as a foundation for YUI
  CSS treatments. */
body {
	margin:0;
	padding:0;
}
</style>

<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.1/build/fonts/fonts-min.css" />
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/yahoo/yahoo-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/event/event-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.1/build/connection/connection-min.js"></script>


<!--begin custom header content for this example-->
<style>
#container li {margin-left:2em;}
</style>


<!--end custom header content for this example-->

</head>

<body class=" yui-skin-sam">

<h1>Connection Manager GET Transaction</h1>

<div class="exampleIntro">

	<p>To create a GET transaction using <a href="http://developer.yahoo.com/yui/connection/">Connection Manager</a>, you will need to construct a querystring of key-value pairs and append it to the URL.
The following code example provides a step-by-step approach to creating a simple GET transaction.</p>

<p>Click "Send a GET Request" below to try it out, then read the description below to learn how to create a simple transaction using Connection Manager.</p>			
</div>

<!--BEGIN SOURCE CODE FOR EXAMPLE =============================== -->

<div id="container"></div>

<script>
var div = document.getElementById('container');

var handleSuccess = function(o){

	YAHOO.log("The success handler was called.  tId: " + o.tId + ".", "info", "example");
	
	if(o.responseText !== undefined){
		div.innerHTML = "<li>Transaction id: " + o.tId + "</li>";
		div.innerHTML += "<li>HTTP status: " + o.status + "</li>";
		div.innerHTML += "<li>Status code message: " + o.statusText + "</li>";
		div.innerHTML += "<li>HTTP headers: <ul>" + o.getAllResponseHeaders + "</ul></li>";
		div.innerHTML += "<li>Server response: " + o.responseText + "</li>";
		div.innerHTML += "<li>Argument object: Object ( [foo] => " + o.argument.foo +
						 " [bar] => " + o.argument.bar +" )</li>";
	}
}

var handleFailure = function(o){

		YAHOO.log("The failure handler was called.  tId: " + o.tId + ".", "info", "example");

	if(o.responseText !== undefined){
		div.innerHTML = "<ul><li>Transaction id: " + o.tId + "</li>";
		div.innerHTML += "<li>HTTP status: " + o.status + "</li>";
		div.innerHTML += "<li>Status code message: " + o.statusText + "</li></ul>";
	}
}

var callback =
{
  success:handleSuccess,
  failure:handleFailure,
  argument: { foo:"foo", bar:"bar" }
};

var sUrl = "assets/get.php?username=anonymous&userid=0";

function makeRequest(){
	var request = YAHOO.util.Connect.asyncRequest('GET', sUrl, callback);
	
	YAHOO.log("Initiating request; tId: " + request.tId + ".", "info", "example");

}

YAHOO.log("As you interact with this example, relevant steps in the process will be logged here.", "info", "example");

</script>
<form><input type="button" value="Send a GET Request" onClick="makeRequest();"></form>

<!--END SOURCE CODE FOR EXAMPLE =============================== -->


<!--MyBlogLog instrumentation-->
<script type="text/javascript" src="http://track2.mybloglog.com/js/jsserv.php?mblID=2007020704011645"></script>

</body>
</html>
<!-- spaceId: 792403936 -->
<!-- VER-431 -->
<script language=javascript>
if(window.yzq_p==null)document.write("<scr"+"ipt language=javascript src=http://l.yimg.com/us.js.yimg.com/lib/bc/bc_2.0.4.js></scr"+"ipt>");
</script><script language=javascript>
if(window.yzq_p)yzq_p('P=Khp.3kJe5GL5tRYBR_CO8z1hfM.A60gQFIIACQk5&T=13ts3oc04%2fX%3d1209013378%2fE%3d792403936%2fR%3ddev_net%2fK%3d5%2fV%3d1.1%2fW%3dJ%2fY%3dYAHOO%2fF%3d3402729860%2fS%3d1%2fJ%3d3BAB49D1');
if(window.yzq_s)yzq_s();
</script><noscript><img width=1 height=1 alt="" src="http://us.bc.yahoo.com/b?P=Khp.3kJe5GL5tRYBR_CO8z1hfM.A60gQFIIACQk5&T=142nq8sk9%2fX%3d1209013378%2fE%3d792403936%2fR%3ddev_net%2fK%3d5%2fV%3d3.1%2fW%3dJ%2fY%3dYAHOO%2fF%3d1658662101%2fQ%3d-1%2fS%3d1%2fJ%3d3BAB49D1"></noscript>
<!-- com2.devnet.scd.yahoo.com compressed/chunked Wed Apr 23 22:02:58 PDT 2008 -->

