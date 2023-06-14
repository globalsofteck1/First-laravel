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




<div align="center">
    <h2>Create New Roles</h2>
    <form action="{{route('cruderoles.store')}}" method="post">
    @if(Session::has('success'))
        <div> {{ Session::get('success') }} 
            </div>
     @endif

    @if(Session::has('fail'))
        <div> {{ Session::get('fail') }} 
            </div>
     @endif

        @csrf
        <label for="">Roles</label>
        <p id="errormsg"><span>@error('type') {{ $message }} @enderror</span></p>
        <input type="text" name="type" id=""><br>


        <button type="submit">Save Roles</button>

    </form>
</div>



<div>
@if(Session::has('delete-role'))
        <div> {{ Session::get('delete-role') }} 
            </div>
     @endif

    <h2>Show Roles</h2>
        <table border="1">
            
                <thead>
                    <tr>
                        <th colspan="2">List of System Roles</th>
                        <th colspan="4">Actions</th>
                    </tr>
                </thead>
            
            <tr>
                <th>ID</th>
                <th>Role Type</th>
                <th>Permission</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($roles as $results)
              <tr>
                <th>{{ $results -> id }}</th>
                <td>{{ $results -> type }}</td>
                <td><a href=" {{ route('cruderoles.show', $results->id) }} "><button>Permission</button></a></td>
                <td><a href="#"><button>View</button></a></td>
                <td><a href=""><button>Edit</button></a></td>
                <td>
                    <form action="{{ route('cruderoles.destroy',  $results->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete" onclick="return confirm('Are you sure to delete this Role?')">Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach
        </table>
    </div>




