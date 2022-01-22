@extends('layouts.master')

@section('title', 'Borrowers List - ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Borrower's List</h2>
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
                        <th>Approved On</th>
                        <th>Due Date</th>
                        <th>Returned</th>
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
                            <td>{{ $req->due_date }}</td>
                            <td>{{ $req->returned == 1 ? 'Yes' : 'No' }}</td>
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
    