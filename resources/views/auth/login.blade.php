<div align="center">

<font size="7px" color="skyblue">

This is my Login page
<a href="{{route('login')}}"> Login</a>

</font>
</div><br><br><br>

<div align="center">

<font size="6px">
<u> Login with your credentials</u><br><br>

<form method="post" action="{{ route('accept-users') }}">
    @if(Session::has('success'))
        <div> {{ Session::get('success') }} 
            </div>
     @endif

    @if(Session::has('fail'))
        <div> {{ Session::get('fail') }} 
            </div>
     @endif

        @csrf
	<label>Enter Username</label>
        <p id="errormsg"><span>@error('username') {{ $message }} @enderror</span></p>
	<input type="text" name="username"><br><br>

	<label>Enter Password</label>
        <p id="errormsg"><span>@error('password') {{ $message }} @enderror</span></p>
	<input type="password" name="password"><br><br>

	<button type="submit" >Signin</button>
</form>

</font>
</div>

