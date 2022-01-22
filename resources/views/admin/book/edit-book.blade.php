@extends('layouts.master')

@section('title', 'Books - ')

@section('content')
<!-- <div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ $book->title }}</h2>
        </div>
    </div>
</div> -->
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Update {{ $book->title }}</strong>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('update-book/'.$book->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="category_id" class=" form-control-label">Book Category</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Please select</option>
                                @foreach($cats as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="title" class=" form-control-label">Book Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="title" name="title" value="{{ $book->title }}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="author" class=" form-control-label">Book Author</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="author" name="author" value="{{ $book->author }}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="ISBN" class=" form-control-label">Book ISBN</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="ISBN" name="ISBN" value="{{ $book->ISBN }}"class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="publisher" class=" form-control-label">Book Publisher</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="publisher" name="publisher" value="{{ $book->publisher }}"class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="description" class=" form-control-label">Book Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="description" rows="3" class="form-control">{{ $book->description }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="upload" class=" form-control-label">File Upload</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="upload" name="upload" class="form-control-file">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- modal medium -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Update A Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('edit-book/'.$book->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="category_id" class=" form-control-label">Book Category</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="title" class=" form-control-label">Book Title</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="title" name="title" value="{{ $book->title }}" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="author" class=" form-control-label">Book Author</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="author" name="author" value="{{ $book->author }}" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="ISBN" class=" form-control-label">Book ISBN</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ISBN" name="ISBN" value="{{ $book->ISBN }}"class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="publisher" class=" form-control-label">Book Publisher</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="publisher" name="publisher" value="{{ $book->publisher }}"class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="description" class=" form-control-label">Book Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" rows="3" class="form-control">{{ $book->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="upload" class=" form-control-label">File Upload</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="upload" name="upload" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal medium -->