@extends('layouts.master')

@section('title', 'Book - ')

@section('content')
<!-- <div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">{{ $book->title }}</h2>
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-md-12">
        <a class="float-right mb-2" href="{{ url('my-book/'.$book->ISBN.'/download') }}" target="_blank">
            <button class="btn btn-sm btn-dark">Download</button>
        </a>
        <embed src= "{{ asset('books/'.$book->upload) }}#toolbar=0" width= "100%" height= "750">
    </div>
</div>

@endsection