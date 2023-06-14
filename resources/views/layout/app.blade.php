<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

@include('layout.styling')


</head>
<body class=" w3-responsive">


<!--- Include all page header info here --->
<div align="center">
	<font color="darkgreen">
	<h1>This is all my top items including "topbar", "navbar", "e.t.c"
</h1>
  </font> 

</div>

<!--- Include all external page info here --->
@yield('content')


<!--- Include all page footer info here --->
<div align="center">
   <font color="purple">
	<h1>This is all my bottom items including "bottombar", "footer", "page references", "e.t.c"
</h1>
</font>
   
</div>

@include('layout.script')
</body>
</html>