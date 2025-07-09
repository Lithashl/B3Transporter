@extends('layouts.app')
@section('content')

    <!-- ADMIN  -->
    @if($data[0]->role == 'admin')
        <div class="c_home-frame32">
            <div class="c_home-frame60">
                <div class="c_home-frame61">
                    <div class="c_home-frame62">
                        <div class="c_home-text192">
                            <p class="c_home-text193">Pickup List</p>
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
                        <div class="c_home-frame67">
                            <div class="c_home-text194">
                                <p class="c_home-text197">Request ID</p>
                            </div>
                        </div>
                        <div class="c_home-frame67">
                            <div class="c_home-text196">
                                <p class="c_home-text197">Date</p>
                            </div>
                        </div>
                        <div class="c_home-frame74">
                            <div class="c_home-text198">
                                <p class="c_home-text197">Time</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text197">Customer</p>
                            </div>
                        </div>
                        <div class="c_home-frame69">
                            <div class="c_home-text200">
                                <p class="c_home-text197">Volume</p>
                            </div>
                        </div>
                        <div class="c_home-frame70">
                            <div class="c_home-text202">
                                <p class="c_home-text197">Pickup Address</p>
                            </div>
                        </div>
                        <div class="c_home-frame71">
                            <div class="c_home-text204">
                                <p class="c_home-text197">Employee</p>
                            </div>
                        </div>
                        <div class="c_home-frame72">
                            <div class="c_home-text206">
                                <p class="c_home-text197">Status</p>
                            </div>
                        </div>
                    </div>
                    @foreach($data[1] as $requestpickup)
                        @if ($requestpickup->status == 'waiting for decision' or $requestpickup->status == 'Picked')
                            <div class="c_home-frame73">
                                
                                <div class="c_home-frame74">
                                    <div class="c_home-text208">
                                        <p class="c_home-text209">{{$requestpickup->id}}</p>
                                    </div>
                                </div>
                                @php ($DT = explode(" ", $requestpickup->datetime) )
                                <div class="c_home-frame74">
                                    <div class="c_home-text208">
                                        <p class="c_home-text209">{{$DT[0]}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame74">
                                    <div class="c_home-text208">
                                        <p class="c_home-text209">{{$DT[1]}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame75">
                                    <div class="c_home-text210">
                                        @foreach ($data[2] as $user)
                                            @if ($user -> email == $requestpickup -> cust_email)
                                                <p class="c_home-text211">{{$user -> name}}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="c_home-frame76">
                                    <div class="c_home-text212">
                                        <p class="c_home-text213">{{$requestpickup -> volume}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame77">
                                    <div class="c_home-text214">
                                        <a href="https://www.google.com/maps/place/?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q={{$requestpickup -> address}}" target="_blank" class="c_home-text215">{{$requestpickup -> address}}</a>
                                    </div>
                                </div>
                                @if($requestpickup -> pickup_id == '') 
                                    <div class="c_home-frame75">
                                        <div class="c_home-text214">
                                            <p class="c_home-text217">-</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="c_home-frame77">
                                        <div class="c_home-text214">
                                            <p class="c_home-text215">
                                                @php ($employee_name = App\Http\Controllers\NewRequestController::getEmployeeName($requestpickup->pickup_id)) 
                                                {{$employee_name}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <!-- show status -->
                                <div class="c_home-frame78">
                                    <div class="c_home-text216">
                                        <p class="c_home-text217">{{$requestpickup -> status}}</p>
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
                    <div class="c_home-frame62">
                        <div class="c_home-text192">
                            <p class="c_home-text193">New Requests</p>
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
                        <div class="c_home-frame67">
                            <div class="c_home-text196">
                                <p class="c_home-text197">Request ID</p>
                            </div>
                        </div>
                        <div class="c_home-frame67">
                            <div class="c_home-text196">
                                <p class="c_home-text197">Date</p>
                            </div>
                        </div>
                        <div class="c_home-frame74">
                            <div class="c_home-text198">
                                <p class="c_home-text197">Time</p>
                            </div>
                        </div>
                        <div class="c_home-frame75">
                            <div class="c_home-text196">
                                <p class="c_home-text197">Customer</p>
                            </div>
                        </div>
                        <div class="c_home-frame69">
                            <div class="c_home-text200">
                                <p class="c_home-text197">Volume</p>
                            </div>
                        </div>
                        <div class="c_home-frame70">
                            <div class="c_home-text202">
                                <p class="c_home-text197">Pickup Address</p>
                            </div>
                        </div>
                        <div class="c_home-frame72">
                            <div class="c_home-text206">
                                <p class="c_home-text197">Status</p>
                            </div>
                        </div>
                        <div class="c_home-frame72">
                            <div class="c_home-text206">
                                <p class="c_home-text197">Action</p>
                            </div>
                        </div>
                    </div>
                    @foreach($data[1] as $requestpickup)
                        @if ($requestpickup->status == 'waiting for decision' or $requestpickup->status == 'Picked')
                            <div class="c_home-frame73">
                                
                                <div class="c_home-frame74">
                                    <div class="c_home-text208">
                                        <p class="c_home-text209">{{$requestpickup->id}}</p>
                                    </div>
                                </div>
                                @php ($DT = explode(" ", $requestpickup->datetime) )
                                <div class="c_home-frame74">
                                    <div class="c_home-text208">
                                        <p class="c_home-text209">{{$DT[0]}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame74">
                                    <div class="c_home-text208">
                                        <p class="c_home-text209">{{$DT[1]}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame75">
                                    <div class="c_home-text210">
                                        @foreach ($data[2] as $user)
                                            @if ($user -> email == $requestpickup -> cust_email)
                                                <p class="c_home-text211">{{$user -> name}}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="c_home-frame76">
                                    <div class="c_home-text212">
                                        <p class="c_home-text213">{{$requestpickup -> volume}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame77">
                                    <div class="c_home-text214">
                                        <a href="https://www.google.com/maps/place/?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q={{$requestpickup -> address}}" target="_blank" class="c_home-text215">{{$requestpickup -> address}}</a>
                                    </div>
                                </div>
                                @if($requestpickup -> pickup_id == '' or $data[0]->role=='employee') 
                                    <div class="c_home-frame78">
                                        <div class="c_home-text216">
                                            <p class="c_home-text217">{{$requestpickup -> status}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="c_home-frame77">
                                        <div class="c_home-text214">
                                            <p class="c_home-text215">
                                                @php ($employee_name = App\Http\Controllers\NewRequestController::getEmployeeName($requestpickup->pickup_id)) 
                                                {{$employee_name}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <!-- show action -->
                                <div class="c_home-frame77">
                                    <div class="c_home-text214">
                                        @if ($requestpickup->status != 'Picked')
                                            <form action="/thirdsidebar" method="POST">
                                                @csrf
                                                <input type="text" value="{{$requestpickup->id}}" name="request_id" hidden/>
                                                <input type="submit" class="btn btn-primary" name="pick" value="Pick"/>
                                            </form>
                                        @else
                                            <input type="submit" class="btn btn-primary" name="pick" value="Pick" disabled/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
        
    