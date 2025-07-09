@extends('layouts.app')

@section('content')
    <!-- ADMIN -->
    @if($data[0]->role == 'admin')
        <div class="c_home-frame32">
            <div class="c_home-frame33">
                <div class="col-lg-12">
                    <div class="c_home-text122">
                        <p class="c_home-text123" id="title"> Tambah Karyawan Baru </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form action="/thirdsidebar" method="POST">
                        @csrf
                        <input type="text" id="employee_id" name="employee_id" value="" hidden/>
                        <input type="text" class="col-md-12 form-control mb-3 employee_form" id="employee_name" name="employee_name" placeholder="Employee Name *" required/>
                        <input type="email" class="col-md-12 form-control mb-3 employee_form" id="employee_email" name="employee_email" placeholder="Employee Email *" required/>
                        <input type="password" class="col-md-12 form-control mb-3 employee_form" id="employee_password" onchange="check_pass()" name="employee_password" placeholder="Employee Password *" required/>
                        <p class="text-danger" id="check_password"></p>
                        <input type="password" class="col-md-12 form-control mb-3 employee_form" id="employee_c_password" name="employee_c_password" placeholder="Confirm Password *" onchange="check_c_pass()" required/>
                        <p class="text-danger" id="check_c_password"></p>
                        <input type="number" class="col-md-12 form-control mb-3 employee_form" id="employee_phone_number" name="employee_phone_number" placeholder="Employee Phone Number *" required/>
                        <input type="submit" class="col-md-3 btn btn-primary mb-3 employee_form" id="employee_register" name="employee_register" value="Tambah"/>
                    
                    </form>
                </div>
                <!-- SCRIPT -->
                <script>
                    function check_pass(){
                      var password = document.getElementById("employee_password").value;
                      if(password != ''){
                        if(password.length < 8){
                          document.getElementById("check_password").innerHTML = "Minimal 8 Karakter!"
                        }
                      }
                      else{
                        document.getElementById("check_password").innerHTML = ""
                      }
                    }
                    function check_c_pass(){
                      var password = document.getElementById("employee_c_password").value;
                      if(password != ''){
                        if(password.length < 8){
                          document.getElementById("check_c_password").innerHTML = "Minimal 8 Karakter!"
                        }
                      }
                      else{
                        document.getElementById("check_c_password").innerHTML = ""
                      }
                    }
                </script>
            </div>
            <div class="c_home-frame60">
                <div class="c_home-frame61">
                    <div class="c_home-frame62">
                        <div class="c_home-text192">
                            <p class="c_home-text193">List Karyawan</p>
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
                        <div class="c_home-frame67 col-md-2">
                            <div class="c_home-text196">
                                <p class="c_home-text197">ID Karyawan</p>
                            </div>
                        </div>
                        <div class="c_home-frame67 col-md-3">
                            <div class="c_home-text196">
                                <p class="c_home-text197">Nama Karyawan</p>
                            </div>
                        </div>
                        <div class="c_home-frame67 col-md-3">
                            <div class="c_home-text196">
                                <p class="c_home-text197">Email</p>
                            </div>
                        </div>
                        <div class="c_home-frame67 col-md-3">
                            <div class="c_home-text196">
                                <p class="c_home-text197">No Telepon</p>
                            </div>
                        </div>
                        <div class="c_home-frame67 col-md-1">
                            <div class="c_home-text196">
                                <p class="c_home-text197">Action</p>
                            </div>
                        </div>
                    </div>
                    @foreach($data[2] as $employee)
                        <div class="c_home-frame73 col-md-12">
                            <div class="c_home-frame74 col-md-2">
                                <div class="c_home-text208">
                                    <p class="c_home-text209" id="id_employee">{{$employee->id}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame74 col-md-3">
                                <div class="c_home-text208">
                                    <p class="c_home-text209">{{$employee->name}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame74 col-md-3">
                                <div class="c_home-text208">
                                    <p class="c_home-text209">{{$employee->email}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame74 col-md-3">
                                <div class="c_home-text208">
                                    <p class="c_home-text209">{{$employee -> phone_number}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame74 col-md-1">
                                <div class="c_home-text208">
                                    <button class="btn btn-primary" onclick="edit('{{$employee->id}}','{{$employee->name}}','{{$employee->email}}','{{$employee -> phone_number}}')">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <p class="c_home-text209"></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <script>
                function edit(id, name, email, phone_number){
                    document.getElementById('employee_id').value = id;
                    document.getElementById('employee_name').value = name;
                    document.getElementById('employee_email').value = email;
                    document.getElementById('employee_email').readOnly = true;
                    document.getElementById('employee_phone_number').value = phone_number;
                    document.getElementById('title').innerHTML = 'Edit Karyawan';
                    document.getElementById('employee_register').value = 'Ubah';
                }
                function check_email(){
                    var email = document.getElementById('employee_email').value;
                    
                }
            </script>
        </div>
    <!-- CUSTOMER -->
    @elseif ($data[0]->role == 'customer')
        <div class="c_home-frame32">
            <div class="c_home-frame60">
                <div class="c_home-frame61">
                
                    <div class="c_home-frame62">
                        <div class="c_home-text192">
                            <p class="c_home-text193">My Requests</p>
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

                        <div class="c_home-frame71">
                            <div class="c_home-text204">
                                <p class="c_home-text197">Transporter Staff</p>
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
                        <div class="c_home-frame73">
                            
                            <div class="c_home-frame74">
                                <div class="c_home-text208">
                                    <p class="c_home-text209">{{$requestpickup->id}}</p>
                                </div>
                            </div>
                            @php ($DT = explode(" ", $requestpickup->datetime) )
                            @php ($name = '')
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
                                            @php($name = $user -> name)
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
                                    <p class="c_home-text215">{{$requestpickup -> address}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame77">
                                <div class="c_home-text214">
                                    @php($employee = '')
                                    @if($requestpickup -> pickup_id == '')
                                        <p class="c_home-text215"> - </p>
                                    @else
                                        @php ($employee_name = App\Http\Controllers\ThirdSideBarController::getEmployeeName($requestpickup->pickup_id))
                                        @php($employee = $employee_name)
                                        <p class="c_home-text215">{{$employee_name}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="c_home-frame78">
                                <div class="c_home-text216">
                                    <p class="c_home-text217">{{$requestpickup -> status}}</p>
                                </div>
                            </div>
                            <div class="c_home-frame77">
                                <div class="c_home-text214">
                                    <div class="row">
                                        @if($requestpickup -> status == 'waiting for decision')
                                            <form action="/thirdsidebar" method="POST">
                                                @csrf
                                                <input type="text" value="{{$requestpickup->id}}" name="cust_cancel_request_id" hidden/>
                                                <input type="text" value="{{$requestpickup->cust_email}}" name="cust_email" hidden/>
                                                <input type="text" value="{{$name}}" name="cust_name" hidden/>
                                                <input type="text" value="{{$requestpickup->volume}}" name="volume" hidden/>
                                                <input type="text" value="Cancelled" name="status" hidden/>
                                                <input type="submit" class="btn btn-warning" name="cust_cancel_request" value="Cancel"/>
                                            </form>
                                        @else
                                            <form action="/chat" method="POST">
                                                @csrf
                                                <input type="text" value="{{$requestpickup->id}}" name="request_pickup_id" hidden/>
                                                <input type="text" value="{{$employee}}" name="employee_name" hidden/>
                                                <input type="submit" name="chat" value="Chat" class="btn btn-primary"/>
                                            </form>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <p class="c_home-text193">My Pickup</p>
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
                        <div class="c_home-frame75">
                            <div class="c_home-text200">
                                <p class="c_home-text197">Volume</p>
                            </div>
                        </div>
                        <div class="c_home-frame77">
                            <div class="c_home-text202">
                                <p class="c_home-text197">Pickup Address</p>
                            </div>
                        </div>
                        <div class="c_home-frame77">
                            <div class="c_home-text206">
                                <p class="c_home-text197">Action</p>
                            </div>
                        </div>
                        <div class="c_home-frame77">
                            <div class="c_home-text206">
                                <p class="c_home-text197">Chat</p>
                            </div>
                        </div>
                    </div>
                    @foreach($data[3] as $pickup)
                        @php ($requestpickup = App\Http\Controllers\ThirdSideBarController::getPickup($pickup->id))
                        @php ($name = '')
                        
                            <div class="c_home-frame73">
                                <div class="c_home-frame67">
                                    <div class="c_home-text208">
                                        <p class="c_home-text209">{{$requestpickup->id}}</p>
                                    </div>
                                </div>
                                @php ($DT = explode(" ", $requestpickup->datetime) )
                                <div class="c_home-frame67">
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
                                                @php($name = $user -> name)
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="c_home-frame75">
                                    <div class="c_home-text212">
                                        <p class="c_home-text213">{{$requestpickup -> volume}}</p>
                                    </div>
                                </div>
                                <div class="c_home-frame77">
                                    <div class="c_home-text214">
                                        <p class="c_home-text215">{{$requestpickup -> address}}</p>
                                    </div>
                                </div>
                                    <!-- show action employee -->
                                <div class="c_home-frame77">
                                    @if($requestpickup->status == 'Picked')
                                        <div class="c_home-text214">
                                            <form action="/thirdsidebar" method="POST">
                                                @csrf
                                                <input type="text" value="{{$requestpickup->id}}" name="action_request_id" hidden/>
                                                <input type="text" value="{{$requestpickup->pickup_id}}" name="pickup_id" hidden/>
                                                <input type="text" value="{{$requestpickup->cust_email}}" name="cust_email" hidden/>
                                                <input type="text" value="{{$name}}" name="cust_name" hidden/>
                                                <input type="text" value="{{$data[0]->email}}" name="employee_email" hidden/>
                                                <input type="text" value="{{$data[0]->name}}" name="employee_name" hidden/>
                                                <input type="text" value="{{$requestpickup->volume}}" name="volume" hidden/>
                                                <input type="text" value="Completed" name="status" hidden/>
                                                <input type="submit" class="btn btn-primary" name="complete" value="Complete"/>
                                                <input type="submit" class="btn btn-danger" name="cancel" value="Cancel"/>
                                            </form>
                                        </div>
                                    @elseif($requestpickup -> status =='Completed')
                                        <div class="c_home-frame78">
                                            <div class="c_home-text216">
                                                <p class="c_home-text217">{{$requestpickup -> status}}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="c_home-frame77">
                                    <div class="c_home-text214">
                                        <form action="/chat" method="POST">
                                            @csrf
                                            <input type="text" value="{{$requestpickup->id}}" name="request_pickup_id" hidden/>
                                            <input type="text" value="{{$name}}" name="cust_name" hidden/>
                                            <input type="submit" class="btn btn-primary" name="chat" value="Chat"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
        
    