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
</div>

<div align="center">







<div>
    <h2>Create New Users</h2>
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

        <label for="">User Type</label>
        <p id="errormsg"><span>@error('usertype') {{ $message }} @enderror</span></p>
        <input type="text" name="usertype" id=""><br>

        <label for="">Password</label>
        <p id="errormsg"><span>@error('password') {{ $message }} @enderror</span></p>
        <input type="password" name="password" id=""><br>

        <button type="submit">Save Users</button>

    </form>
</div>

<div> 
    <h2>View Users</h2>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>User Type</th
                <th>Status</th>
                <th>Attendant Id</th>
                <th>Account Id</th>
                <th>Tools</th>
            </tr>
        </thead>
        @foreach($user as $credentials)
           <tr>
               <td>{{ $credentials ->id }}</td>
               <td>{{ $credentials ->username }}</td>
               <td>{{ $credentials ->usertype }}</td>
               <td>{{ $credentials ->authstatus }}</td>
               <td>{{ $credentials ->attendantid }}</td>
               <td>{{ $credentials ->accountid }}</td>
               <td>
                View
                Edit
                    <form action="{{ route('crudeuser.destroy',  $credentials->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete" onclick="return confirm('Are you sure to delete this User?')">Delete</button>
                    </form>

               </td>
           </tr>
        @endforeach
    </table>
</div>


<!--@include('dash.students')-->
