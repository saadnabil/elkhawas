<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logo {
            max-width: 200px;
            margin: 0 auto;
            display: block;
        }
        .order-card {
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }
        .order-card .card-title {
            color: #007bff;
        }
        .order-card .list-group-item {
            background-color: transparent;
            border-color: #dee2e6;
            color: #495057;
        }
        .order-card .list-group-item:first-child {
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }
        .order-card .list-group-item:last-child {
            border-bottom-left-radius: .25rem;
            border-bottom-right-radius: .25rem;
        }
        .order-card .card-text {
            color: #6c757d;
        }
        .order-card .total {
            color: #ab9000;
            font-weight: bold;
        }

        .product-img {
            max-width: 80px;
            max-height: 80px;
            margin-right: 10px;
            vertical-align: middle;
            border-radius: 30%;
        }
    </style>
</head>
<body>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img src="{{asset('elkhawas/elkhawas_images/elkhawas.png')}}" alt="Logo" class="logo mb-4">
                
                <div class="">
                 <!-- Alert Message -->
    <div class="alert alert-success mb-0" role="alert">
        <strong>Your request has been received!</strong><br>
        Your order will be delivered as soon as possible.<br>
        You can check your email to see the details.
    </div>
    <br>

                </div>
                <div class="card order-card">
                    <div class="card-body">
                        <h2 class="card-title">Thank you for your order!</h2>
                        <p class="card-text">Here are the details of your order:</p>
                        <ul class="list-group">
                            <li class="list-group-item"><img src="{{asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg')}}" alt="Product 1" class="product-img">
                            <strong>Product 1</strong>  - $10.00</li>
                            <li class="list-group-item"><img src="{{asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg')}}" alt="Product 1" class="product-img"> 
                          <strong>Product 2</strong>   - $15.00</li>
                            <li class="list-group-item"><img src="{{asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg')}}" alt="Product 1" class="product-img">
                           <strong>Product 3</strong>   - $20.00</li>
                        </ul>
                        <p class="card-text mt-3 total"><strong>Total: $45.00</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
