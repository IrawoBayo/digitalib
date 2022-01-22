@extends('layouts.master')

@section('title', 'Books - ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">My Books</h2>
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
                        <th>Author</th>
                        <th>Book</th>
                        <th>Added On</th>
                        <th>Due Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1 ?>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $n++ }}</td>
                            <td>{{ $book->category->category }}</td>
                            <td>{{ $book->book->title }}</td>
                            <td>{{ $book->book->author }}</td>
                            <td><a href="{{ url('my-book/'.$book->book->ISBN) }}" target="_blank">{{ $book->book->upload }}</a></td>
                            <td>{{ $book->created_at }}</td>
                            <td>{{ $book->due_date }}</td>
                            <td>
                                <a href="{{ url('return-book/'.$book->id) }}">
                                    <button class="btn btn-primary"><i class="fas fa-eye"></i>Return</button>
                                </a>
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