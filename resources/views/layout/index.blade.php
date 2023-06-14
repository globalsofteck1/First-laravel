

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">@</span>
    </div>
    <input type="text" class="form-control" placeholder="Username">
  </div>

<div align="center">

<font size="7px" color="skyblue">

This is my Main page
<a href="{{route('login')}}"> Login</a>

</font>
</div>
<div align="center">
    <h2>Register Users</h2>
    <form action="{{route('crudeuser.store')}}" method="post">
    @if(Session::has('success'))
        <div> {{ Session::get('success') }} 
            </div>
     @endif

    @if(Session::has('fail'))
        <div> {{ Session::get('fail') }} 
            </div>
     @endif

        @csrf

        <label for="">Username</label>
        <p id="errormsg"><span>@error('username') {{ $message }} @enderror</span></p>
        <input type="text" name="username" id=""><br>

        <label for="">Email</label>
        <p id="errormsg"><span>@error('email') {{ $message }} @enderror</span></p>
        <input type="text" name="email" id=""><br>

        <label for="">User Type</label>
        <p id="errormsg"><span>@error('usertype') {{ $message }} @enderror</span></p>
        <input type="text" name="usertype" id=""><br>

        <label for="">Password</label>
        <p id="errormsg"><span>@error('password') {{ $message }} @enderror</span></p>
        <input type="password" name="password" id=""><br>

        <button type="submit">Save Users</button>

    </form>
</div>

