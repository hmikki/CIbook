<?php

foreach($result as $row){
    $id = $row['id'];
    $title = $row['title'];
    $details = $row['details'];
    $news_dt = $row['news_dt'];
    $publish = $row['publish'];
}
?>
<form class="form-inline" method="post" action="add2">
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-6">عنوان الخبر:</label>
            <div class="col-md-6"><input type="text" class="form-control" name="title" id="title" required="required" value="<?php echo $title; ?>"></div>
        </div>
        <div class="form-group">
            <label class="col-md-6">تفاصيل الخبر:</label>
            <div class="col-md-6"><input type="text" class="form-control" name="details" id="details" value="<?php echo $details; ?>"></div>
        </div>
        <div class="form-group">
            <label class="col-md-6">نشر الخبر:</label>
            <div class="col-md-6"><input type="checkbox" class="form-control" name="publish" id="publish" <?php  if($publish==1) echo "checked='checked'"; ?>></div>
        </div>
        <div class="form-group">
            <label class="col-md-6">تاريخ الخبر:</label>
            <div class="col-md-4"><input type="text" class="form-control my_date" name="news_dt" id="news_dt" value="<?php echo $news_dt; ?>"></div>
        </div>
        <div class="form-group"><button type="button" name="subBtn" id="subBtn" class="btn btn-primary">حفظ التعديل</button></div>
    </div>
</form>
<script>
    $(document).ready(function(){
       $("#subBtn").click(function(){
           $.ajax({url:'update', 
                type:'POST',
                data: {
                    'id': <?php echo $id; ?>,
                    'title': $("#title").val(),
                    'details': $("#details").val(),
                    'publish': $('#publish').prop('checked') ? 1 : 0,
                    'news_dt': $("#news_dt").val(),
                    'action': 1
                },
                success:function(result){
                    alert(result);
                }
            });
       });
       
       $('.my_date').datepicker({
            'autoclose': true,
            'format': 'yyyy-mm-dd'
        });
    });
    </script>
