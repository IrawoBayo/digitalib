@extends('layouts.master')

@section('title', 'Book Request - ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Request List</h2>
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
                        <th>Category</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Library Id</th>
                        <th>Requested On</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1 ?>
                    @foreach ($reqs as $req)
                        <tr>
                            <td>{{ $n++ }}</td>
                            <td>{{ $req->category->category }}</td>
                            <td>{{ $req->book->title }}</td>
                            <td>{{ $req->user->firstname }} {{ $req->user->lastname }}</td>
                            <td>{{ $req->user->libraryId }}</td>
                            <td>{{ $req->created_at }}</td>
                            <td>
                                <a href="{{ url('admin/accept-request/'.$req->id) }}"><button class="btn btn-success"><i class="fas fa-thumbs-up"> Approve</i></button></a> 
                                <a href="{{ url('admin/view-req/'.$req->id) }}"><button class="btn btn-danger"><i class="fas fa-thumbs-down"></i> Reject</button></a> 
                            </td>
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
    