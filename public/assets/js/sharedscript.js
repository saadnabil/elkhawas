        $(document).ready(function() {

            //carts operation
            $(document).on('click', 'button.plus-quantity', function(e) {
                e.preventDefault();
                var url = $(this).data('route');
                $.ajax({
                    url: url,
                    method: 'GET',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response['route'] == 'cartsidebar') {
                            $('#usercart').html(response['view']);
                            $('.opencartsidebar').trigger('click');
                        } else if (response['route'] == 'cartpagedetails') {
                            $('#cartcomponentsection').html(response['view']);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON.error) {
                            alert(xhr.responseJSON.error); // Display the error message
                        } else {
                            alert('An unexpected error occurred.'); // Fallback error message
                        }
                    }
                });
            });

            $(document).on('click', 'button.minus-quantity', function(e) {
                e.preventDefault();
                var url = $(this).data('route');
                $.ajax({
                    url: url,
                    method: 'GET',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response['route'] == 'cartsidebar') {
                            $('#usercart').html(response['view']);
                            $('.opencartsidebar').trigger('click');
                        } else if (response['route'] == 'cartpagedetails') {
                            $('#cartcomponentsection').html(response['view']);
                        }
                    },
                    error: function(response) {
                        alert('error')
                    }
                });
            });

            $(document).on('click', 'button.delete-item', function(e) {
                e.preventDefault();
                var url = $(this).data('route');
                $.ajax({
                    url: url,
                    method: 'GET',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response['route'] == 'cartsidebar') {
                            $('#usercart').html(response['view']);
                            $('.opencartsidebar').trigger('click');
                        } else if (response['route'] == 'cartpagedetails') {
                            $('#cartcomponentsection').html(response['view']);
                        }
                    },
                    error: function(response) {
                        alert('error')
                    }
                });
            });

            $(document).on('click', 'button.additem', function(e) {
                e.preventDefault();
                let form = $('#additem')[0];
                let data = new FormData(form);
                var url = $(this).data('route');
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        $('.modal').modal('hide');

                        $('#usercart').html(response);

                        $('.opencartsidebar').trigger('click');
                    },
                    error: function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON.error) {
                            alert(xhr.responseJSON.error); // Display the error message
                        } else {
                            alert('An unexpected error occurred.'); // Fallback error message
                        }
                    }
                });
            });
            //carts operation
        });
