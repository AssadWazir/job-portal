@extends('layouts.app') {{-- This wraps the main CSS/JS/Navbar --}}

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.partials.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-3">
                @yield('admin_content')
            </div>
        </main>
    </div>
</div>
@endsection