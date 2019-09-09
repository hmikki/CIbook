<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html dir="rtl">
    <head>
        <meta charset="UTF-8">
        <title>Main Page</title>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <table width="100%" class="table table-bordered" style="border: 1px solid #000;">
            <tr>
                <td colspan="2" style="text-align: center;"><h1>Header</h1></td> 
            </tr>
            <tr>
                <td width="30%"><?php $this->load->view("books/menu"); ?></td>
                <td width="70%"><?php 
                if(isset($content))
                    $this->load->view($content); 
                else
                    $this->load->view("default"); 
                ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><h1>Footer</h1></td> 
            </tr>
        </table>
        </div>
    </body>
</html>
