@extends('layouts.app')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <form method="POST" action="{{ route('deposit') }}">
  @csrf
  <h5 class="text-center mb-3">Make A Deposit</h5>
  <div class="row mb-3">
      <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>
      <div class="col-md-6">
          <input id="amount" type="number" class="form-control @error('amount') is-invalid
          @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>
          @error('amount')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>
  <div class="row mb-0">
      <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
              {{ __('Deposit') }}
          </button>
          <ul class="nav-bar">
            <li class="nav-item dropdown">
  <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      <i class="fa fa-bell"></i>
      <span class="badge badge-light bg-success badge-xs">{{auth()->user()->unreadNotifications->count()}}</span>
  </a>
  <ul class="dropdown-menu">
              @if (auth()->user()->unreadNotifications)
              <li class="d-flex justify-content-end mx-1 my-2">
                  <a href="{{route('mark-as-read')}}" class="btn btn-success btn-sm">Mark All as Read</a>
              </li>
              @endif

              @foreach (auth()->user()->unreadNotifications as $notification)
              <a href="#" class="text-success"><li class="p-1 text-success"> {{$notification->data['data']}}</li></a>
              @endforeach
              @foreach (auth()->user()->readNotifications as $notification)
              <a href="#" class="text-secondary"><li class="p-1 text-secondary"> {{$notification->data['data']}}</li></a>
              @endforeach
  </ul>
  </li>

          </ul>
      </div>
      <!--navigation-->
          
      <!--navigation-->
  </div>
</form>


        </div>
    </div>
</div>
