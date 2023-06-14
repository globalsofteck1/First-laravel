
@extends('layout.app')

<div>
    <form action="{{ route('impo-marks') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="label">Import Student Marks</label><br>
        <input type="file" name="marksfile" id="marksfile"><br>
        <button type="submit">Save marks</button>

        <hr>
        <p>Download Student Marks</p>
        <a href="{{ route('expo-marks') }}">Download Marks</a>
    </form>
</div>
<div>
    <?php
    $count = 0;
    if (count($usecredentials) > 0) {
        ?>
        <form action="{{ route('crudemarks.store') }}" method="post">
            @if(Session::has('success'))
                <div>{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('fail'))
                <div>{{ Session::get('fail') }}</div>
            @endif

            @csrf
            <!---- Count the number of selected name and the total number of names available----->
            <p>
                Number of names selected: 
                    <span id="selected-count">0</span> /
                    Selected row: <span id="selected-row">1</span> /
                Total number of names: 
                    <span id="total-count">{{ count($usecredentials) }}</span>
            </p>

            <label for="label">Subject</label>
            <select name="subjectid" id="subjectid" onchange="updateTopicId()">
                   <option value="">---select---</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subjectname }}</option>
                @endforeach
            </select>


           <input type="text" name="chapterid" id="topicid" value="" readonly>
           <!-- Add the hidden input field for topic ID -->
            <label for="label">Topic</label>
            <select name="chapterid" id="setTopic" onchange="storeTopicId()">
                   <option value="">select topic</option>
            </select>


            <label for="label">Marked Outof</label>
            <select name="outof" id="outof">
                <option value="30">30</option>
                <option value="60">60</option>
                <option value="100">100</option>
            </select>

            <label for="label">Student Name</label>
            <select name="studname" id="studname" onchange="updateUserId()">
                @foreach($usecredentials as $info)
                    <option value="{{ $info->fullname }}">{{ $info->fullname }}</option>
                @endforeach
            </select>

            <label for="label">Student ID</label>
            <select name="userid" id="userid">
                @foreach($usecredentials as $info)
                    <option value="{{ $info->userid }}">{{ $info->userid }}</option>
                @endforeach
            </select>

            <label for="label">Enter Marks </label> 
            <p id="errormsg"><span>@error('marks') {{ $message }} @enderror</span></p>
            <input type="text" name="marks" id="marks" onkeyup="cal_score(this.value);">
            <p id="error-message"></p>

            <label for="label">Score</label>
            <p id="errormsg"><span>@error('score') {{ $message }} @enderror</span></p>
            <input type="text" name="score" id="score" readonly>

            <label for="label">Descriptor</label>
            <input type="text" name="desc" id="desc" placeholder="Descriptor One" readonly>

            <label for="label">Enter Competency</label>
            <input type="text" name="comp1" id="" placeholder="Competency One">

            <label for="label">Generic skills</label>
            <input type="text" name="skills" id="" placeholder="Generic skills">

            <label for="label">Teachers Remarks</label>
            <input type="text" name="remarks" id="" placeholder="Teachers Remarks">

            <button type="submit">Save Marks</button>
        </form>
    <?php } ?>
</div>

<div>

    <h3>Show all students marks</h3>
    <table border="2">
        <thead>
            <tr>
                <th>No:</th>
                <th>Student Name</th>
                <th>Student Id</th>
                <th>Marks</th>
                <th>Score</th>
                <th>Actions</th>
            </tr>
        </thead>
    @foreach($profilemarksheet as $info)
        <tbody>
            <tr>
                <td><?php echo $count += 1;?></td>
                <td>{{ $info->fullname }}</td>
                <td>{{ $info->userid }}</td>
                <td>{{ $info->marks }}</td>
                <td>{{ $info->score}}</td>
                <td>
                    <label for="label">
                        Update
                    </label>
                </td>
            </tr>
        </tbody>
    @endforeach
    </table>
</div>

<h2>
    Some texts in a label are hidden here <label for="label" id="hidden-label">Hidden texts</label>
</h2>


<script>
      var topics = {!! json_encode($topics) !!}; // Convert PHP array to JavaScript object

    function updateTopicId() {
    var selectedSubject = document.getElementById("subjectid").value;
    var topicSelect = document.getElementById("setTopic");
    topicSelect.innerHTML = "";   

    var topicIdInput = document.getElementById("topicid");
    topicIdInput.value = ""; // Clear the topic ID

    // Add a default value before selecting the the topic 
    var defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "select topic";
        topicSelect.appendChild(defaultOption);

    for (var i = 0; i <= topics.length; i++) {
        if (topics[i].subjectid === selectedSubject) {
            var option = document.createElement("option");
            option.value = topics[i].topicid;
            option.textContent = topics[i].topicname;
            topicSelect.appendChild(option);
        }
    }
}

function storeTopicId() {
    var selectedTopicId = document.getElementById('setTopic').value;
    document.getElementById('topicid').value = selectedTopicId;
}




//<!------- Handle the user calculation field when the user feed in marks to each chaptor ---->

    var x, y, d1, d2, d3, error, error1;

    function cal_score(value) {
        // Get the selected value of "outof"
        var outof = parseInt(document.getElementById("outof").value);
    x = value / outof * 3;
    var floatx = x.toFixed(1);

    d1 = "Basic";
    d2 = "Moderate";
    d3 = "Outstanding";
    error = "Score below the range!!";
    error1 = "Score out of range!!";


    document.getElementById('score').value = floatx;

    if (x < 0.5) {
        document.getElementById('error-message').textContent = error;
        document.getElementById('score').value = "";
    } else if (x >= 0.5 && x <= 1.49) {
        document.getElementById('desc').value = d1;
        document.getElementById('error-message').textContent = "";
    } else if (x > 1.49 && x <= 2.49) {
        document.getElementById('desc').value = d2;
        document.getElementById('error-message').textContent = "";
    } else if (x > 2.49 && x <= 3) {
        document.getElementById('desc').value = d3;
        document.getElementById('error-message').textContent = "";
    } else {
        document.getElementById('error-message').textContent = error1;
        document.getElementById('desc').value = "";
        document.getElementById('score').value = "";
    }
       /// Check the performance and give the remarks
}


//<!------- Update the user id field when the user selectes the name to feed m,arks ---->


    var names = {!! json_encode($usecredentials) !!}; // Convert PHP array to JavaScript object

    function updateUserId() {
        var selectedName = document.getElementById("studname").value;
        var userIdInput = document.getElementById("userid");

        // Find the matching user ID based on the selected name
        var selectedUser = names.find(function(user) {
            return user.fullname === selectedName;
        });

        // Update the value of the Student ID field
        if (selectedUser) {
            userIdInput.value = selectedUser.userid;
        } else {
            userIdInput.value = ""; // Clear the value if no match is found
        }

        var totalNames = names.length;
        var selectedNames = document.querySelectorAll("#studname option:checked").length;
        var rowIndex = names.findIndex(function(user) {
            return user.fullname === selectedName;
        });

        document.getElementById("selected-count").textContent = selectedNames;
        document.getElementById("total-count").textContent = totalNames;
        document.getElementById("selected-row").textContent = rowIndex + 1;
    }
</script>
