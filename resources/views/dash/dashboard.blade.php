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

<?php
      if (Auth::guard('guardsadmins'))
      {
        echo "You aer welcome  : "; echo Auth::guard('guardsadmins')->user()-> username;
      }
?>
<div>
   <h2>Link Pages</h2>
   <a href="{{route('dash')}}">Pages</a>
   <a href="{{route('go2roles')}}">Roles</a>
   <a href="{{route('go2users')}}">Users</a>
   <a href="{{route('go2posts')}}">Posts</a>
   <a href="{{route('go2profile')}}">Register User</a>
   <a href="{{route('go2subject')}}">Create Subject</a>
   <a href="{{route('go2topic')}}">Create Topic</a>
</div>

<div align="center">

<div align="center">
    <h2>Create New Pages</h2>
    <form action="{{route('crudepages.store')}}" method="post">
    @if(Session::has('success'))
        <div> {{ Session::get('success') }} 
            </div>
     @endif

    @if(Session::has('fail'))
        <div> {{ Session::get('fail') }} 
            </div>
     @endif

        @csrf

        <label for="">Page Name</label>
        <p id="errormsg"><span>@error('pagename') {{ $message }} @enderror</span></p>
        <input type="text" name="pagename" id=""><br>

        <button type="submit">Save Page</button>

    </form>

    </div>
    
    <div>
    <h2>Show Pages</h2>
        <table border="1">
            
                <thead>
                    <tr>
                        <th>List of Pages</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
            
            <tr>
                <th>Page Id</th>
                <th>Page Names</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($pages as $listedpages)
              <tr>
                <td>{{ $listedpages -> id }}</td>
                <td>{{ $listedpages -> pagename }}</td>
                <td><a href="#"><button>View</button></a></td>
                <td><a href=""><button>Edit</button></a></td>
                <td>
                    <form action="{{ route('crudepages.destroy',  $listedpages->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete" onclick="return confirm('Are you sure to delete this Page?')">Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach
        </table>
    </div>

