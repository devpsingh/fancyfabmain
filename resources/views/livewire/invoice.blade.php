<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if(!is_null($order_info))
<div class="container shipping-info-sec">
    <div class="card">
        <div class="card-header d-flex"><h4>Order Detail</h4><h6 class="ml-auto"><strong>Order No: {{$order_info->order_id}}
        <br>Pay Id: @if($order_info->payment_mode=='cod') Cash on delivery @endif
        <br>Email:{{$order_info->email}}</strong></h6></div>
        <div class="card-body">
             <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
                </table>
        </div>
    </div>
</div>
@endif
</div>
