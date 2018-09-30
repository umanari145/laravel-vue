@extends('common.layout')

@section('styleSheet')
@endsection

@section('JS')
	<script type="text/javascript" src="{{asset('js/address/address.js')}}"></script>
@endsection

@section('content')
<div id="app" v-cloak>
    <input type="hidden" id="site_url" value={{env('APP_URL')}}>
    @include('address.sub.pref')
    </form>
</div>
@endsection
