@extends('layouts.app')

@section('content')
<style>
    .card {
        transition: transform 0.2s, background-color 0.2s;
    }

    .card:hover {
        transform: scale(1.05);
        cursor: pointer; /* Change to your desired hover background color */
    }
    .card-title {
      font-size: 24px;
      font-weight: bold;
    }
    .card-text {
      font-size: 18px;
    }
    .card-footer {
      background-color: #fff;
    }

</style>

<div class="row justify-content-center" style="margin-left: 3%;">
    <div class="col-md-6">

          <table cellspacing="50px" cellpadding="50px">
              <tr>
                  <td>
                    <div class="card" style="width: 12rem">
                        <div class="card-body d-flex flex-row justify-content-between align-items-center">
                          <div>
                            <h4 class="card-title">{{$tickets->count()}}</h4>
                            <p class="card-text">Total tickets</p>
                          </div>
                            <div class="mt-auto"><div class="container bg-warning"><i class="bi bi-ticket-detailed" style="font-size: 3rem; color: white;"></i></div></div>
                        </div>

                    </div>
                  </td>

                  <td>
                    <div class="card" style="width: 12rem">
                        <div class="card-body d-flex flex-row justify-content-between align-items-center">
                          <div>
                            <h4 class="card-title">0</h4>
                            <p class="card-text">Solved tickets</p>
                          </div>
                            <div class="mt-auto"><div class="container bg-success"><i style="font-size: 3rem; color: white;" class="bi bi-check-circle"></i></div></div>
                        </div>

                    </div>
                  </td>
                  <td>
                    <div class="card" style="width: 12rem">
                        <div class="card-body d-flex flex-row justify-content-between align-items-center">
                          <div>
                            <h4 class="card-title">0</h4>
                            <p class="card-text">Unsolved tickets</p>
                          </div>
                            <div class="mt-auto"><div class="container bg-danger"><i style="font-size: 3rem; color: white;" class="bi bi-question-circle"></i></i></div></div>
                        </div>

                    </div>
                  </td>
              </tr>
              <tr>
                  <td>
                    <div class="card" style="width: 12rem">

                        <div class="card-body d-flex align-items-center justify-content-between flex-row">
                                <div>
                                  @php
                                    $pendingCount = $tickets->where('status','pending')->count();
                                  @endphp

                                @if($pendingCount > 0)
                                  <h4 class="card-title">{{$pendingCount}}</h4>
                                @endif
                          <p class="card-text">Pending tickets</p>
                                </div>
                              <div class="mt-auto"><div class="container bg-info"><i style="font-size: 3rem; color: white;" class="bi bi-hourglass-top"></i></div></div>
                        </div>


                    </div>
                  </td>

                  <td>
                    <div class="card" style="width: 12rem">
                        <div class="card-body d-flex flex-row justify-content-between">
                            <div>
                              <h4 class="card-title">{{$users->count()}}</h4>
                              <p class="card-text">Total Users</p>
                            </div>
                            <div class="mt-auto"><div class="container bg-primary"><i style="font-size: 3rem; color: white;" class="bi bi-people-fill"></i></div></div>
                        </div>

                    </div>
                </td>
                <td>
                  <div class="card" style="width: 12rem">
                      <div class="card-body d-flex flex-row justify-content-between align-items-center">
                        <div>
                          <h4 class="card-title">0</h4>
                          <p class="card-text">Inprogress tickets</p>
                        </div>
                          <div class="mt-auto"><div class="container bg-secondary"><i style="font-size: 3rem; color: white;" class="bi bi-arrow-repeat"></i></i></div></div>
                      </div>

                  </div>
                </td>
              </tr>

    </div>
</div>
@endsection
