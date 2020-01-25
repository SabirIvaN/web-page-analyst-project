@extends('layouts.main')

@section('title', 'History')

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
        </tr>
    </thead>
    <tbody>
        @foreach($domains as $domain)
        <tr>
          <td>
              <a href="{{ route('domains.table', ['id' => $domain->id]) }}">{{ $domain->name }}</a>
          </td>
          <td>{{ $domain->created_at }}</td>
          <td>{{ $domain->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $domains->render() }}
@endsection
