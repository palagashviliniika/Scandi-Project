function setForm(productType){

    var productType = document.getElementById(productType);
    console.log(productType.value);

    var productTypes = { "empty":'', "DVD": 'templates/forms/dvd.form.php', "Book": 'templates/forms/book.form.php', "Furniture": 'templates/forms/furniture.form.php' };

    var address = productTypes[productType.value];

    //We are sending the address to the PHP to get the template

    $.ajax(
        {
            type: 'POST',
            url: './requests/ajax_request.php',
            data: { address1:address },
            success: function(response) {

                // console.log(response); // it logs php form template

                $("#prod_type").html(response);
            }
        }
    );

}

function clearErrorField(IDtoClear){
    let fieldToClear = document.getElementById('error_' + IDtoClear);
    fieldToClear.innerHTML = "";
}


$('#product_form').submit(function (event) {

    event.preventDefault();

    $.ajax({
        type: 'post',
        dataType: 'text',
        url: './requests/ajax_add_request.php',
        data: $(this).serialize(),
        success: function (response) {

            if (!response) {
                window.location.href = "index.php";
            } else {

                // turning json string into a js object
                response = JSON.parse(response);

                Object.keys(response).forEach((error) => {
                    let errorField = document.getElementById('error_' + error);

                    errorField.innerHTML = response[error];
                })
            }
        }
    });
});