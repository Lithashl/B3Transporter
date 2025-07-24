@php ($datetime = explode(" ", $request->datetime))
<div class="c_home-frame73">
    <div class="c_home-frame74"><p class="c_home-text209">{{ $request->id }}</p></div>
    <div class="c_home-frame74"><p class="c_home-text209">{{ $datetime[0] }}</p></div>
    <div class="c_home-frame74"><p class="c_home-text209">{{ $datetime[1] }}</p></div>

    <div class="c_home-frame75">
        @foreach ($users as $user)
            @if ($user->email == $request->cust_email)
                <p class="c_home-text211">{{ $user->name }}</p>
            @endif
        @endforeach
    </div>

    <div class="c_home-frame76"><p class="c_home-text213">{{ $request->volume }}</p></div>

    <div class="c_home-frame77">
        <a href="https://www.google.com/maps/place/?key=API_KEY&q={{ $request->address }}" target="_blank">
            {{ $request->address }}
        </a>
    </div>

    @if ($showEmployee)
        <div class="c_home-frame77">
            <p class="c_home-text215">
                {{ $request->pickup_id ? App\Http\Controllers\NewRequestController::getEmployeeName($request->pickup_id) : '-' }}
            </p>
        </div>
    @endif

    <div class="c_home-frame78"><p class="c_home-text217">{{ $request->status }}</p></div>

    @if ($showAction)
        <div class="c_home-frame77">
            @if ($request->status != 'Picked')
                <form action="/thirdsidebar" method="POST">
                    @csrf
                    <input type="hidden" name="request_id" value="{{ $request->id }}" />
                    <input type="submit" class="btn btn-primary" name="pick" value="Pick"/>
                </form>
            @else
                <input type="submit" class="btn btn-primary" value="Pick" disabled />
            @endif
        </div>
    @endif
</div>
