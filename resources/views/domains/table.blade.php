@extends('layouts.main')

@section('title', 'Domain')

@section('linkHome', 'active')
@section('linkHistory', '')

@section('navbar')
    @parent
@endsection

@section('content')
<table class="table">
    <thead class="thead-light">
        <tr>
          <th scope="col">URL</th>
          <th scope="col">Updated at</th>
          <th scope="col">Created at</th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <td>{{ $domain->name }}</td>
          <td>{{ $domain->created_at }}</td>
          <td>{{ $domain->updated_at }}</td>
        </tr>
    </tbody>
</table>
@endsection
