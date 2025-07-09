@extends('layouts.app')

@section('content')

<div>
  <div class="c_profile-frame10">
    <div class="c_profile-frame31 col-lg-12">
      <div class="c_profile-frame32">
        <div class="c_profile-frame33">
          <div class="c_profile-text32">
            <p class="c_profile-text33">Profile</p>
          </div>
        </div>
        <div class="c_profile-frame34 col-md-12">
          <div class="col-md-12">
            <form action="/account" method="post">
              @csrf
              <input type="text" name="id_user" value="{{$data[0]->id}}" hidden/>
              <!-- Name -->
              <div class="c_profile-frame36">
                <div class="c_profile-group1 form-group">
                  <div class="c_profile-text34 form-label">
                    <label class="c_profile-text35 account_label">Nama</label>
                  </div>
                  <div class="c_profile-text36">
                    <input type="text" class="form-control account_form" placeholder="Nama Anda" name="name" value="{{$data[0]->name}}" required/>
                  </div>
                </div>
              </div>
              <!-- Email -->
              <div class="c_profile-frame36">
                <div class="c_profile-group1 form-group">
                  <div class="c_profile-text34 form-label">
                    <label class="c_profile-text35 account_label">Email</label>
                  </div>
                  <div class="c_profile-text36">
                    <input type="email" class="form-control account_form" placeholder="Email Anda" name="email" value="{{$data[0]->email}}" required readonly/>
                  </div>
                </div>
              </div>
              <!-- Password -->
              <div class="c_profile-frame36">
                <div class="c_profile-group1 form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="c_profile-text34 form-label">
                        <label class="c_profile-text35 account_label">Password (Opsional)</label>
                      </div>
                      <div class="c_profile-text36">
                        <input type="password" class="form-control account_form" placeholder="Password Anda (opsional)" id="password" name="password" value="" onchange="check_pass()"/>
                      </div>
                      <div class="c_profile-text36">
                        <p class="c_request-pickup-text93 text-danger" id="check_password"></p>
                      </div>
                      <!-- @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror -->
                    </div>
                    <div class="col-md-6">
                      <div class="c_profile-text34 form-label">
                        <label class="c_profile-text35 account_label">Confirm Password (Opsional)</label>
                      </div>
                      <div class="c_profile-text36">
                        <input type="password" class="form-control account_form" placeholder="Confirm Password Anda (opsional)" id="c_password" name="c_password" onchange="check_c_pass()" value=""/>
                      </div>
                      <div class="c_profile-text36">
                        <p class="c_request-pickup-text93 text-danger" id="check_c_password"></p>
                      </div>
                      <!-- @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror -->
                    </div>
                  </div>
                  <!-- SCRIPT -->
                  <script>
                    function check_pass(){
                      var password = document.getElementById("password").value;
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
                      var password = document.getElementById("c_password").value;
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
              </div>
              <!-- Phone Number -->
              <div class="c_profile-frame36">
                <div class="c_profile-group1 form-group">
                  <div class="c_profile-text34 form-label">
                    <label class="c_profile-text35 account_label">Nomor Telepon</label>
                  </div>
                  <div class="c_profile-text36">
                    <input type="number" class="form-control account_form" placeholder="Nomor telepon anda" name="phone_number" value="{{$data[0]->phone_number}}" required/>
                  </div>
                </div>
              </div>
              <!-- Update Button -->
              <div class="c_profile-frame36">
                <div class="c_profile-group1 form-group">
                  
                  <div class="c_profile-text36 mt-4">
                    <input type="submit" class="btn btn-primary account_button" name="update_account" value="Simpan"/>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection