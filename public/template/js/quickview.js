$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function quickview(){//chua hoan thanh
    console.log(1);
}
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
