@extends('layouts.master')

@section('title', 'Borrow Book - ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Borrow Book</h2>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1 ?>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $n++ }}</td>
                            <td>{{ $book->category->category }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->upload }}</td>
                            <td>
                                <form action="{{ route('postreq') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="category_id" value="{{ $book->category->id }}">
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <button class="btn btn-primary"><i class="fas fa-paper-plane "></i>Request</button>
                                </form>
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