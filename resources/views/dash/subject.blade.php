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
    <h2>Create Subjects</h2>
    <form action="{{route('crudesubject.store')}}" method="post">
    @if(Session::has('success'))
        <div> {{ Session::get('success') }} 
            </div>
     @endif

    @if(Session::has('fail'))
        <div> {{ Session::get('fail') }} 
            </div>
     @endif

        @csrf

        <label for="">Subject Name</label>
        <p id="errormsg"><span>@error('subjectname') {{ $message }} @enderror</span></p>
        <input type="text" name="subjectname" id=""><br>

        <button type="submit">Save Subject</button>

    </form>
</div>

<div>
    <table border="2">
        <thead>
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Subject Teacher</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subject as $sub)
            <tr>
                <td>{{ $sub -> subjectid}}</td>
                <td>{{ $sub -> subjectname}}</td>
                <td>Teacher's name</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>