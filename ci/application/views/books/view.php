<table class="table">
    <tr>
        <th>الرقم</th>
        <th>اسم الكتاب</th>
        <th>اسم المؤلف</th>
        <th>تاريخ النشر</th>
        <th>دار النشر</th>
        <th>صورة الغلاف</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    $no = 0;
    foreach($result as $row){
        $no++;
        ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row['bookName']; ?></td>
        <td><?php echo $row['bookAuther']; ?></td>
        <td><?php echo $row['releaseDate']; ?></td>
        <td><?php echo($row['publisher']); ?></td>
        <td><?php echo($row['coverPage']); ?></td>
        <td><a href="<?php echo base_url()."books/update/$row[id]"; ?>">تعديل</a></td>
        <td><button onclick="delete_fun(<?php echo $row['id']; ?>)" class="btn btn-danger">حذف</button></td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
   function delete_fun(id){
       if(confirm("هل أنت متأكد من عملية الحذف؟")){
            $.ajax({url:'delete', 
                     type:'POST',
                     data: {
                         'id': id
                     },
                     success:function(result){
                         alert(result);
                     }
                 });
        }
   } 
</script>