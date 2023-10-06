@extends('layouts.app')

@section('content')
      <div class="panel" style="margin-left: 22%;">
          <div class="panel-head">
            <h1 class="lead">List of tickets</h1>
          </div>

          @if(session()->has('success'))
            <div class="alert alert-success">
                <h5>{{session('success')}}</h5>
            </div>
          @endif

          @can('create-ticket')
          <div class="panel-head" style="float: right;"><a href="/tickets/create" class="btn btn-primary">Create ticket</a></div>
            @endcan

          <div class="panel-body">
              <table class="table table-bordered p-4">
                  <thead>
                    <tr class="p-4">
                      <th>Ticket no</th>
                      <th>Reporter name</th>
                      <th>Priority</th>
                      <th width="100px">Status</th>
                      <th>Department</th>
                      <th>Sub department</th>
                      <th>Assigned to</th>
                      <th>Problem description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tickets as $ticket)
                      <tr>
                        <th>{{$ticket->ticket_id}}</th>
                        <td>{{$ticket->reporter_name}}</td>
                        <td>{{$ticket->priority}}</td>
                        <td><div class="badge bg-warning">{{$ticket->status}}</div></td>
                        <td>{{$ticket->department_name}}</td>
                        <td>{{$ticket->sub_department_name}}</td>
                        <td>{{$ticket->name}}</td>
                        <td>{{$ticket->problem}}</td>
                        <td>
                          @can('show-ticket')

                            <a class="btn btn-primary btn-small" href="{{route('tickets.show', $ticket->ticket_id)}}">Show ticket</a>
                          @endcan
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
@endsection
