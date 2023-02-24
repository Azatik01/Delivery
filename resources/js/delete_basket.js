$(document).ready(function (){
    $('.delete-comment-btn').click(function (event){
        event.preventDefault();
        let element = event.currentTarget;
        const basketId = $(element).data('basket-id');
        $.ajax({
            method: "DELETE",
            url: `/baskets/${basketId}/`,
            data: {_token: $('meta[name="csrf-token"]').attr('content')}
        })
            .done(response => {
                console.log("response => ", response);
                $(`#basket-${basketId}`).remove();
            })
            .fail(errorResponse => {
                console.log('error response => ', errorResponse);
            })
    });
});
