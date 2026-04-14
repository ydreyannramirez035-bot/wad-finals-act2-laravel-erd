@extends('layouts.app')

@section('content')
<h2>Edit Customer</h2>

<form method="POST" action="/customers/{{ $customer->id }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $customer->name }}">

    <button>Update</button>
</form>
@endsection