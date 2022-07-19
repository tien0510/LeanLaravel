$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// function quickview(){//chua hoan thanh
//     console.log(1);
// }
function LoadMore(){
    const page = $('#page').val();

    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data :{page},
        url : '/services/load-product',
        success : function (result){
            if (result.html!== ''){
                $('#loadProduct').append(result.html);
                $('#page').val(page +1);
            }else{
                alert("Đã Load Xong Sản Phẩm ");
                $('#btn-loadMore').css('display','none');
            }
        }

    })

}
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
