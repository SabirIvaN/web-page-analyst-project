@extends('layouts.main')

@section('title', 'Main Page')

@section('linkHome', 'active')
@section('linkHistory', '')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Hello!</h1>
        <p class="lead">This is an SEO site validator. It will help you find out the mistakes made when creating a site and raise your site in the ranking.</p>
        <form action="/domains" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Enter the site URL</label>
                <input type="text" class="form-control" id="urlSiteInputing" name="urlSiteInputing" placeholder="URL site">
            </div>
            <button type="submit" id="urlSiteButton" class="btn btn-secondary">Submit</button>
        </form>
    </div>
@endsection
