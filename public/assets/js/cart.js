function removeFromCart(id) {
    $.ajax({
        url : "/cart",
        method: "DELETE",
        data: {
            "_token": token,
            "id" : id
        },
        headers: {
            "Accept": "application/json"
        },
        success: function() {
            console.log(id)
            $("#cart_item_" + id).remove()
            updateTotalPrice()
        },
        error: function(xhr, status, error) {
            console.log(error)
        }
    })
}

function updateTotalPrice() {
    var albums = $(".album")

    let total = 0

    for(album of albums) {
        let price = $(album).data("price")
        let albumId = $(album).data("id")

        let quantity = $("#input_" + albumId).val()

        total += price * quantity
    }
    $("#total").html("$ " + total)
}

function changeAlbumQuantity(id) {

    $.ajax({
        url : "/cart",
        method: "PUT",
        headers: {
            "Accept": "application/json"
        },
        data: {
            id : id,
            _token: token,
            quantity: $("#input_" + id).val()
        },
        success: function() {
            updateTotalPrice()
        },
        error: function() {
            alert("Error!")
        }
    })
}

function addToCart(id) {
    $.ajax({
        url : "/cart",
        method: "POST",
        data: {
            "_token" : token,
            "id" : id
        },
        headers: {
            "Accept": "application/json"
        },
        success: function (data) {
            alert("Added to the cart.")
        },
        error: function(err,xhr,status) {
            alert("Error occured.")
        }
    })
}
