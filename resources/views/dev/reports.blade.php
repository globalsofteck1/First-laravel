
@extends('layout.app')
@section('content')
    <div class="container">

         <div class="container">
            <table border="0" class="w3-table w3-small w3-center">
               <thead>
                   <tr>
                       <th rowspan="3">
                        <div class="w3-padding w3-margin">
                             <img src="nff.jpg" alt="Logo" srcset="">
                        </div>
                       </th>
                       <th colspan="4" class="w3-teal">
                         <h2 id="reportitle"><b>
                               SCHOOL MANAGING DASHBOARD
                              </b>
                         </h2>
                     </th>
                   </tr>
                   <tr>
                       <th colspan="2">P.O.BOX 12345 KAMPALA.</th>
                       <th>Phone: +256 755 XXXXXX</th>
                       <th></th>
                   </tr>
                   <tr>
                       <th colspan="2">Email: example@gmail.com.</th>
                       <th>Web: www.example.co.ug</th>
                       <th></th>
                   </tr>
               </thead>
               <tbody>
               </tbody>
            </table>
        </div>
        
        <div class="container">
            <h4 class="w3-center"><b>END OF TERM ASSESMENT REPORT</h4>
            <hr>
            
            

             <div class="w3-row">
               <div class="w3-col m7">
                      <label>
                        Student's Name: ____________________
                      </label>
               </div>
               <div class="w3-col m4 w3-center">
                      <label class="w3-right">Class: _____________</label>
               </div>
               <div class="w3-col m1 w3-center"></div>
             </div> 
            <hr>
        </div>


        <div class="container">
            <h3><b>Key words used/ Description of terms.</h3>
        </div>



         <div class="container">
            <table class="table table-bordered bordered-primary">
                <tr>
                    <td><b>Competency</b></td>
                    <td><b>The overall expected capability of a learner at the end of a topic, term or year, after being exposed to a  body of knowledge, skills and values.</b></td>
                </tr>
                <tr>
                    <td><b>Descritptor</td>
                    <td><b>Gives details on the extent to which the learner has achieved the stipulated learning outcomes in a given topic.</td>
                </tr>
                <tr>
                    <td><b>Generic Skills</td>
                    <td><b>These are higher order transferable soft skills that apply to the subjects and are commonly sought after in the 21st Century and the world of work.</td>
                </tr>
                <tr>
                    <td><b>Score</td>
                    <td><b>Refers to the average of the scores attained for the different learning outcomes that make up competency</td>
                </tr>
                <tr>
                    <td><b>Identifier</td>
                    <td><b>Is a label/grade thatt distinguishes learners according to their learning achievement of the set cometencies</td>
                </tr>
            </table>
        </div><br>
        
         <div class="container">
            <table class="table table-bordered">
                <thead class="table-dark w3-teal">
                    <tr>
                        <th>Subject</th>
                        <th>Chapter</th>
                        <th>Competency</th>
                        <th>Score</th>
                        <th>Descriptor</th>
                        <th>Generic skills</th>
                        <th>Teacher's Remarks</th>
                        <th>Initials</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="3">Math</td>
                        <td>Chapter one</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>Chapter two</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Chapter three</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td rowspan="2">Project</td>
                        <td colspan="2">Project Title</td>
                        <td colspan="5">Name of the project</td>
                    </tr>
                    <tr>
                        <td colspan="2">Remark</td>
                        <td colspan="5">The given remarks on the project did</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="container">
            <h3>Values Exhibited:  _______________________________________________________________</h3>
            <h3>Class teacher's comment:     _______________________________________________________________</h3>
<!-- Or let Bootstrap automatically handle the layout -->
        <div class="row">
            <div class="w3-col s4">
                   Name: ________________________
            </div>
            <div class="w3-col s4 w3-center">
                   Signature: _________________ 
            </div>
            <div class="w3-col s4 w3-center">
                    Date:  ____________________
            </div>
        </div>
              
            <hr>
             
            <h3>Head teacher's comment:   _______________________________________________________________</h3>
<!-- Or let Bootstrap automatically handle the layout -->
        <div class="row">
            <div class="w3-col s4">
                   Name: ___________________
            </div>
            <div class="w3-col s2">
                   Signature: _________
            </div>
            <div class="w3-col s2">
                    Date:  __________
            </div>
            <div class="w3-col s4">
                    Signiture & Stamp:  _______________
            </div>
        </div>
            <hr>
            <label>Next Term beging on: </label>
        </div>



@endsection
</div>