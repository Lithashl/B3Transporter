@extends('layouts.app')

@section('content')

<div>
  <div class="c_request-pickup-frame10">
    <div class="c_request-pickup-frame31">
      <div class="c_request-pickup-frame32">
        <div class="c_request-pickup-frame33">
          <div class="c_request-pickup-text32">
            <p class="c_request-pickup-text33">Request Pickup</p>
            <div id="request-pickup-header">Request Pickup</div>
            <!-- <p id="#request-pickup-header">{{__('Request Pickup')}}</p> -->
          </div>
        </div>
        <div class="c_request-pickup-frame34">
            <form method="POST" action="/requestpickup" enctype="multipart/form-data">
                @csrf
                <div class="row col-lg-12">
                    <div class="c_request-pickup-frame35 col-lg-6">
                        <div class="c_request-pickup-instance21">
                            <div class="c_request-pickup-text34">
                                <p class="c_request-pickup-text35">Name</p>
                            </div>
                            <div class="c_request-pickup-group1">
                                <input type="text" name="email" value="{{$data[0]->email}}" class="form-control" hidden/>
                                <input type="text" name="name" value="{{$data[0]->name}}" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="c_request-pickup-instance21">
                            <div class="c_request-pickup-text38">
                                <p class="c_request-pickup-text39">Volume</p>
                            </div>
                            <div class="c_request-pickup-group2">
                                <div class="c_request-pickup-frame36">
                                    <div class="c_request-pickup-text40">
                                        @if($data[3][0] == '')
                                            <input type="number" placeholder="minimal 20 liter" class="form-control" name="volume" value="20" min="20" required/>
                                        @else
                                            <input type="number" placeholder="minimal 20 liter" class="form-control" name="volume" value="{{$data[3][0]}}" min="20" required/>
                                        @endif
                                    </div>
                                    <div class="c_request-pickup-text42">
                                        <p class="c_request-pickup-text43">Liters</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="c_request-pickup-instance22">
                            <div class="c_request-pickup-text44">
                                <p class="c_request-pickup-text45">Pickup Address</p>
                            </div>
                            <div class="c_request-pickup-group3">
                                <div class="c_request-pickup-text46">
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Fill your Address" onchange="viewMap()"  required>
                                        @if($data[3][1] == '')
                                            sidosermo 4 gg 12
                                        @else
                                            {{$data[3][1]}}
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-12" id="map">
                                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q=sidosermo 4 gg 12" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <script>
                                function getAddress(){
                                    var address = document.getElementById('address').value;
                                    return address;
                                }
                                function viewMap(){
                                    if(!getAddress()){
                                        document.getElementById("map").innerHTML='<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q=sidosermo 4 gg 12" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                                        
                                    }
                                    else{
                                        document.getElementById("map").innerHTML='<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q='+getAddress()+'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                                    }
                                    // document.getElementById("map").innerHTML='<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q='+getAddress()+'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                                }
                            </script>
                        </div>
                        <div class="c_request-pickup-instance23">
                            <div class="c_request-pickup-text48">
                                <p class="c_request-pickup-text49">
                                    Date
                                </p>
                            </div>
                            <div class="c_request-pickup-group4">
                                <div class="c_request-pickup-frame38">
                                    <div class="c_request-pickup-text50">
                                        <input type="date" value="{{$data[1]}}" min="{{$data[1]}}" class="form-control" name="date" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="c_request-pickup-instance25">
                            <div class="c_request-pickup-text52">
                                <p class="c_request-pickup-text53">Time</p>
                            </div>
                            <div class="c_request-pickup-frame39">
                                <div class="c_request-pickup-frame40">
                                    <div class="c_request-pickup-text54">
                                        <p class="c_request-pickup-text55">Morning</p>
                                    </div>
                                    <div class="c_request-pickup-frame41">
                                        <div class="c_request-pickup-frame42">
                                            <div class="c_request-pickup-text56">
                                                @if($data[3][2] == '' OR $data[3][2] != '09:00')
                                                    <input type="radio" name="time" value="09:00" /> 09:00
                                                @else
                                                    <input type="radio" name="time" value="09:00" checked/> 09:00
                                                @endif
                                            </div>
                                        </div>
                                        <div class="c_request-pickup-frame43">
                                            <div class="c_request-pickup-text58">
                                                @if($data[3][2] == '' OR $data[3][2] != '10:00')
                                                    <input type="radio" name="time" value="10:00"/> 10:00
                                                @else
                                                    <input type="radio" name="time" value="10:00" checked
                                                    /> 10:00
                                                @endif
                                            </div>
                                        </div>
                                        <div class="c_request-pickup-frame44">
                                            <div class="c_request-pickup-text60">
                                                @if($data[3][2] == '' OR $data[3][2] != '11:00')
                                                    <input type="radio" name="time" value="11:00"/> 11:00
                                                @else
                                                    <input type="radio" name="time" value="11:00" checked/> 11:00
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="c_request-pickup-frame45">
                                    <div class="c_request-pickup-text62">
                                        <p class="c_request-pickup-text63">Afternoon</p>
                                    </div>
                                    <div class="c_request-pickup-frame46">
                                        <div class="c_request-pickup-frame47">
                                            <div class="c_request-pickup-text64">
                                                @if($data[3][2] == '' OR $data[3][2] != '13:00')
                                                    <input type="radio" name="time" value="13:00"/> 13:00
                                                @else
                                                    <input type="radio" name="time" value="13:00" checked/> 13:00
                                                @endif
                                            </div>
                                        </div>
                                        <div class="c_request-pickup-frame48">
                                            <div class="c_request-pickup-text66">
                                                @if($data[3][2] == '' OR $data[3][2] != '14:00')
                                                    <input type="radio" name="time" value="14:00"/> 14:00
                                                @else
                                                    <input type="radio" name="time" value="14:00" checked/> 14:00
                                                @endif
                                            </div>
                                        </div>
                                        <div class="c_request-pickup-frame49">
                                            <div class="c_request-pickup-text68">
                                                @if($data[3][2] == '' OR $data[3][2] != '15:00')
                                                    <input type="radio" name="time" value="15:00"/> 15:00
                                                @else
                                                    <input type="radio" name="time" value="15:00" checked/> 15:00
                                                @endif
                                            </div>
                                        </div>
                                        <div class="c_request-pickup-frame50">
                                            <div class="c_request-pickup-text70">
                                                @if($data[3][2] == '' OR $data[3][2] != '16:00')
                                                    <input type="radio" name="time" value="16:00"/> 16:00
                                                @else
                                                    <input type="radio" name="time" value="16:00" checked/> 16:00
                                                @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="c_request-pickup-frame51">
                                    <div class="c_request-pickup-text72">
                                        <p class="c_request-pickup-text73">Night</p>
                                    </div>
                                    <div class="c_request-pickup-frame52">
                                        <div class="c_request-pickup-frame53">
                                            <div class="c_request-pickup-text74">
                                                @if($data[3][2] == '' OR $data[3][2] != '19:00')
                                                    <input type="radio" name="time" value="19:00"/> 19:00
                                                @else
                                                    <input type="radio" name="time" value="19:00" checked/> 19:00
                                                @endif
                                            </div>
                                        </div>
                                        <div class="c_request-pickup-frame54">
                                            <div class="c_request-pickup-text76">
                                                @if($data[3][2] == '' OR $data[3][2] != '20:00')
                                                    <input type="radio" name="time" value="20:00"/> 20:00
                                                @else
                                                    <input type="radio" name="time" value="20:00" checked/> 20:00
                                                @endif
                                            </div>
                                        </div>
                                        <div class="c_request-pickup-frame55">
                                            <div class="c_request-pickup-text78">
                                                @if($data[3][2] == '' OR $data[3][2] != '21:00')
                                                    <input type="radio" name="time" value="21:00"/> 21:00
                                                @else
                                                    <input type="radio" name="time" value="21:00" checked/> 21:00
                                                @endif
                                            </div>
                                        </div>
                                        <div class="c_request-pickup-frame56">
                                            <div class="c_request-pickup-text80">
                                                @if($data[3][2] == '' OR $data[3][2] != '22:00')
                                                    <input type="radio" name="time" value="22:00"/> 22:00
                                                @else
                                                    <input type="radio" name="time" value="22:00" checked/> 22:00
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="c_request-pickup-instance26">
                            <div class="c_request-pickup-text82">
                                <p class="c_request-pickup-text83"> Additional Notes (Optional)</p>
                            </div>
                            <div class="c_request-pickup-group5">
                                <div class="c_request-pickup-text84">
                                    <textarea class="form-control" name="notes" rows="5" placeholder="Fill your Notes">
                                        @if($data[3][3] != '')
                                            {{$data[3][3]}}
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="c_request-pickup-instance27">
                            <div class="c_request-pickup-text86">
                                <p class="c_request-pickup-text87">Upload Photo</p>
                            </div>
                            <div class="c_request-pickup-group6">
                                <input type="file" name="upload" id="upload" onchange="previewFile()" class="form-control" required/>
                                <div class="c_request-pickup-text92">
                                    @if($data[3][4] == '')
                                        <p class="c_request-pickup-text93"> Upload max 2mb dengan file jpg, png.</p>
                                    @else
                                        <p class="c_request-pickup-text93 text-danger"> 
                                            {{$data[3][4]}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <script>
                                function previewFile() {
                                    const preview = document.getElementById('preview');
                                    const file = document.getElementById('upload').files[0];
                                    const reader = new FileReader();
                                
                                    // listen for 'load' events on the FileReader
                                    reader.addEventListener("load", function () {
                                        // change the preview's src to be the "result" of reading the uploaded file (below)
                                        preview.src = reader.result; //this section to change img preview
                                    }, false);
                                
                                    // if there's a file, tell the reader to read the data
                                    // which triggers the load event above
                                    if (file) {
                                        reader.readAsDataURL(file); //this section to read file data if data isset
                                    }
                                }
                            </script>
                        </div>
                        <div class="c_request-pickup-frame59 pt-5 col-lg-12">
                            <div class="c_request-pickup-instance28 col-lg-6">
                                <div class="c_request-pickup-text94">
                                    <p class="c_request-pickup-text95">Cancel</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary c_request-pickup-instance29 c_request-pickup-text96"/>
                            </div>
                        </div>
                    </div>
                    <div class="c_request-pickup-frame60 col-lg-6">
                        <div class="c_request-pickup-text98">
                        <p class="c_request-pickup-text99">Pratinjau Lampiran</p>
                        </div>
                        <div class="c_request-pickup-group7">
                            <img
                                src="assets/a9b730df58a4a7c2bf4cf4f1e3d8c024.svg"
                                alt=""
                                width="472"
                                height="718"
                                class="c_request-pickup-rectangle9" id="preview"
                            />
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
