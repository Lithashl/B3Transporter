@extends('layouts.app')

@section('content')
    <!-- ADMIN -->
    @if($data[0]->role == 'admin')
        <div class="c_home-frame32">
            <div class="c_home-frame60">
                <div class="c_home-frame61">
                    <div class="c_home-frame62">
                        <div class="c_home-text192">
                            <p class="c_home-text193">Pickup History</p>
                        </div>
                    </div>
                    <div class="c_home-frame63">
                        <div class="c_home-frame64">
                            <img src="{{url('/side-nav-img/3e086da3fc084094d0e0439b6a05519b.svg')}}" alt="instance" width="24" height="24" class="c_home-instance34"/>
                            <div class="c_home-text194">
                                <p class="c_home-text195">Search</p>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="c_home-frame65">
                    <div class="c_home-frame66 col-md-12">
                        <div class="c_home-frame75 col-md-1">
                            <div class="c_home-text196">
                                <p class="c_home-text209">History ID</p>
                            </div>
                        </div>
                        <div class="c_home-frame75 col-md-3">
                            <div class="c_home-text196">
                                <p class="c_home-text211">Staff Pengemudi</p>
                            </div>
                        </div>
                        <div class="c_home-frame75 col-md-3">
                            <div class="c_home-text196">
                                <p class="c_home-text211">Nama Supplier</p>
                            </div>
                        </div>
                        <div class="c_home-frame75 col-md-1">
                            <div class="c_home-text198">
                                <p class="c_home-text213">Volume</p>
                            </div>
                        </div>
                        <div class="c_home-frame75 col-md-2">
                            <div class="c_home-text196">
                                <p class="c_home-text213">Status</p>
                            </div>
                        </div>
                        <div class="c_home-frame75 col-md-2">
                            <div class="c_home-text196">
                                <p class="c_home-text213">Date Time</p>
                            </div>
                        </div>
                    </div>
                    @foreach($data[1] as $pickup_history)
                        <div class="c_home-frame73">
                            <div class="c_home-frame75 col-md-1">
                                <div class="c_home-text208">
                                    <p class="c_home-text209">{{$pickup_history->id}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame75 col-md-3">
                                <div class="c_home-text208">
                                    <p class="c_home-text209">{{$pickup_history -> employee_name}}</p>         
                                </div>
                            </div>
                            <div class="c_home-frame75 col-md-3">
                                <div class="c_home-text208">
                                    <p class="c_home-text209">{{$pickup_history -> cust_name}}</p>         
                                </div>
                            </div>
                            <div class="c_home-frame75 col-md-1">
                                <div class="c_home-text208">
                                    <p class="c_home-text213">{{$pickup_history -> volume}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame78 col-md-2">
                                <div class="c_home-text216">
                                    <p class="c_home-text217">{{$pickup_history -> status}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame75 col-md-2">
                                <div class="c_home-text208">
                                    <p class="c_home-text213">{{$pickup_history -> updated_at}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    <!-- CUSTOMER -->
    @elseif ($data[0]->role == 'customer')
        <div class="c_home-frame32">
            <div class="c_home-frame60">
                <div class="c_home-frame61">
                    <div class="c_home-frame62">
                        <div class="c_home-text192">
                            <p class="c_home-text193">Pickup History</p>
                        </div>
                    </div>
                    <div class="c_home-frame63">
                        <div class="c_home-frame64">
                            <img src="{{url('/side-nav-img/3e086da3fc084094d0e0439b6a05519b.svg')}}" alt="instance" width="24" height="24" class="c_home-instance34"/>
                            <div class="c_home-text194">
                                <p class="c_home-text195">Search</p>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="c_home-frame65">
                    <div class="c_home-frame66">
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text209">History ID</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text211">Customer Name</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text198">
                                <p class="c_home-text213">Volume</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text213">Status</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text213">Date Time</p>
                            </div>
                        </div>
                    </div>
                    @foreach($data[1] as $pickup_history)
                        @if($pickup_history->status != 'Cancelled' || ($pickup_history->status == 'Cancelled' && $pickup_history->employee_email = '-' ))
                            <div class="c_home-frame73">
                                <div class="c_home-frame75">
                                    <div class="c_home-text208">
                                        <p class="c_home-text209">{{$pickup_history->id}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame75">
                                    <div class="c_home-text210">
                                        <p class="c_home-text211">{{$pickup_history -> cust_name}}</p>         
                                    </div>
                                </div>
                                <div class="c_home-frame75">
                                    <div class="c_home-text212">
                                        <p class="c_home-text213">{{$pickup_history -> volume}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame78">
                                    <div class="c_home-text216">
                                        <p class="c_home-text217">{{$pickup_history -> status}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame75">
                                    <div class="c_home-text212">
                                        <p class="c_home-text213">{{$pickup_history -> updated_at}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    <!-- EMPLOYEE -->
    @else
        <div class="c_home-frame32">
            <div class="c_home-frame60">
                <div class="c_home-frame61">
                <!-- EMPLOYEE -->
                    <div class="c_home-frame62">
                        <div class="c_home-text192">
                            <p class="c_home-text193">Pickup History</p>
                        </div>
                    </div>
                    <div class="c_home-frame63">
                        <div class="c_home-frame64">
                            <img src="{{url('/side-nav-img/3e086da3fc084094d0e0439b6a05519b.svg')}}" alt="instance" width="24" height="24" class="c_home-instance34"/>
                            <div class="c_home-text194">
                                <p class="c_home-text195">Search</p>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="c_home-frame65">
                    <div class="c_home-frame66">
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text209">History ID</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text211">Customer Name</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text198">
                                <p class="c_home-text213">Volume</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text213">Status</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text213">Date Time</p>
                            </div>
                        </div>
                    </div>
                    @foreach($data[1] as $pickup_history)
                        <div class="c_home-frame73">
                            <div class="c_home-frame75">
                                <div class="c_home-text208">
                                    <p class="c_home-text209">{{$pickup_history->id}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame75">
                                <div class="c_home-text210">
                                    <p class="c_home-text211">{{$pickup_history -> cust_name}}</p>         
                                </div>
                            </div>
                            <div class="c_home-frame75">
                                <div class="c_home-text212">
                                    <p class="c_home-text213">{{$pickup_history -> volume}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame78">
                                <div class="c_home-text216">
                                    <p class="c_home-text217">{{$pickup_history -> status}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame75">
                                <div class="c_home-text212">
                                    <p class="c_home-text213">{{$pickup_history -> updated_at}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection