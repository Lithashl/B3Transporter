@extends('layouts.app')

@section('content')
    @if($data[0]->role == 'customer')
        <div class="c_chat-cust-frame31">
            <div class="c_chat-cust-frame32">
                <div class="c_chat-cust-frame33">
                    <div class="c_chat-cust-frame34">
                        <div class="c_chat-cust-frame35">
                            <div class="c_chat-cust-text32">
                                <p class="c_chat-cust-text35">Chat with Vendor</p>
                            </div>
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="c_chat-cust-frame37 col-md-5">
                            @for ($i = 0; $i < 7 ; $i++)
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="c_chat-cust-text39 label">{{$data[4][$i]}}</p>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="c_chat-cust-text52">
                                            <p class="c_chat-cust-text53 equal">:</p>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="c_chat-cust-text39 detail">{{$data[5][$i]}}</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="c_chat-cust-frame66 col-md-6">
                        <div class="c_chat-cust-text84">
                            <p class="c_chat-cust-text85">Chat</p>
                        </div>
                        <img
                            src="assets/41d4f52078390557c53c04fd4da99a0b.svg"
                            alt="line"
                            width="800"
                            height="1.00006103515625"
                            class="c_chat-cust-line"
                        />
                        
                        <div class="c_chat-cust-frame67 mb-3" id="chat_view">
                            @php ($result = App\Http\Controllers\ChatController::view_message($data[3], $data[0]->role))
                        </div>
                        <div class="c_chat-cust-frame76">
                            <div class="c_chat-cust-frame77">
                                @if ($data[1]->status == 'Picked')
                                    <div class="c_chat-cust-frame78">
                                        <button class="btn btn-muted">
                                            <i class="bi bi-paperclip"></i>
                                        </button>
                                        <div class="c_chat-cust-frame79">
                                        <div class="c_chat-cust-text102">
                                            <input type="text" class="c_chat-cust-text103 form-control" id="chat" name="chat" placeholder="Write text here...."/>
                                            <!-- <p class="c_chat-cust-text103">Write text here....</p> -->
                                        </div>
                                        </div>
                                    </div>
                                    <div class="c_chat-cust-frame80">
                                        <button id="send_message" name="send_message" onclick="send_message()" class="btn btn-primary">
                                            <i class="bi bi-send"></i>
                                        </button>
                                    </div>
                                @elseif($data[1]->status == 'Completed')
                                    <div class="endsession col-md-12">    
                                        <h6>Sesi chat telah berakhir</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- AJAX for chat -->
                        <script>
                            function send_message(){
                                var message = document.getElementById('chat').value;
                                var xhttp;
                                if (message == "") { 
                                    document.getElementById("chat_view").innerHTML = "";
                                    return;
                                }
                                xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("chat_view").innerHTML = this.responseText;
                                    document.getElementById('chat').value = '';
                                    // alert(this.responseText);
                                }
                                };
                                // xhttp.open("GET", "/chat", true);
                                xhttp.open("GET", "/chat?request_pickup_id={{$data[1]->id}}&message="+message+"&role={{$data[0]->role}}", true);
                                xhttp.send();
                                // alert(this.responseText);
                            }
                        </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($data[0]->role == 'employee')
        <div class="c_chat-cust-frame31">
            <div class="c_chat-cust-frame32">
                <div class="c_chat-cust-frame33">
                    <div class="c_chat-cust-frame34">
                        <div class="c_chat-cust-frame35">
                            <div class="c_chat-cust-text32">
                                <p class="c_chat-cust-text35">Chat with Customer</p>
                            </div>
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="c_chat-cust-frame37 col-md-5">
                            @for ($i = 0; $i < 7 ; $i++)
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="c_chat-cust-text39 label">{{$data[4][$i]}}</p>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="c_chat-cust-text52">
                                            <p class="c_chat-cust-text53 equal">:</p>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="c_chat-cust-text39 detail">{{$data[5][$i]}}</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="c_chat-cust-frame66 col-md-6">
                        <div class="c_chat-cust-text84">
                            <p class="c_chat-cust-text85">Chat</p>
                        </div>
                        <img
                            src="assets/41d4f52078390557c53c04fd4da99a0b.svg"
                            alt="line"
                            width="800"
                            height="1.00006103515625"
                            class="c_chat-cust-line"
                        />
                        
                        <div class="c_chat-cust-frame67 mb-3" id="chat_view">
                            @php ($result = App\Http\Controllers\ChatController::view_message($data[3], $data[0]->role))
                        </div>
                        <div class="c_chat-cust-frame76">
                            <div class="c_chat-cust-frame77">
                                @if($data[1]->status == 'Picked')
                                    <div class="c_chat-cust-frame78">
                                        <button class="btn btn-muted">
                                            <i class="bi bi-paperclip"></i>
                                        </button>
                                        <div class="c_chat-cust-frame79">
                                        <div class="c_chat-cust-text102">
                                            <input type="text" class="c_chat-cust-text103 form-control" id="chat" name="chat" placeholder="Write text here...."/>
                                            <!-- <p class="c_chat-cust-text103">Write text here....</p> -->
                                        </div>
                                        </div>
                                    </div>
                                    <div class="c_chat-cust-frame80">
                                        <button id="send_message" name="send_message" onclick="send_message()" class="btn btn-primary">
                                            <i class="bi bi-send"></i>
                                        </button>
                                    </div>
                                @elseif($data[1]->status == 'Completed')
                                    <div class="endsession col-md-12">    
                                        <h6>Sesi chat telah berakhir</h6>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- AJAX for chat -->
                        <script>
                            function send_message(){
                                var message = document.getElementById('chat').value;
                                var xhttp;
                                if (message == "") { 
                                    document.getElementById("chat_view").innerHTML = "";
                                    return;
                                }
                                xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("chat_view").innerHTML = this.responseText;
                                    document.getElementById('chat').value = '';
                                    // alert(this.responseText);
                                }
                                };
                                // xhttp.open("GET", "/chat", true);
                                xhttp.open("GET", "/chat?request_pickup_id={{$data[1]->id}}&message="+message+"&role={{$data[0]->role}}", true);
                                xhttp.send();
                                // alert(this.responseText);
                            }
                        </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
                    
@endsection