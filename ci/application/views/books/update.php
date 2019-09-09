<?php

foreach($result as $row){
    $id = $row['id'];
    $title = $row['bookName'];
    $details = $row['bookAuther'];
    $news_dt = $row['releaseDate'];
    $publish = $row['publisher'];
    $publish = $row['coverPage'];
}
?>
<form class="form-inline" method="post" action="add2">
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-6">اسم الكتاب:</label>
            <div class="col-md-6"><input type="text" class="form-control" name="bookName" id="bookName"></div>
        </div>
        <div class="form-group">
            <label class="col-md-6">اسم المؤلف:</label>
            <div class="col-md-6"><input type="text" class="form-control" name="bookAuther" id="bookAuther"></div>
        </div>
        <div class="form-group">
            <label class="col-md-6">تاريخ النشر:</label>
            <div class="col-md-6"><input type="date" class="form-control" name="releaseDate" id="releaseDate"></div>
        </div>
        <div class="form-group">
            <label class="col-md-6">دار النشر:</label>
            <div class="col-md-4"><input type="text" class="form-control my_date" name="publisher" id="publisher"></div>
        </div>
        <div class="form-group">
            <label class="col-md-6">صورة الغلاف:</label>
            <div class="col-md-4"><input type="file" class="form-control my_date" name="coverPage" id="coverPage"></div>
        </div>
        <div class="form-group"><button type="button" name="subBtn" id="subBtn" class="btn btn-primary">حفظ التعديل</button></div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#subBtn").click(function() {
            $.ajax({
                url: 'update',
                type: 'POST',
                data: {
                    'id': <?php echo $id; ?>,
                    'bookName': $("#bookName").val(),
                    'bookAuther': $("#bookAuther").val(),
                    'releaseDate': $('#releaseDate'),
                    'publisher': $("#publisher").val(),
                    'coverPage': $("#coverPage").val(),
                    'action': 1
                },
                success: function(result) {
                    alert(result);
                }
            });
        });
    });

</script>
