@extends('..layouts/admin')
@section('content')
<meta name="clostro" content="{{ route('num_users') }}">
<div id="dashboard-admin">
    <dashboard-quickview></dashboard-quickview>
</div>
@endsection