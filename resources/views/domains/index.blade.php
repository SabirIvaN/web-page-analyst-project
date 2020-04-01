@extends('layouts.main')

@section('title', 'Main Page')

@section('linkHome', 'active')
@section('linkHistory', '')

@section('navbar')
    @parent
@endsection

@section('content')
<div class="jumbotron container mt-4">
    <h1 class="display-4">Hello!</h1>
    <p class="lead">This is an SEO site validator. It will help you find out the mistakes made when creating a site and raise your site in the ranking.</p>
    <form class="form-group align-items-end" action="/domains" method="POST">
        <div class="form-group">
            <label for="urlSiteInputing">Enter the site URL</label>
            <div class="input-group w-100">
                <input type="text" class="form-control mr-1 rounded" id="urlSiteInputing" name="urlSiteInputing" placeholder="URL site">
                <button type="submit" id="urlSiteButton" class="btn btn-secondary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
