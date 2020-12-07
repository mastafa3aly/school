<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-mortar-board"></i> <?php echo $this->lang->line('academics'); ?> <small><?php echo $this->lang->line('student_fees1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    
                    </div>
                    <form action="<?php echo site_url('admin/timetable/classreport') ?>" method="post" accept-charset="utf-8">
                        <div class="box-body">

                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small>
                                        <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>" <?php
                                                if (set_value('class_id') == $class['id']) {
                                                    echo "selected=selected";
                                                }
                                                ?>><?php echo $class['class'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="req"> *</small>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right btn-sm" name="search"><?php echo $this->lang->line('search'); ?></button>
                       
                            <button type="submit" name="add"  class="btn btn-sm btn-primary" autocomplete="off"><i class="fa fa-plus"></i> Add</button>
                        </div>
                    </form>
<input type="hidden" name="class_id" id="class_id_value" value="<?php echo $class_id;?>">
                 
                        <div class="box-header ptbnull"></div>
                        <div class="box-body">
                        
                        
                            <div class="table-responsive">    
                            <form action="<?php echo site_url('admin/timetable/doaddtimeTable') ?>" method="post" accept-charset="utf-8">


                           
                            <input type="hidden" name="class_id"  value="<?php echo $class_id;?>">
                            <input type="hidden" name="section_id"  value="<?php echo $section_id;?>">
                                <table class="table table-stripped text-center">
                                    <thead>
                                    </thead>
                                    <tbody>
                                      
                                        <tr id="saturday">
                                            <td>Saturday</td>
                                        
                                            <td id="saturday_1">
                                              <i class="fa fa-minus-circle text-danger pull-right" aria-hidden="true" onclick="removesection('saturday_1')"></i><select  name="subject_id_saturday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($subjects as $subject):?>
                                            <option value="<?php echo $subject['id'] ?>" <?php if($subject['id']==$day->subject_id){echo 'selected';} ?>><?php echo $subject['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                            <input style='width:40%' type='text' name='saturday_time_from[]' > to <input style='width:40%' type='text' name='saturday_time_to[]'><br>
                                              <select  name="teacher_id_saturday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($staff as $teacher):?>
                                            <option value="<?php echo $teacher['id'] ?>" <?php if($teacher['id']==$day->teacher_id){echo 'selected';} ?>><?php echo $teacher['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                         </td>
                                            <td><a class="btn btn-info" id ="saturday_btn_1" onclick="addSection('saturday',1)"><i class="fa fa-plus-square" aria-hidden="true"></i> </a></td></tr>
                                     
                                        <tr id="sunday">
                                            <td>sunday</td>
                                       
                                                <td id="sunday_1">
                                              <i class="fa fa-minus-circle text-danger pull-right" aria-hidden="true" onclick="removesection('sunday_1')"></i><select  name="subject_id_sunday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($subjects as $subject):?>
                                            <option value="<?php echo $subject['id'] ?>"><?php echo $subject['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                           <input style='width:40%' type='text' name='sunday_time_from[]' > to <input style='width:40%' type='text' name='sunday_time_to[]' ><br>
                                              <select  name="teacher_id_sunday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($staff as $teacher):?>
                                            <option value="<?php echo $teacher['id'] ?>" ><?php echo $teacher['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                         </td>

                                            <td><a class="btn btn-info" id ="sunday_btn_1" onclick="addSection('sunday',1)"><i class="fa fa-plus-square" aria-hidden="true"></i> </a></td></tr>
                                      
                                        <tr id="monday">
                                            <td><?php //print_r(json_decode($table->monday)) ?>monday</td>
                                          
                                                <td id="monday_1">
                                              <i class="fa fa-minus-circle text-danger pull-right" aria-hidden="true" onclick="removesection('monday_1')"></i><select  name="subject_id_monday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($subjects as $subject):?>
                                            <option value="<?php echo $subject['id'] ?>" ><?php echo $subject['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                         <input style='width:40%' type='text' name='monday_time_from[]' > to <input style='width:40%' type='text' name='monday_time_to[]' ><br>
                                              <select  name="teacher_id_monday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($staff as $teacher):?>
                                            <option value="<?php echo $teacher['id'] ?>" <?php if($teacher['id']==$day->teacher_id){echo 'selected';} ?>><?php echo $teacher['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                         </td>
                                            <td><a class="btn btn-info" id ="monday_btn_1" onclick="addSection('monday',1)"><i class="fa fa-plus-square" aria-hidden="true"></i> </a> </td></tr>
                                      <tr id="tuesday">
                                            <td>tuesday</td>
                                       
                                                <td id="tuesday_1">
                                              <i class="fa fa-minus-circle text-danger pull-right" aria-hidden="true" onclick="removesection('tuesday_1')"></i><select  name="subject_id_tuesday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($subjects as $subject):?>
                                            <option value="<?php echo $subject['id'] ?>" ><?php echo $subject['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                            <input style='width:40%' type='text' name='tuesday_time_from[]' > to <input style='width:40%' type='text' name='tuesday_time_to[]' ><br>
                                              <select  name="tuesday_teacher_id[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($staff as $teacher):?>
                                            <option value="<?php echo $teacher['id'] ?>" ><?php echo $teacher['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                         </td>
                                          
                                            <td><a class="btn btn-info"  id ="tuesday_btn_1" onclick="addSection('tuesday',1)"><i class="fa fa-plus-square" aria-hidden="true"></i> </a>  </td></tr>
                                     <tr id="wedneday">
                                            <td>wedneday</td>
                                        
                                                <td id="wedneday_1">
                                              <i class="fa fa-minus-circle text-danger pull-right" aria-hidden="true" onclick="removesection('wedneday_1')"></i><select  name="subject_id_wedneday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($subjects as $subject):?>
                                            <option value="<?php echo $subject['id'] ?>" <?php if($subject['id']==$day->subject_id){echo 'selected';} ?>><?php echo $subject['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                           <input style='width:40%' type='text' name='wedneday_time_from[]' > to <input style='width:40%' type='text' name='wedneday_time_to[]' ><br> <select  name="teacher_id_wedneday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($staff as $teacher):?>
                                            <option value="<?php echo $teacher['id'] ?>" <?php if($teacher['id']==$day->teacher_id){echo 'selected';} ?>><?php echo $teacher['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                         </td>
                                            <td><a class="btn btn-info" id ="wedneday_btn_1" onclick="addSection('wedneday',1)"><i class="fa fa-plus-square" aria-hidden="true"></i> </a></td></tr>
                                      
                                        <tr id="thursday">
                                            <td>thursday</td>
                                
                                                <td id="thursday_1">
                                              <i class="fa fa-minus-circle text-danger pull-right" aria-hidden="true" onclick="removesection('thursday_1')"></i><select  name="subject_id_thursday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($subjects as $subject):?>
                                            <option value="<?php echo $subject['id'] ?>" <?php if($subject['id']==$day->subject_id){echo 'selected';} ?>><?php echo $subject['name'] ?></option>
                                            <?php endforeach;?>
                                            </select><input style='width:40%' type='text' name='thursday_time_from[]' > to <input style='width:40%' type='text' name='thursday_time_to[]' ><br>
                                        
                                              <select  name="teacher_id_thursday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($staff as $teacher):?>
                                            <option value="<?php echo $teacher['id'] ?>" <?php if($teacher['id']==$day->teacher_id){echo 'selected';} ?>><?php echo $teacher['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                         </td>
                                            <td><a class="btn btn-info"  id ="thursday_btn_1" onclick="addSection('thursday',1)"><i class="fa fa-plus-square" aria-hidden="true"></i> </a></td></tr>                                     <tr id="friday">
                                            <td>friday</td>
                                                <td id="friday_1">
                                                    <i class="fa fa-minus-circle text-danger pull-right" aria-hidden="true" onclick="removesection('friday_1')"></i><select  name="subject_id_friday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($subjects as $subject):?>
                                            <option value="<?php echo $subject['id'] ?>" ><?php echo $subject['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                           <input style='width:40%' type='text' name='friday_time_from[]' > to <input style='width:40%' type='text' name='friday_time_to[]' ><br>
                                              <select  name="teacher_id_friday[]" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php foreach($staff as $teacher):?>
                                            <option value="<?php echo $teacher['id'] ?>" ><?php echo $teacher['name'] ?></option>
                                            <?php endforeach;?>
                                            </select>
                                         </td>
                                            <td><a class="btn btn-info"  id ="friday_btn_1" onclick="addSection('friday',1)"><i class="fa fa-plus-square" aria-hidden="true"></i></button> </td></tr>   
                                         </tr> 
                                    
                                    </tbody>
                                </table>
                                <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right btn-sm" name="submit"><?php echo $this->lang->line('submit'); ?></button>
                        </div>
                    </form>
                              </div>  
                            

                        </div>
                    </div>
                </div>   
                <?php
            
            ?>


    </section>
</div>


<script type="text/javascript">
    $(document).on('focus', '.time', function () {
        var $this = $(this);
        $this.datetimepicker({
            format: 'LT'
        });
    });
    var tot_count = 0;
    var class_id = $('#class_id').val();
    var section_id = '<?php echo set_value('section_id') ?>';
    var subject_group_id = '<?php echo set_value('subject_group_id') ?>';
    $(document).ready(function () {

        $('#myTabs a:first').tab('show') // Select first tab
        getSectionByClass(class_id, section_id);
        getGroupByClassandSection(class_id, section_id, subject_group_id);

        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                    });

                    $('#section_id').append(div_data);
                }
            });
        });

        $(document).on('change', '#section_id', function (e) {
            $('#subject_group_id').html("");
            var section_id = $(this).val();
            var class_id = $('#class_id').val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "POST",
                url: base_url + "admin/subjectgroup/getGroupByClassandSection",
                data: {'class_id': class_id, 'section_id': section_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.subject_group_id + ">" + obj.name + "</option>";
                    });

                    $('#subject_group_id').append(div_data);
                }
            });
        });
    });



    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }


    function getGroupByClassandSection(class_id, section_id, subject_group_id) {
        if (class_id != "" && section_id != "" && subject_group_id != "") {
            $('#subject_group_id').html("");

            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "POST",
                url: base_url + "admin/subjectgroup/getGroupByClassandSection",
                data: {'class_id': class_id, 'section_id': section_id},
                dataType: "json",
                success: function (data) {
                    console.log(subject_group_id);
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (subject_group_id == obj.subject_group_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.subject_group_id + " " + sel + ">" + obj.name + "</option>";
                    });

                    $('#subject_group_id').append(div_data);
                }
            });

        }

    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {


        var target = $(e.target).attr("href"); // activated tab
        var target_id = $(e.target).attr("id"); // activated tab
        var ajax_data = $(e.target).data(); // activated tab
        $(target).html("");
        getGroupdata(target, target_id, ajax_data);
    })

    function removesection(id) {
        document.getElementById(id).replaceWith('');
    }
    function addSection(id,number) {
        var new_number = parseInt(number)+1;
        var class_id = $("#class_id_value").val();
        var div_subject = '';
        var div_staff = '';
        var td='<td id="'+id+'_'+new_number+'"><i class="fa fa-minus-circle text-danger pull-right" aria-hidden="true" onclick="removesection(\''+id+'_'+new_number+'\')"></i><select id="subject_id_'+id+'_'+new_number+'" name="subject_id_'+id+'[]" class="form-control" >'+
                                           '<option value="">select</option>'+
                                            '</select><input style="width:40%" type="text" name="'+id+'_time_from[]" > to <input style="width:40%" type="text" name="'+id+'_time_to[]" ><br>'+
                                              '<select id="staff_id_'+id+'_'+new_number+'" name="teacher_id_'+id+'[]" class="form-control" ><option value="">select</option>'+
                                            
                                            '</select>';
        $("#"+id).append(td);
        $("#"+id+"_btn_"+number).replaceWith('<a class="btn btn-info" id ="'+id+'_btn_'+new_number+'" onclick="addSection(\''+id+'\','+new_number+')"><i class="fa fa-plus-square" aria-hidden="true"></i> </a>');

        $.ajax({
                type: "GET",
                url: base_url + "admin/timetable/getClassSubjects/"+class_id,
                data: {},
                dataType: "json",
                success: function (data) {
                    $.each(data.subject, function (i, obj)
                    {
                
                        div_subject += "<option value=" + obj.id + ">" + obj.name + "</option>";
                    });
                    $.each(data.staff, function (i, obj)
                    {
                        div_staff += "<option value=" + obj.id + ">" + obj.name + "</option>";
              
                    });

                    $('#subject_id_'+id+'_'+new_number).append(div_subject);
                    $('#staff_id_'+id+'_'+new_number).append(div_staff);
                }
            });
    
    }
    function getGroupdata(target, target_id, ajax_data) {

        $.ajax({
            type: 'POST',
            url: base_url + "admin/timetable/getBydategroupclasssection",
            data: {'day': ajax_data.day, 'class_id': ajax_data.c, 'section_id': ajax_data.s, 'subject_group_id': ajax_data.group},
            dataType: 'json',
            beforeSend: function () {
                $(target).addClass('show');
            },
            success: function (data) {
                $(target).html(data.html);

                $('.staff', target).select2({
                    dropdownAutoWidth: true,
                    width: '100%'
                });
                $('.subject', target).select2({
                    dropdownAutoWidth: true,
                    width: '100%'
                });
                tot_count = data.total_count + 1;
            },
            error: function (xhr) { // if error occured

            },
            complete: function () {
                $(target).removeClass('show');
            }
        });
    }


    $(document).ready(function () {
        var counter = 0;

        $(document).on("click", ".addrow", function () {

            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input type="hidden" name="total_row[]" value="' + tot_count + '"><input type="hidden" name="prev_id_' + tot_count + '" value="0"><select class="form-control subject" id="subject_id_' + tot_count + '" name="subject_' + tot_count + '">' + $("#subject_dropdown").text() + '</select></td>';
            cols += '<td><select class="form-control staff" id="staff_id_' + tot_count + '" name="staff_' + tot_count + '">' + $("#staff_dropdown").text() + '</select></td>';

            cols += '<td><div class="input-group"><input type="text" name="time_from_' + tot_count + '" class="form-control time_from time" id="time_from_' + tot_count + '"  aria-invalid="false"><div class="input-group-addon"><span class="glyphicon glyphicon-dashboard"></span></div></div></td>';

            cols += '<td><div class="input-group"><input type="text" name="time_to_' + tot_count + '" class="form-control time_to time" id="time_to_' + tot_count + '"  aria-invalid="false"><div class="input-group-addon"><span class="glyphicon glyphicon-dashboard"></span></div></div></td>';

            cols += '<td><input type="text" class="form-control room_no" name="room_no_' + tot_count + '" id="room_no_' + tot_count + '"/></td>';
            cols += '<td><button type="button" class="ibtnDel btn btn-danger btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>';
            newRow.append(cols);

            $("table.order-list").append(newRow);


            $('.staff', newRow).select2({
                dropdownAutoWidth: true,
                width: '100%'
            });

            $('.subject', newRow).select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
            tot_count++;
        });



        $(document).on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });



        $(document).on('click', '.submit_subject_group', function () {
            var form_id = $(this).closest("form").attr('id');
            var target = $('.nav-tabs .active a').attr("href"); // activated tab
            var target_id = $('.nav-tabs .active a').attr("id"); // activated tab
            var ajax_data = $('.nav-tabs .active a').data(); // activated tab

        });

    });




</script>


<script type="text/template" id="staff_dropdown">
    <option value=""><?php echo $this->lang->line('select') ?></option>
    <?php
    foreach ($staff as $staff_key => $staff_value) {
        ?>
        <option value="<?php echo $staff_value['id']; ?>"><?php echo $staff_value['name'] . " " . $staff_value['surname'] . " (" . $staff_value['employee_id'] . ")"; ?></option>
        <?php
    }
    ?>
</script>

<script type="text/template" id="subject_dropdown">
    <option value=""><?php echo $this->lang->line('select') ?></option>
    <?php
    foreach ($subject as $subject_key => $subject_value) {
        ?>
        <option value="<?php echo $subject_value->id; ?>" ><?php echo $subject_value->name . " (" . $subject_value->code . ")"; ?></option>
        <?php
    }
    ?>
</script>