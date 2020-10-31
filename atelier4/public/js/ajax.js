$(document).ready(function () {

    //used to know if its add or update
    var selectedProduct = false;

    getAllProducts();


    //take out the list business to a separate function to call it after modification to refresh
    function getAllProducts() {
        $.get('http://127.0.0.1:8000/api/product', function (result) {
            var rows = '';
            result.map(function (product) {
                var productDom = '<tr>' +
                    '<td>' + product.id + '</td>' +
                    '<td>' + product.name + '</td>' +
                    '<td>' + product.category.name + '</td>' +
                    '<td>' + '<button class="btn btn-info btnEdit" data-product="' + product.id + '">Edit</button>' + '</td>' +
                    '<td>' + '<button class="btn btn-danger btnDelete" data-product="' + product.id + '">Delete</button>' + '</td>' +
                    '</tr>'

                rows = rows + productDom
            });
            $('table').html('')
            $('table').append(rows)
            registerListener()

        });

    }


    //GET all categories
    $.get('http://127.0.0.1:8000/api/category', function (result) {

        result.map(function (category) {
            var categoryOption = '<option value="' + category.id + '">' + category.name + '}</option>'
            $('select').append(categoryOption)
        });

    });

    //on click add button , we take input values and verify if its an add or update using our selectedProduct variable
    $('#btnAdd').on('click', function (event) {
        $('#btnAdd').attr('disabled', 'true');
        $('#btnAdd').text('saving');

        event.preventDefault();
        var product = {};
        product.name = $('#name').val()
        product.category_id = $('#category_id').val()

        //Ajout
        if (!selectedProduct) {

            $.ajax({
                url: 'http://127.0.0.1:8000/api/product',
                type: 'post',
                dataType: 'json',
                data: product,
                success: function (result) {
                    console.log(result);
                    var productDom = '<tr>' +
                        '<td>' + result.id + '</td>' +
                        '<td>' + result.name + '</td>' +
                        '<td>' + result.category_id + '</td>' +
                        '</tr>'
                    $('table').append(productDom)

                    $('#btnAdd').removeAttr('disabled');
                    $('#btnAdd').text('Add');


                },
            });


        }
        //Update
        else {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/product/' + selectedProduct.id,
                type: 'put',
                dataType: 'json',
                data: product,
                success: function (result) {
                    console.log(result)
                    getAllProducts();

                },
                error: function (error) {
                    console.log(error)
                    getAllProducts();

                    $('#btnAdd').removeAttr('disabled');
                    $('#btnAdd').text('Add');

                },
            });

        }


    });


    //i used a function to register listener on those buttons because the Edit button and delete button will be renderer using jquery so after the initial render
    // so if we dont register it after the rendering of the buttons , it will register the click listener on button with class btnEdit which is unexistant yet
    function registerListener() {
        //Select product
        $('.btnEdit').on('click', function (event) {
            var productID = event.target.dataset.product;
            $.get('http://127.0.0.1:8000/api/product/' + productID, function (product) {
                selectedProduct = product;
                $('#btnAdd').text('Edit');

                $('#name').val(product.name)
                $('#category_id').val(product.category_id)

            });
        });


        //delete product
        $('.btnDelete').on('click', function (event) {
            var productID = event.target.dataset.product;
            console.log(productID)

            var res = confirm('Are you sure you want to delete this product ? !');

            if (res) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/product/' + productID,
                    type: 'delete',
                    success: function (result) {
                        getAllProducts();

                    },
                    error: function (error) {
                        console.log(error)
                        getAllProducts();
                    },
                });
            }
        });

    }

    //clear inputs
    $('#btnCancel').on('click', function (e) {
        e.preventDefault();
        selectedProduct= false;
        $('#btnAdd').text('Add');
        $('#name').val(undefined)
        $('#category_id').val(undefined)

    });


});
