function addToShopCart(obj, id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    });

    let product_data = {};
    product_data.id = id;

    let insert_cart = "/shopcart";

    $.ajax({
        type: "POST",
        url: insert_cart,
        data: product_data,
        dataType: 'text',
        success: function (data) {
            //alert("Done: " + data);
            console.log(data);

            if (obj != null)
                removeDesignProduct(obj);
        },
        error: function (data) {
            //alert("Error: " + data.responseText);
            console.log('Error: ', data);
        }
    });
    return false;
}

function addToWishlist(id) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $document.querySelector('meta[name="csrf-token"]').content
        }
    });

    let product_data = {};
    product_data.id = id;

    let insert_wishlist = "/wishlist";

    $.ajax({
        type: "POST",
        url: insert_wishlist,
        data: product_data,
        dataType: 'text',
        success: function (data) {
            //alert("Done: " + data);
            console.log(data);
        },
        error: function (data) {
            console.log('Error: ', data);
        }
    });
    return false;
}

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function sendRequest(method, url, data) {
    let request = new XMLHttpRequest();
  
    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax(data));
  }

