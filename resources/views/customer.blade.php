<!DOCTYPE html>
<html >
    <head> 
        <title>Levelset</title> 
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
    </head>

    <a href="{{ url('/') }}" class="btn btn-outline-primary"> Upload CSV file</a>  
    <a  class="btn btn-outline-warning" href="{{route('orders')}}">Orders</a> 
    <a  class="btn btn-outline-secondary" href="{{route('customers')}}">Customers report</a> 
 

<body class="antialiased">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>
                #
            </th>
            <th  >
                Customer name
            </th>
            <th>
                Total Debt
            </th>
            <th>
                Total Project
            </th> 
 
        </tr>
        </thead>
        <tbody>
        @if($orders->count() > 0)
            @php $x = 1; @endphp
            @foreach ($orders as $item)
                <tr>
                    <th scope="row">
                        {{ $x }}
                    </th> 
                    <td>
                        {{ $item->customer_name }}
                    </td>
                    <td>
                        {{ $item->total_project }}
                    </td>   
                    <td>
                        {{ $item->total_debit }}
                    </td> 
  
 
                </tr>
                @php $x++; @endphp
            @endforeach
        @else
            <tr>
                <td class="center" colspan="10">
                    no result found
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</body>
</html>
