function crudProdutos(){
    $(document).on('click', '#removerProduto', function(){
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: url,
            data: {id: id},
            success: function (response) {
                console.log(response);
                },
            error: function (response){
                console.log(response);
               }
            })
            return false;
        });


}
