<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #4B49AC;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
    </style>

</head>

<body>

    <div class="information">
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h3> Name: {{ $order->name }}</h3>
                    <pre>
                        Phone: {{ $order->phone }}
                        Email: {{ $order->email }}
                        Address: {{ $order->address }}
                    </pre>

                </td>
                <td align="right" style="width: 40%;">

                    <h3>{{ $setting->company_name }}</h3>
                    <pre>
                        Phone:{{ $setting->company_phone }}
                       Email: {{ $setting->company_email }}

                    Address: {{ $setting->company_address }}
                </pre>
                </td>
            </tr>

        </table>
    </div>


    <br />

    <div class="invoice">
        <h3>Order Details</h3>
        <table style="text-align:center; width:100%">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Sub Total</th>
                    <th>Total</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->total_products }}</td>
                    <td>{{ $order->sub_total }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->payment_status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
