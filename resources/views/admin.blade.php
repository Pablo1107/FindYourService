@extends('layout')

@section('content')
<div id="app"></div>
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ $google->apiKey }}&libraries=places&"></script>
<script src="../js/admin.js"></script>
@endsection
