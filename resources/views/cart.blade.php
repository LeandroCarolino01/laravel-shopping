@extends('shop')

@section('content')
<table class="table table-bordered" id="cart">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (session('cart'))
            @foreach(session('cart') as $id => $details)
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('images') }}/{{$details['image']}}" alt="" class="card-img-top">
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">
                                    {{$details['name']}}
                                </h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{$details['price']}}</td>
                    <td data-th="Subtotal" class="text-center"></td>
                    <td class="sections">
                        <a  class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/home')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i>Continue shopping</a>
                <button class="btn btn-danger">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">

$(".delete-product").click(function (e) {
    e.preventDefault();

    var ele = $(this);
    if(confirm("Dp you really want to delete it?")){
        $.ajax({
            url: '{{ route('delete.cart.product')}}',
            method: "DELETE",
            data: {
                _token: '{{csrf_token()}}',
                id: ele.parents("tr").attr("rowId")
            },
            success: function (response) {
                window.location.reload();
            }
        })
    }
})

</script>
@endsection