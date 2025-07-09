@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
                                <div class="c_home-frame32">
                                    <div class="c_home-frame33">
                                    <div class="c_home-frame34">
                                        <div class="c_home-text122">
                                        <p class="c_home-text123">
                                            Welcome back, PT Clean Waste Indonesia
                                        </p>
                                        </div>
                                    </div>
                                    <div class="c_home-frame35">
                                        <div class="c_home-frame36">
                                        <div class="c_home-frame37">
                                            <img
                                            src="{{url('/side-nav-img/ae38c87d11ea64c6aad4a83618da97c2.svg')}}"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance20"
                                            />
                                        </div>
                                        <div class="c_home-text124">
                                            <p class="c_home-text125">Pending Requests</p>
                                        </div>
                                        <div class="c_home-text126">
                                            <p class="c_home-text127">5 Pickup Requests</p>
                                        </div>
                                        </div>
                                        <div class="c_home-frame38">
                                        <div class="c_home-frame39">
                                            <img
                                            src="{{url('/side-nav-img/578f241c49095b5dbefc5e2543aaf561.svg')}}"
                                            alt="component"
                                            width="24"
                                            height="24"
                                            class="c_home-component1"
                                            />
                                        </div>
                                        <div class="c_home-text128">
                                            <p class="c_home-text129">Ongoing Pickups</p>
                                        </div>
                                        <div class="c_home-text130">
                                            <p class="c_home-text131">2 Active Pickups</p>
                                        </div>
                                        </div>
                                        <div class="c_home-frame40">
                                        <div class="c_home-frame41">
                                            <img
                                            src="{{url('/side-nav-img/906c90f7443cbf48b56643aa38551e57.svg')}}"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance21"
                                            />
                                        </div>
                                        <div class="c_home-text132">
                                            <p class="c_home-text133">Completed This Month</p>
                                        </div>
                                        <div class="c_home-text134">
                                            <p class="c_home-text135">18 Pickups</p>
                                        </div>
                                        </div>
                                        <div class="c_home-frame42">
                                        <div class="c_home-frame43">
                                            <img
                                            src="{{url('/side-nav-img/c7ad204356bc4bf25e09489502c9a96b.svg')}}"
                                            alt="component"
                                            width="24"
                                            height="24"
                                            class="c_home-component2"
                                            />
                                        </div>
                                        <div class="c_home-text136">
                                            <p class="c_home-text137">Cancelled Requests</p>
                                        </div>
                                        <div class="c_home-text138">
                                            <p class="c_home-text139">1 Cancelled</p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="c_home-frame44">
                                    <div class="c_home-frame45">
                                        <div class="c_home-frame46">
                                        <div class="c_home-frame47">
                                            <div class="c_home-frame48">
                                            <div class="c_home-text140">
                                                <p class="c_home-text141">Bulan Januari</p>
                                            </div>
                                            <div class="c_home-text142">
                                                <p class="c_home-text143">+11%</p>
                                            </div>
                                            </div>
                                            <div class="c_home-frame49">
                                            <div class="c_home-text144">
                                                <p class="c_home-text145">Bulan Februari</p>
                                            </div>
                                            <div class="c_home-text146">
                                                <p class="c_home-text147">-1%</p>
                                            </div>
                                            </div>
                                            <div class="c_home-frame50">
                                            <div class="c_home-text148">
                                                <p class="c_home-text149">Bulan Maret</p>
                                            </div>
                                            <div class="c_home-text150">
                                                <p class="c_home-text151">+23%</p>
                                            </div>
                                            </div>
                                            <div class="c_home-frame51">
                                            <div class="c_home-text152">
                                                <p class="c_home-text153">Bulan April</p>
                                            </div>
                                            <div class="c_home-text154">
                                                <p class="c_home-text155">+25%</p>
                                            </div>
                                            </div>
                                            <div class="c_home-frame52">
                                            <div class="c_home-text156">
                                                <p class="c_home-text157">Bulan Mei</p>
                                            </div>
                                            <div class="c_home-text158">
                                                <p class="c_home-text159">+25.5%</p>
                                            </div>
                                            </div>
                                            <div class="c_home-frame53">
                                            <div class="c_home-text160">
                                                <p class="c_home-text161">Bulan Juni</p>
                                            </div>
                                            <div class="c_home-text162">
                                                <p class="c_home-text163">-</p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="c_home-text164">
                                        <p class="c_home-text165">Lihat Detail</p>
                                        </div>
                                    </div>
                                    <div class="c_home-frame54">
                                        <div class="c_home-text166">
                                        <p class="c_home-text167">Graphic Complete Pickup</p>
                                        </div>
                                        <img
                                        src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                        alt="line"
                                        width="766"
                                        height="0"
                                        class="c_home-line1"
                                        />
                                        <div class="c_home-group">
                                        <div class="c_home-frame55">
                                            <div class="c_home-frame56">
                                            <div class="c_home-instance22">
                                                <div class="c_home-text168">
                                                <p class="c_home-text169">20</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance23">
                                                <div class="c_home-text170">
                                                <p class="c_home-text171">16</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance24">
                                                <div class="c_home-text172">
                                                <p class="c_home-text173">12</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance25">
                                                <div class="c_home-text174">
                                                <p class="c_home-text175">8</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance26">
                                                <div class="c_home-text176">
                                                <p class="c_home-text177">4</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance27">
                                                <div class="c_home-text178">
                                                <p class="c_home-text179">0</p>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="c_home-frame57">
                                            <div class="c_home-instance28">
                                                <div class="c_home-text180">
                                                <p class="c_home-text181">November</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance29">
                                                <div class="c_home-text182">
                                                <p class="c_home-text183">Desember</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance30">
                                                <div class="c_home-text184">
                                                <p class="c_home-text185">Januari</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance31">
                                                <div class="c_home-text186">
                                                <p class="c_home-text187">Februari</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance32">
                                                <div class="c_home-text188">
                                                <p class="c_home-text189">Maret</p>
                                                </div>
                                            </div>
                                            <div class="c_home-instance33">
                                                <div class="c_home-text190">
                                                <p class="c_home-text191">April</p>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="c_home-frame58">
                                            <img
                                                src="{{url('/side-nav-img/c40eae1e813170a6dad51eced2ba8a12.svg')}}"
                                                alt="frame"
                                                width="745"
                                                height="185"
                                                class="c_home-frame59"
                                            />
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="c_home-frame60">
                                    <div class="c_home-frame61">
                                        <div class="c_home-frame62">
                                        <div class="c_home-text192">
                                            <p class="c_home-text193">Latest Pickup Requests Table</p>
                                        </div>
                                        </div>
                                        <div class="c_home-frame63">
                                        <div class="c_home-frame64">
                                            <img
                                            src="{{url('/side-nav-img/3e086da3fc084094d0e0439b6a05519b.svg')}}"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance34"
                                            />
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
                                            <p class="c_home-text197">Date</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame68">
                                            <div class="c_home-text198">
                                            <p class="c_home-text199">Type of Waste</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame69">
                                            <div class="c_home-text200">
                                            <p class="c_home-text201">Volume</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame70">
                                            <div class="c_home-text202">
                                            <p class="c_home-text203">Address</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame71">
                                            <div class="c_home-text204">
                                            <p class="c_home-text205">Status</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame72">
                                            <div class="c_home-text206">
                                            <p class="c_home-text207">Action</p>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="c_home-frame73">
                                        <div class="c_home-frame74">
                                            <div class="c_home-text208">
                                            <p class="c_home-text209">27/04/2025</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame75">
                                            <div class="c_home-text210">
                                            <p class="c_home-text211">Used Cooking Oil</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame76">
                                            <div class="c_home-text212">
                                            <p class="c_home-text213">3L</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame77">
                                            <div class="c_home-text214">
                                            <p class="c_home-text215">Jl. melati No.12, Jakarta</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame78">
                                            <div class="c_home-text216">
                                            <p class="c_home-text217">waiting for decision</p>
                                            </div>
                                            <img
                                            src="assets/4a1e8bc433c8a57095809bedda5e1b18.svg"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance35"
                                            />
                                        </div>
                                        <div class="c_home-frame79">
                                            <img
                                            src="assets/e11041a7fed67e3e633d09e475a68f5d.svg"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance36"
                                            />
                                        </div>
                                        </div>
                                        <img
                                        src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                        alt="line"
                                        width="1112"
                                        height="0"
                                        class="c_home-line2"
                                        />
                                        <div class="c_home-frame80">
                                        <div class="c_home-frame81">
                                            <div class="c_home-text218">
                                            <p class="c_home-text219">26/04/2025</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame82">
                                            <div class="c_home-text220">
                                            <p class="c_home-text221">Used Lubricant Oil</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame83">
                                            <div class="c_home-text222">
                                            <p class="c_home-text223">3L</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame84">
                                            <div class="c_home-text224">
                                            <p class="c_home-text225">Jl. Teratai No.15, Jakarta</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame85">
                                            <div class="c_home-text226">
                                            <p class="c_home-text227">waiting for decision</p>
                                            </div>
                                            <img
                                            src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance37"
                                            />
                                        </div>
                                        <div class="c_home-frame86">
                                            <img
                                            src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance38"
                                            />
                                        </div>
                                        </div>
                                        <img
                                        src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                        alt="line"
                                        width="1112"
                                        height="0"
                                        class="c_home-line3"
                                        />
                                        <div class="c_home-frame87">
                                        <div class="c_home-frame88">
                                            <div class="c_home-text228">
                                            <p class="c_home-text229">26/04/2025</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame89">
                                            <div class="c_home-text230">
                                            <p class="c_home-text231">Used Cooking Oil</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame90">
                                            <div class="c_home-text232">
                                            <p class="c_home-text233">2L</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame91">
                                            <div class="c_home-text234">
                                            <p class="c_home-text235">Jl. Mawar No.22, Jakarta</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame92">
                                            <div class="c_home-text236">
                                            <p class="c_home-text237">waiting for decision</p>
                                            </div>
                                            <img
                                            src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance39"
                                            />
                                        </div>
                                        <div class="c_home-frame93">
                                            <img
                                            src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance40"
                                            />
                                        </div>
                                        </div>
                                        <img
                                        src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                        alt="line"
                                        width="1112"
                                        height="0"
                                        class="c_home-line4"
                                        />
                                        <div class="c_home-frame94">
                                        <div class="c_home-frame95">
                                            <div class="c_home-text238">
                                            <p class="c_home-text239">25/04/2025</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame96">
                                            <div class="c_home-text240">
                                            <p class="c_home-text241">Used Lubricant Oil</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame97">
                                            <div class="c_home-text242">
                                            <p class="c_home-text243">4L</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame98">
                                            <div class="c_home-text244">
                                            <p class="c_home-text245">Jl. Kenanga No.3, Jakarta</p>
                                            </div>
                                        </div>
                                        <div class="c_home-frame99">
                                            <div class="c_home-text246">
                                            <p class="c_home-text247">waiting for decision</p>
                                            </div>
                                            <img
                                            src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance41"
                                            />
                                        </div>
                                        <div class="c_home-frame100">
                                            <img
                                            src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                            alt="instance"
                                            width="24"
                                            height="24"
                                            class="c_home-instance42"
                                            />
                                        </div>
                                        </div>
                                        <img
                                        src="assets/data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7.svg"
                                        alt="line"
                                        width="1112"
                                        height="0"
                                        class="c_home-line5"
                                        />
                                    </div>
                                    </div>
                                </div>

@endsection
