{{-- @extends('layout') --}}


<h1>{{$heading}} </h1>

@if (count($listings) < 1)
    <p>There are no listings</p>
@endif

@foreach ($listings as $listing)
    <h2>
       <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
    </h2>
    <p>{{$listing['description']}}</p>
@endforeach



