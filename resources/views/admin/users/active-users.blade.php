@extends('layouts.master')

@section('title', 'Active Users - ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Active Users</h2>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table id="myTable" class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Library ID</th>
                        <th>National ID</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Registered On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1 ?>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $n++ }}</td>
                            <td>{{ $user->firstname }}  {{ $user->lastname }}</td>
                            <td>{{ $user->libraryId }}</td>
                            <td>{{ $user->nationalId }}</td>
                            <td class="process">{{ $user->status }}</td>
                            <td>
                                @if($user->rating == 1)
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                @elseif($user->rating == 2)
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                @elseif($user->rating == 3)
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                @elseif($user->rating == 4)
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star"></span>
                                @else
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                    <span class="fa fa-star ratingchecked"></span>
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

@endsection
@section('scripts')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection