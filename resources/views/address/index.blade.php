@extends('common.layout')

@section('styleSheet')
@endsection

@section('JS')
<<<<<<< HEAD

=======
	<script type="text/javascript" src="{{asset('js/address/address.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/common.js')}}"></script>
>>>>>>> legacy
@endsection

@section('content')
<div id="app" v-cloak>
    <pref-component></pref-component>
</div>
@endsection
