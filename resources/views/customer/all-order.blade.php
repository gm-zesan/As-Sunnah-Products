@extends('website.master')

@section('title')
    Customer Dashboard Page
@endsection

@section('body')


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{ route('customer.profile') }}" class="list-group-item list-group-item-action">Profile</a>
                        <a href="{{ route('customer.order') }}" class="list-group-item list-group-item-action">Order</a>
                        <a href="{{ route('customer.logout') }}" class="list-group-item list-group-item-action">Logout</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>SL. No.</td>
                                    <td>Order No.</td>
                                    <td>Order Date</td>
                                    <td>Order Total</td>
                                    <td>Delevary Address</td>
                                    <td>Order Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->order_total }}</td>
                                        <td>{{ $order->delivery_address }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>
                                            <a href="" class="btn btn-success">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
