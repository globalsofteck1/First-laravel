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
    <h2>Create New Permissions</h2>
    @if(Session::has('permissionsuccess'))
        <div> {{ Session::get('permissionsuccess') }} 
            </div>
     @endif

    <form role="form" method="post" action="{{url('update-rolesperm-data')}}" 
          name="FORM" class="data-form" id="data-form" enctype="multipart/form-data">
   
    @csrf 

    <div class="form-groupy">
    <!--<label for="label">
      role ID
    </label>-->
        <div class="form-input-group"> 
            <input type="hidden" 
                required="" 
                name="mainroleid" 
                value="<?php echo $ShowRole['id'];?>" 
                readonly="readonly" 
                class="form-control"  
                placeholder="Role Id">
        </div>
    </div>

        <table class="table-container" 
  cellspacing="0" cellpadding="5" border="1">
            <thead>
                <tr>
                    <th scope="col" width="15%"><input id="checkandUncheck" class="formcontrol" type="checkbox"> Check all</th>
                    <th scope="col" width="15%">Pages</th>
                    <th scope="col" width="15%">Access</th>
                    <th scope="col" width="15%">Permissions</th>
                    <th scope="col" width="15%">Roles</th>
                </tr>
            </thead>
            <tbody>
               <?php 
                   $count = 0;
                      if(count($usepagesdata) > 0)
                      {

                           foreach($usepagesdata as $Info)
                            {                                             
                                  $count++;
               ?> 
                    <tr id="row<?php echo $count; ?>">
    <!---
    ######################################################################################
                           Work on chech all checkbox
    ######################################################################################
    --->
                        <td data-label="Check all">
                           <label for="label">
                                 <input class="selectedall" 
                                        data-rowid="row<?php echo $count; ?>" 
                                        type="checkbox" id="selectall"> Check All
                           </label>
                           <input type="hidden" name="perm_id[]"
                                  id="perm_id<?php echo $count; ?>" 
                                  value="<?php echo $Info->perm_id; ?>" />
                        </td>
    <!---
    ######################################################################################
                          Display all pages
    ######################################################################################
    --->
                        <td data-label="Page">
                            <div class="form-group wrapper_input_element">
                                <label for="label"><?php echo $Info->pagename; ?></label>
                                <input type="hidden"  class="form-control input_box"  
                                       name="pageid[]" id="pageid_<?php echo $count; ?>" 
                                       value="<?php echo $Info->page_id; ?>" />
                            </div>
                        </td>
    <!---
    ######################################################################################
                           Work on table data granted
    ######################################################################################
    --->
  
        <td data-label="Access">
            <label for="label">
                <input type="hidden"  class="selectedall"  
                      name="accesstatus[<?php echo $count; ?>]" 
                      id="accesstatus<?php echo $count; ?>" 
                      value="0" 

                <?php if($Info->accesstatus==1){ echo "checked"; } ?> />   
                <input type="checkbox"  class=""  
                       name="accesstatus[<?php echo $count; ?>]" 
                       id="accesstatus<?php echo $count; ?>" 
                       value="1" 
                <?php if($Info->accesstatus==1){ echo "checked"; } ?> /> Granted
            </label>
        </td>

    <!---
    ######################################################################################
                           Display permissions for the users
    ######################################################################################
    --->
        <td data-label="Permissions">
            <div class="flex div_labels">
                <label for="label">
                    <input type="hidden"  
                           class=""  
                           name="createstatus[<?php echo $count; ?>]"
                           id="createstatus_<?php echo $count; ?>" 
                           value="0" />  

                    <input type="checkbox"  
                           class=""  
                           name="createstatus[<?php echo $count; ?>]"
                           id="createstatus_<?php echo $count; ?>" 
                           value="1" <?php if($Info->createstatus==1){ echo "checked"; } ?> /> 
                             Add
                </label>
                <label for="label">
                    <input type="hidden"  
                           class=""  
                           name="editstatus[<?php echo $count; ?>]"
                           id="editstatus_<?php echo $count; ?>" 
                           value="0" /> 

                    <input type="checkbox"  
                           class=""  
                           name="editstatus[<?php echo $count; ?>]"
                           id="editstatus_<?php echo $count; ?>" 
                           value="1" <?php if($Info->editstatus==1){ echo "checked"; } ?> /> 
                              Edit
                </label>
                <label for="label">
                <input type="hidden"  
                       class=""  
                       name="deletestatus[<?php echo $count; ?>]"
                       id="deletestatus_<?php echo $count; ?>" 
                       value="0" /> 

                <input type="checkbox"  
                       class=""  
                       name="deletestatus[<?php echo $count; ?>]"
                       id="deletestatus_<?php echo $count; ?>" 
                       value="1" <?php if($Info->deletestatus==1){ echo "checked"; } ?> /> 
                               Delete
                </label>
                <label for="label">
                <input type="hidden"  
                       class=""  
                       name="viewstatus[<?php echo $count; ?>]"
                       id="viewstatus_<?php echo $count; ?>" 
                       value="0" /> 
<div>
                <input type="checkbox"  
                       class=""  
                       name="viewstatus[<?php echo $count; ?>]"
                       id="viewstatus_<?php echo $count; ?>" 
                       value="1" <?php if($Info->viewstatus==1){ echo "checked"; } ?> /> 
                               View
                </label>
            </div>
        </td>
    <!---
    ######################################################################################
                           Display the role
    ######################################################################################
    --->
        <td data-label="Role">
            <div class="form-group wrapper_input_element">
                <label for="label"><?php echo $ShowRole['type'];?></label>
                <input type="hidden"  class="form-control input_box"  name="roleid[]" 
                       id="roleid_<?php echo $count; ?>"  value="<?php echo $ShowRole['id']; ?>"/>
            </div>
        </td>
    </tr>
                   <?php 
                                } // Close foreach loop
                         }  // Close if statement above
                    ?>   
            </tbody>
        </table>



        <button type="submit">Save Permissions</button>

    </form>
</div>

<script>
$('#selectall').click(function() {
    $(this.form.elements).filter(':checkbox').prop('checked', this.checked);
});
</script>
</div>
