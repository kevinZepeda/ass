@extends('layouts.user')

{{-- Web site Title --}}
@section('title')
    {{ $title }}
@stop

{{-- Content --}}
@section('content')
    <div class="page-header clearfix">
        <div class="pull-right">
        </div>
    </div>
    <!-- ./ notifications -->
    @include('admin/'.$type.'/_form')
@stop

@section('scripts')
    <script>
    </script>
@endsection
