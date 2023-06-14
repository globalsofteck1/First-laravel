<div>
   <h2>Link Pages</h2>
   <a href="{{route('dash')}}">Pages</a>
   <a href="{{route('go2roles')}}">Roles</a>
   <a href="{{route('go2users')}}">Users</a>
   <a href="{{route('go2posts')}}">Posts</a>
   <a href="{{route('report')}}">Report</a>
   <a href="{{route('marksheet')}}">Marksheet</a>
</div>

<div>
    <h2>Create Post</h2>
    <form action="{{route('crudepost.store')}}" method="post">
    @if(Session::has('success'))
        <div> {{ Session::get('success') }} 
            </div>
     @endif

    @if(Session::has('fail'))
        <div> {{ Session::get('fail') }} 
            </div>
     @endif

        @csrf

        <label for="">Title</label>
        <p id="errormsg"><span>@error('title') {{ $message }} @enderror</span></p>
        <input type="text" name="title" id=""><br>

        <label for="">Body</label>
        <p id="errormsg"><span>@error('body') {{ $message }} @enderror</span></p>
        <input type="text" name="body" id=""><br>

        <label for="">Title Id</label>
        <p id="errormsg"><span>@error('titleid') {{ $message }} @enderror</span></p>
        <input type="text" name="titleid" id=""><br>

        <button type="submit">Save Post</button>

    </form>
</div>

<div align="center">
      <table border="1">
        <tr>
            <th>ID</th>
            <th>Title ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Tools</th>
        </tr>
        @foreach($myposts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->titleid}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td> View  Edit
                    <form action="{{ route('crudepost.destroy',  $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete" onclick="return confirm('Are you sure to delete this Post?')">Delete</button>
                    </form>
            </td>
        </tr>
        @endforeach
      </table>
</div>
