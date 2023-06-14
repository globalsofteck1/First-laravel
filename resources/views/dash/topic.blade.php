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
    <h2>Create Topic</h2>
    <form action="{{route('crudetopic.store')}}" method="post">
    @if(Session::has('success'))
        <div> {{ Session::get('success') }} 
            </div>
     @endif

    @if(Session::has('fail'))
        <div> {{ Session::get('fail') }} 
            </div>
     @endif

        @csrf

        <label for="">Topic Name</label>
        <p id="errormsg"><span>@error('topicname') {{ $message }} @enderror</span></p>
        <input type="text" name="topicname" id=""><br>

        <label for="subjectid">Subject:</label>
        <select id="subjectid" name="subjectid" required>
            @foreach ($subjects as $subject)
                 <option value="{{ $subject->id }}">{{ $subject->subjectname }}</option>
            @endforeach
        </select>

        <button type="submit">Save Topic</button>

    </form>
</div>

<div>
    <table border="2">
        <thead>
            <tr>
                <th>Topic ID</th>
                <th>Subject ID</th>
                <th>Topic Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $topic)
            <tr>
                <td>{{ $topic -> topicid}}</td>
                <td>{{ $topic -> subjectid}}</td>
                <td>{{ $topic -> topicname}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>