@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Ticket no {{$ticket->ticket_id}} information</div>
        <div class="card-body">
          @can('show-tickets')
          <div class="mt-3 mb-3">
            <a class="btn btn-primary" href="{{route('tickets.index')}}">Show All tickets</a>
          </div>
          @endcan

          @if(session()->has('message'))
          <div class="alert alert-success">
            <h3>{{session('message')}}</h3>
          </div>
          @endif

          <div class="row">
            <div class="col">
              <div class="font-weight-bold">Reporter name:</div>
              {{$ticket->priority}}
            </div>
            <div class="col">
              <div class="font-weight-bold">Reporter location:</div>
              {{$ticket->location}}
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
              <div class="font-weight-bold">Mobile no:</div>
              {{$ticket->mobile_no}}
            </div>
            <div class="col">
              <div class="font-weight-bold">Department:</div>
              {{$ticket->department}}
            </div>
            <div class="col">
                {{$ticket->ticket_image}}
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
              <div class="font-weight-bold">Subdepartment:</div>
              {{$ticket->sub_department}}
            </div>
            <div class="col">
              <div class="font-weight-bold">Created time of ticket:</div>
              <!--  {{date('jS M, Y',strtotime($ticket->created_at))}} strtotime it converts to the unix timestamps-->
              {{$ticket->created_at->diffForHumans()}}
            </div>
          </div>

          <div class="row mt-4">
            <div class="col text-center">
              @can('edit-ticket')
              <a href="{{route('tickets.edit', $ticket->ticket_id)}}" class="btn btn-primary">Edit ticket</a>
              @endcan
            </div>
            <div class="col text-center">
              @can('delete-ticket')
              <form method="POST" action="{{route('tickets.destroy', $ticket->ticket_id)}}">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete ticket" />
              </form>
              @endcan
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
