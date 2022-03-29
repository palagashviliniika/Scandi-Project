//function to dynamically change the add product input fields
function setForm(productType){

    var productType = document.getElementById(productType);
    // console.log(productType.value);

    // creating assoc array with values set to appropriate template addresses
    var productTypes = { "empty":'', "DVD": 'templates/forms/dvd.form.php', "Book": 'templates/forms/book.form.php', "Furniture": 'templates/forms/furniture.form.php' };

    // getting address for the template
    var address = productTypes[productType.value];

    // We are sending the address to the PHP to get the template

    // sending address with the ajax call
    $.ajax(
        {
            type: 'POST',
            url: './requests/ajax_request.php',
            data: { address1:address },
            success: function(response) {

                // console.log(response); // it logs php form template

                // showing appropriate product type input fields in the add page
                $("#prod_type").html(response);
            }
        }
    );

}

// function to clear error fields when user enters the data
function clearErrorField(IDtoClear){
    let fieldToClear = document.getElementById('error_' + IDtoClear);
    fieldToClear.innerHTML = "";
}

// function to send and validate user entered data
$('#product_form').submit(function (event) {

    // preventing default action on add form
    event.preventDefault();

    // sending user entered data with ajax call
    $.ajax({
        type: 'post',
        dataType: 'text',
        url: './requests/ajax_add_request.php',
        data: $(this).serialize(),
        success: function (response) {

            //if response is not returned, then the product is saved and redirecting to the index page
            if (!response) {
                window.location.href = "index.php";
            } else {

                // turning json object into a js object
                response = JSON.parse(response);

                // looping errors assoc id to show the errors
                Object.keys(response).forEach((error) => {
                    let errorField = document.getElementById('error_' + error);

                    //show error to appropriate field
                    errorField.innerHTML = response[error];
                })
            }
        }
    });
});