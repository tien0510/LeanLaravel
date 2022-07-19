$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

});

function removeRow(id,url) {
    if (confirm('Bạn có chắc muốn xoá danh mục này ?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data :{id},
            url : url,
            success: function (result){
                if (result.error === false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert(result.message);
                    location.reload();

                }
            }
        })
    }
}

/* Upload*/
$('#upload').change(function (){
    var  form = new FormData();
   // form.append('file', $(this)[0].files[0]);
    form.append('file', $('input[type=file]')[0].files[0]);
    $.ajax({
       processData: false,
       contentType: false,
       type: 'POST',
       dataType: 'JSON',
       data: form,
       url: '/admin/upload/services',
       success:function (results){
           if(results.error === false){
               $('#image_show').html('<a href="'+ results.url +'"target="_blank"> ' +
                   '<img src="'+ results.url +'"   width="100px"></a>');
               $('#thumb').val(results.url);
           }else{
               alert('Upload file lỗi !!!')
           }
       }

   });
});
/* Slug name*/
$(document).ready(function (){
    var action = 'input';

    $('#name').keyup(function (){
       var name = $('#name').val();
       $.ajax({
           url      : '/admin/products/check',
           method   :'POST',
           type: 'POST',
           data     :{action:action,name:name},
           success:function (results){

               $('#name_show').html('<h2>'+ results.message +'</h2>');
           }

       });
        console.log('action');

    });

});


// $(document).ready(function (){
//     var action = 'input';
//     $('#name').keyup(function (){
//
//        var name = $('#name').val();
//        $.ajax({
//            url      : '/admin/products/check',
//            method   :'POST',
//            type: 'POST',
//            data     :{action:action,name:name},
//            success:function (results){
//
//                $('#name_show').html('<h2>'+ results.message +'</h2>');
//            }
//
//        });
//     });
//
// });

