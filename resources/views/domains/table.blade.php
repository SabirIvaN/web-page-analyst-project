@extends('layouts.main')

@section('title', 'Domain')

@section('linkHome', '')
@section('linkHistory', 'active')

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
          <th scope="col">Content length</th>
          <th scope="col">Response code</th>
          <th scope="col">Tag of h1</th>
          <th scope="col">Tag of meta with keywords</th>
          <th scope="col">Tag of meta with description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <td>{{ $domain->name }}</td>
          <td>{{ $domain->created_at }}</td>
          <td>{{ $domain->updated_at }}</td>
          <td>{{ $domain->content_length }}</td>
          <td>{{ $domain->response_code }}</td>
          <td>{{ $domain->h1 }}</td>
          <td>{{ $domain->meta_keywords }}</td>
          <td>{{ $domain->meta_description }}</td>
        </tr>
    </tbody>
</table>
@endsection
