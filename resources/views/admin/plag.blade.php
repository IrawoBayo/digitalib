@extends('layouts.master')

@section('title', 'Active Users - ')

@section('content')
<!-- <script async src="https://cse.google.com/cse.js?cx=8879f0271d655f718"></script>
<div class="gcse-search"></div> -->

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Link</th>
                <th>Snippet</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $res)
                <tr>
                    <td>{{ $res->title }}</td>
                    <td>{{ $res->link }}</td>
                    <td>{{ $res->snippet }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
@section('scripts')
    
@endsection