@extends('common.layout')

@section('styleSheet')
@endsection

@section('JS')
	<script type="text/javascript" src="{{asset('js/address/address.js')}}"></script>
@endsection

@section('content')
<div id="app" v-cloak>
    @include('address.sub.pref')
</div>
@endsection
