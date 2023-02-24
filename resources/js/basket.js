$(document).ready(function () {
    $('.basket').click(function (event) {
        event.preventDefault();
        let element = event.currentTarget;
        const foodId = $(element).data('create-id');
        const qty = $(`#qty-${foodId}`).val();
        console.log(foodId, qty)
        $.ajax({
            method: "POST",
            url: `/baskets/`,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                "food_id": foodId, "qty": qty
            }

        })
            .done(function (msg) {
                console.log("message => ", msg.basket);
                alert(msg.basket)
            })
            .fail(function (response) {
                console.log("FAIL response ====> ", response);
            })
    })
    $('.update-food-btn').click(function (event) {
        event.preventDefault();
        const data = $('#update-food').serialize();
        const basketId = $("#basket_id").val();
        $.ajax({
            method: "PUT",
            url: `/baskets/` + basketId,
            data: data
        })
            .done(function (msg) {
                console.log("message => ", msg.basket);
                alert(msg.basket);
            })
            .fail(function (response) {
                console.log("Fail response ==>", response);
            })
    })
});
