@extends('layouts.app')

@section('content')
    <div class="c_home-frame32">
        <div class="c_home-frame60">
            <div class="c_home-frame61">
                <div class="c_home-frame62">
                    <p class="c_home-text193">
                        {{ $data[0]->role === 'admin' ? 'Pickup List' : 'New Requests' }}
                    </p>
                </div>
                <div class="c_home-frame63">
                    <div class="c_home-frame64">
                        <img src="{{ url('/side-nav-img/3e086da3fc084094d0e0439b6a05519b.svg') }}" width="24" height="24"/>
                        <p class="c_home-text195">Search</p>
                    </div>
                </div>
            </div>

            <div class="c_home-frame65">
                @php
                    $isAdmin = $data[0]->role === 'admin';
                    $headers = $isAdmin 
                        ? ['Request ID', 'Date', 'Time', 'Customer', 'Volume', 'Pickup Address', 'Employee', 'Status'] 
                        : ['Request ID', 'Date', 'Time', 'Customer', 'Volume', 'Pickup Address', 'Status', 'Action'];
                @endphp

                @include('components.request-table-header', ['headers' => $headers])

                @foreach($data[1] as $request)
                    @if(in_array($request->status, ['waiting for decision', 'Picked']))
                        @include('components.request-table-row', [
                            'request' => $request,
                            'users' => $data[2],
                            'showEmployee' => $isAdmin || $request->pickup_id,
                            'showAction' => !$isAdmin
                        ])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
