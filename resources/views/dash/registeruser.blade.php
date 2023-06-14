<div align="center">

<font size="7px" color="skyblue">

This is my Dashboard page
<a href="{{route('dash')}}">Dashboard</a>
<a href="{{route('about')}}">About</a>
<a href="{{route('main')}}">Home</a>
<a href="{{route('contact')}}">Contact</a>
<a href="{{route('sign-out')}}"> Sign out</a>

</font>
</div><br><br><br>

<div>
   <h2>Link Pages</h2>
   <a href="{{route('dash')}}">Pages</a>
   <a href="{{route('go2roles')}}">Roles</a>
   <a href="{{route('go2users')}}">Users</a>
   <a href="{{route('go2posts')}}">Posts</a>
   <a href="{{route('go2profile')}}">Register User</a>
</div>

<div align="center">







<div>
    <h2>Register Users</h2>
    <form action="{{route('crudeprofile.store')}}" method="post">
    @if(Session::has('success'))
        <div> {{ Session::get('success') }} 
            </div>
     @endif

    @if(Session::has('fail'))
        <div> {{ Session::get('fail') }} 
            </div>
     @endif

        @csrf

        <label for="">Full Name</label>
        <p id="errormsg"><span>@error('fullname') {{ $message }} @enderror</span></p>
        <input type="text" name="fullname" id=""><br>

        <label for="">Address</label>
        <p id="errormsg"><span>@error('address') {{ $message }} @enderror</span></p>
        <input type="text" name="address" id=""><br>

        <label for="">Care Of</label>
        <p id="errormsg"><span>@error('careof') {{ $message }} @enderror</span></p>
        <input type="text" name="careof" id=""><br>

        <label for="">Contact</label>
        <p id="errormsg"><span>@error('contact') {{ $message }} @enderror</span></p>
        <input type="text" name="contact" id=""><br>

        <label for="">Email</label>
        <p id="errormsg"><span>@error('email') {{ $message }} @enderror</span></p>
        <input type="text" name="email" id=""><br>

        <label for="">User id</label>
        <p id="errormsg"><span>@error('userid') {{ $message }} @enderror</span></p>
        <input type="text" name="userid" id=""><br>

        <label for="">Class and Stream</label>
        <p id="errormsg"><span>@error('class') {{ $message }} @enderror</span></p>
        <input type="text" name="class" id=""><br>

        <label for="">Salary</label>
        <p id="errormsg"><span>@error('payments') {{ $message }} @enderror</span></p>
        <input type="text" name="payments" id=""><br>

        <label for="">Initials</label>
        <p id="errormsg"><span>@error('initials') {{ $message }} @enderror</span></p>
        <input type="text" name="initials" id=""><br>

        <label for="">Photo</label>
        <p id="errormsg"><span>@error('photo') {{ $message }} @enderror</span></p>
        <input type="text" name="photo" id=""><br>

        <label for="">Sign</label>
        <p id="errormsg"><span>@error('sign') {{ $message }} @enderror</span></p>
        <input type="text" name="sign" id=""><br>

        <button type="submit">Register Users</button>

    </form>
</div>

<div>
    <table border="2">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Care Of</th>
                <th>Contact</th>
                <th>Email</th>
                <th>User ID</th>
                <th>Class Stream</th>
                <th>Salary</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $userprofile as $profile)
            <tr>
                <td>{{ $profile -> id }}</td>
                <td>{{ $profile -> fullname }}</td>
                <td>{{ $profile -> address }}</td>
                <td>{{ $profile -> careof }}</td>
                <td>{{ $profile -> contact }}</td>
                <td>{{ $profile -> email }}</td>
                <td>{{ $profile -> userid }}</td>
                <td>{{ $profile -> class }}</td>
                <td>{{ $profile -> payments }}</td>
                <td>{{ $profile -> photo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>