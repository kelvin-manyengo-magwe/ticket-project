@extends('layouts.app')

@section('content')
<div class="panel" style="margin-left: 22%">
  <div class="panel-head"><h4>My Tickets</h4></div>

    <div class="panel-body mt-4">
        <div class="table-responsive">
            <table class="table" style="padding: 15px;">
                <tr style="background-color: #ffffe6;">
                    <th>Id</th>
                    <th>Assigned to</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Created by<th>
                    <th colspan="2"></th>
                </tr>
                @foreach($ticket as $ticket)
                <tr>
                    <td>{{$ticket->ticket_id}}</td>
                    <td>{{$ticket->name}}</td>
                    <td>{{$ticket->priority}}</td>
                    <td class="badge bg-warning mt-2">{{$ticket->status}}</td>
                    <td width="150px">{{$ticket->created_at}}<br/>({{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans()}})</td>
                    <td width="150px">{{$ticket->updated_at}}<br/>({{ \Carbon\Carbon::parse($ticket->updated_at)->diffForHumans()}})</td>
                    <td>Created by</td>

                    <!--Edit modal -->
                    <td><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-eye"></i></a>&nbsp&nbsp
                          <!--Modal-->
                              <div class="modal fade" id="exampleModal" tabindex="-1">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title">My Ticket</h5>
                                              <button style="background: none; border-width: 0; color: white;" class="close bg-danger" type="button" data-dismiss="modal" aria-label="Close">X</button>
                                          </div>
                                          <div class="modal-body">

                                              <div class="form-group">
                                                <b>--Problem</b><br/>
                                                  {{$ticket->problem}}
                                              </div>

                                              <div class="form-group">
                                                  <b>Due date</b><br/>
                                                  {{$ticket->due_date}}
                                              </div>
                                              <div class="form-group">
                                                <label for="problem">--Comments--</label>
                                                  <textarea class="form-control"></textarea>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          <!--End modal-->

                      <a href="" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
