@extends('layouts.tabler')

@section('content')
<div class="page-body">
    <div class="container-xl">
        @livewire('tables.product-by-brand-table', ['brand' => $brand])
    </div>
</div>
@endsection
