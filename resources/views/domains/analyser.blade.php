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
        <form class="form-row align-items-end" action="/domains" method="POST">
            <div class="col">
                <label for="urlSiteInputing">Enter the site URL</label>
                <div class="input-group">
                    <input type="text" class="form-control mr-1" id="urlSiteInputing" name="urlSiteInputing" placeholder="URL site">
                </div>
            </div>
            <div class="col">
                <button type="submit" id="urlSiteButton" class="btn btn-secondary">Submit</button>
            </div>
        </form>
    </div>
@endsection
