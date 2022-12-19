<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <div class="card" style="width: 100%;">
        <div class="card-header">
          Order Details
        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                    <td><label class="control-label col-md-5">Customer Name</label></td>
                    <td>:</td>
                    <th><label class="control-label col-md-7">{{$order->name}}</label></th>
                    <td>Total Amount</td>
                    <td>:</td>
                    <th><label class="control-label col-md-7">{{$order->price}}</label></th>
                    </tr>
                    <tr>
                        <td>Customer Email</td>
                        <td>:</td>
                        <th><label class="control-label col-md-7">{{$order->email}}</label></th>
                        <td>Quantity</td>
                        <td>:</td>
                        <th><label class="control-label col-md-7">{{$order->quantity}}</label></th>

                    </tr>
                    <tr>
                        <td>Customer Phone</td>
                        <td>:</td>
                        <th><label class="control-label col-md-7">{{$order->phone}}</label></th>
                        <td>Payment Status</td>
                        <td>:</td>
                        <th><label class="control-label col-md-7">{{$order->payment_status}}</label></th>
                    </tr>
                    <tr>
                        <td>Customer Address</td>
                        <td>:</td>
                        <th><label class="control-label col-md-7">{{$order->phone}}</label></th>
                        <td>Delivery Status</td>
                        <td>:</td>
                        <th><label class="control-label col-md-7">{{$order->delivery_status}}</label></th>

                    </tr>
                </thead>
            </table>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->quantity}}</td>

                </tr>
            </tbody>

          </table>

        </div>
    </div>
</body>
</html>
