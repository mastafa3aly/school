<?php
$theme = $this->customlib->getCurrentTheme();

if ($this->customlib->getRTL() != "") {
    if ($theme == "white") {
        ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/bootstrap-rtl/css/bootstrap-rtl.min.css"/>
        <!-- Theme RTL style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/white-rtl.css" /> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/AdminLTE-rtl.min.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/skins/_all-skins-rtl.min.css" />

        <?php
    } else {
        ?>
        <!-- Bootstrap 3.3.5 RTL -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/bootstrap-rtl/css/bootstrap-rtl.min.css"/>
        <!-- Theme RTL style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/AdminLTE-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/ss-rtlmain.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/skins/_all-skins-rtl.min.css" />
        <?php
    }
}

if ($theme == "white") {
    ?>
    <style>
        i{
            color:gray;
        }
        ,.iconstyle{
            border: 5px solid gray;
        }
        .box{
            border-top: 10px solid grey;
            border-left: 10px solid grey;
            border-right: 10px solid grey;
            border-radius: 15px;
         }
    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/white/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/white/ss-main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/main.css">

    <?php
} elseif ($theme == "default") {
    ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/style-main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/default/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/default/ss-main.css">

    <?php
} elseif ($theme == "red") {
    ?>
      <style>
           i{
            color:red;
            }
            ,.iconstyle{
                border: 5px solid red;
            }
            .box{
            border-top: 10px solid red;
            border-left: 10px solid red;
            border-right: 10px solid red;
            border-radius: 15px;
         }
    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/style-main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/red/skins/skin-red.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/red/ss-main-red.css">
    <?php
} elseif ($theme == "blue") {
    ?>
      <style>
           i{
               color:blue;
            }
            ,.iconstyle{
                border: 5px solid blue;
            }
            .box{
            border-top: 10px solid blue;
            border-left: 10px solid blue;
            border-right: 10px solid blue;
            border-radius: 15px;
         }
    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/style-main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/blue/skins/skin-darkblue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/blue/ss-main-darkblue.css">
    <?php
} elseif ($theme == "gray") {
    ?>
      <style>
           i{
            color:#3883CE;
         }
         .box{
            border-top: 10px solid #3883CE;
            border-left: 10px solid #3883CE;
            border-right: 10px solid #3883CE;
            border-radius: 15px;
         }
        ,.iconstyle{
                border: 5px solid #3883CE;
            }
    </style>
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/style-main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/gray/skins/skin-light.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/themes/gray/ss-main-light.css">
    <?php
}