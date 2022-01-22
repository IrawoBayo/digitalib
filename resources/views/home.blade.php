@extends('layouts.master')

@section('title', 'Dashboard - ')

@section('content')
<div class="alert alert-primary" role="alert">
    Welcome to your DigiLib Dashboard {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}
</div>
@role('admin')
<div class="row m-t-25">
    <div class="col-md-6 col-lg-3">
        <div class="statistic__item statistic__item--orange">
            <h2 class="number text-white">{{ $user }}</h2>
            <span class="desc text-white">All Users</span>
            <div class="icon">
                <i class="zmdi zmdi-accounts"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="statistic__item statistic__item--green">
            <h2 class="number text-white">{{ $active }}</h2>
            <span class="desc text-white">Active Users</span>
            <div class="icon">
                <i class="zmdi zmdi-accounts"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="statistic__item statistic__item--red">
            <h2 class="number text-white">{{ $suspended }}</h2>
            <span class="desc text-white">Offenders</span>
            <div class="icon">
                <i class="zmdi zmdi-accounts"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="statistic__item statistic__item--blue">
            <h2 class="number text-white">{{ $book }}</h2>
            <span class="desc text-white">Books</span>
            <div class="icon">
                <i class="zmdi zmdi-file-text"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="statistic__item statistic__item--red">
            <h2 class="number text-white">{{ $req }}</h2>
            <span class="desc text-white">Borrow Request</span>
            <div class="icon">
                <i class="zmdi zmdi-file-plus"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="statistic__item statistic__item--green">
            <h2 class="number text-white">{{ $list }}</h2>
            <span class="desc text-white">Borrow List</span>
            <div class="icon">
                <i class="zmdi zmdi-file"></i>
            </div>
        </div>
    </div>
          
</div>
@else
<div class="row m-t-25">
    <div class="col-md-6 col-lg-3">
        <div class="statistic__item statistic__item--green">
            <h2 class="number text-white">{{ $myBooks }}</h2>
            <span class="desc text-white">Books</span>
            <div class="icon">
                <i class="zmdi zmdi-file-text"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="statistic__item statistic__item--orange">
            <h2 class="number text-white">{{ $myReq }}</h2>
            <span class="desc text-white">Requests</span>
            <div class="icon">
                <i class="zmdi zmdi-file-text"></i>
            </div>
        </div>
    </div>
</div>
@endrole

@endsection