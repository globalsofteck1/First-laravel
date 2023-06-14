



<div id="content">
    <table id="results-table">
        <thead><input type="search" name="keyword" id="searchbox" placeholder="Search..."></thead>
        <tbody>
            <div id="results">

            </div>
        </tbody>
    </table>
</div>

<div>
@foreach ($results as $result)
    <tr>
        <td>{{ $result->id }}</td>
        <td>{{ $result->title }}</td>
        <td>{{ $result->body }}</td>
    </tr>
@endforeach

</div>

<script>
    $()document
.ready(function(){
    var typingTimer;
    var doneTypingInterval = 100;

    $("#searchbox").on('keyup', function(){
        clearTimeout(typingTimer);
        if($('#searchbox').val(){
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        })
    });
});
    // user is finished typing
    function doneTyping(){
        var key = $('#searchbox').val();

        if(key.length >= 3){
            $.ajax({
                url: '/categorysearch/' + key,
                type: 'GET',
                beforeSend: function(){
                    $("#results").slideUp('fast');

                },
                success: function(data){
                    $("#results").html(data);
                    $("#results").slideDown('fast');
                }
            });
        }
    }
</script>


</body>
</html>