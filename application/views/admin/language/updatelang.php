<style type="text/css">
    .material-switch > input[type="checkbox"] {
        display: none;   
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative; 
        width: 40px;  
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position:absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }
    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
    .table .pull-right {text-align: initial; width: auto}
    .alert-warning{ overflow: hidden;text-overflow: ellipsis;}
</style>
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-gears"></i> <?php echo $this->lang->line('system_settings'); ?><small><?php echo $this->lang->line('setting1'); ?></small>        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-language"></i> <?php echo $this->lang->line('language_list'); ?></h3>

                        <div class="box-tools pull-right">
                            <div class="box-tools pull-right">
                          
                            </div>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- <div class="alert alert-warning">
                            To change language key phrases, go your language directory e.g. for English language go edit file  /application/language/English/app_files/system_lang.php
                        </div> -->
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <?php echo $this->session->flashdata('msg') ?>
                        <?php } ?>
                        <div class="table-responsive mailbox-messages text-center">
                        <form role="form"  action="<?php echo site_url('admin/language/editlang')    ?>" class="" method="post">
                 <input type="hidden" name="lang_id" value="<?php echo $lang_id?>">
                        <?php
                        foreach($content as $key=>$val):?>
                                    <div class="row form-group">
                                    <div class="col-md-5">
                                    <input type="text"  class="form-control" name="langkey[]" value="<?php echo $key; ?>">
                                    </div>
                                    <div class="col-md-5">
                                    <input type="text" class="form-control" name="langval[]" value="<?php echo $val; ?>">
                                    </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="row form-group" id="emptyrow">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2"><span class="btn btn-info" onclick="addnewrow(1)" id="btn_1"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?></span></div>
                                </div>
                                <div id="row_n_1"> 
                                 </div>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save')?></button>
                                </form>
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="mailbox-controls">
                        </div>
                    </div>
                </div>
            </div>
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div>
<script type="text/javascript">
function addnewrow(n){
    var new_n=n+1;
    var row='<div  class="row form-group" id="row_n_'+new_n+'"><div class="col-md-5"><input type="text" name="langkey[]" class="form-control"></div><div class="col-md-5"><input class="form-control" type="text" name="langval[]"></div><div class="col-md-2"><span class="btn btn-info" id="btn_'+new_n+'" onclick="addnewrow('+new_n+')"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?></span></div></div>';
    if(n==1){
        $("#emptyrow").hide();
    }else{
        $("#btn_"+n).replaceWith('<span class="btn btn-danger" id="btn_'+n+'" onclick="deleterow('+n+')"> <i class="fa fa-minus"></i> <?php echo $this->lang->line('remove'); ?></span>');
    }
    $('#row_n_1').append(row);
}
function deleterow(n){
 
    $('#row_n_'+n).replaceWith('');
}
    $(document).ready(function () {
        var onload=  $('#languageSwitcher').val();
      //load();
        $(document).on('click', '.chk', function () {
            var checked = $(this).is(':checked');
           
            var rowid = $(this).data('rowid');
            var role = $(this).data('role');
            var confirm_msg='<?php echo $this->lang->line('confirm_msg') ?>';
           
            if (checked) {

                if (!confirm(confirm_msg)) {
                    $(this).removeAttr('checked');

                } else {
                    var status = "yes";

                    if(role=='2'){
                        changeStatusselect(rowid);
                    }else{
                        changeStatusunselect(rowid);
                    }

                }

            } else if (!confirm(confirm_msg)) {

                $(this).prop("checked", true);
            } else {
                
                var status = "no";
                if(role=='2'){
                        changeStatusselect(rowid);
                    }else{
                        changeStatusunselect(rowid);
                    }

            }
        });
    });

    function changeStatusselect(rowid) {

        var base_url = '<?php echo base_url() ?>';

        $.ajax({
            type: "POST",
            url: base_url + "admin/language/select_language/"+rowid,
            data: {},
            
            success: function (data) {
                successMsg("Status Change Successfully");
              $('#languageSwitcher').html(data);
             
               window.location.reload('true');
            }

        });
    }

    function changeStatusunselect(rowid) {

 
        var base_url = '<?php echo base_url() ?>';

        $.ajax({
            type: "POST",
            url: base_url + "admin/language/unselect_language/"+rowid,
            data: {},
           
            success: function (data) {

               successMsg("Status Change Successfully");
               window.location.reload('true');
           }
        });
    }


function load(){
 $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/language/onloadlanguage',
        data: {},
        //dataType: "json",
        success: function (data) {
           window.location.reload('true');
          
        }
        });
}

    function defoult(id){
        $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>admin/language/defoult_language/'+id,
        data: {},
        //dataType: "json",
        success: function (data) {
           window.location.reload('true');
          
        }
        });
    }

</script>