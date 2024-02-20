@extends('layouts.app')
@section('content')
@section('title', 'Registrazione')
<div class="container mt-3">

    <progress-bar></progress-bar>

    <register-form></register-form>
</div>

{{-- @vite(['resources/js/register_form.js'])
 --}}
@endsection