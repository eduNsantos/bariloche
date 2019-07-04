@extends('templates.user')

@section('body')
    <vc-list 
        :data="{{ $users }}"
        route="{{ route('store') }}">
    </vc-list>
@endsection