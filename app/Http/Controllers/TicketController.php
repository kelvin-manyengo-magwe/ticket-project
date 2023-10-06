<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
//use App\Notifications\TicketNotification;
use App\Models\Role;
use App\Models\Department;
use App\Models\Subdepartment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function __construct() {
      $this->middleware('auth'); //only autheniticated users to make ticket
    }

  public function index() {
    //fetch all the tickets through the ticket model
    $tickets = DB::table('tickets')
              ->join('users', 'users.id', '=', 'tickets.user_id')
              ->join('departments','departments.id', '=', 'tickets.department_id')
              ->join('sub_departments', 'sub_departments.id', '=', 'tickets.sub_department_id')
              ->get();

    //Role::create(['name'=>'user','guard_name'=>'web']);

    //or $tickets = Ticket::latest()->paginate(10);
//dd($tickets );


    return view('ticket.index', ['tickets' => $tickets]);
    //return view::make('sharks.index')->with('tickets',$tickets);
  }



  public function create(Request $request) {
    //for finding the updated ticket time
  //  $ticket = Ticket::find($id);

  //  $lastAccessed = $ticket->updated_at;
    $departments= Department::all();
    $sub_departments= Subdepartment::all();
    $users = User::all();
    return view('ticket.create', compact('departments','sub_departments','users'));
  }

  public function store(Request $request) {

    //  Validator::make(Input::all(), $data);
    $request->validate([
      'reporter_name'=>'required|string|max:255',
      'location'=>'required|string|max:255',
      'mobile_no'=>'required',
      'priority'=>'required|string',
      'problem'=>'required',
      'user_id'=>'required|exists:users,id',
      'department_id'=>'required|exists:departments,id',
      'sub_department_id'=>'required|exists:sub_departments,id',
    ]);

      //$insert = Ticket::create($data);
        $ticket = new Ticket;

        $ticket->reporter_name = $request->input('reporter_name');
        $ticket->location = $request->input('location');
        $ticket->mobile_no = $request->input('mobile_no');
        $ticket->priority = $request->input('priority');
        $ticket->problem = $request->input('problem');
        $ticket->department_id = $request->input('department_id');
        $ticket->sub_department_id = $request->input('sub_department_id');
        $ticket->ticket_image = $request->input('ticket_image');
        $ticket->user_id = $request->input('user_id');
        $ticket->comments = $request->input('comments');
        $ticket->due_date = $request->input('due_date');

          $ticket->save();
      return redirect(route('tickets.index'))->with('success','Ticket created successfully');
  }


  public function show($ticket_id) {
   $ticket = Ticket::where('ticket_id',$ticket_id)->firstOrFail();
    //$ticket= Ticket::all();
    return view('ticket.show', ['ticket' => $ticket]);
    //return redirect(route('tickets.show', ['ticket' => $ticket]))->with('message', 'Showing ticket no $ticket');
  }

  public function edit($ticket_id) {
      //get the ticket
      $ticket= Ticket::find($ticket_id);
      //show the ticket and pass the ticket

    /*  return Ticket::make('ticket.edit')
              ->with('ticket',$ticket); */

      return view('ticket.edit', ['ticket'=>$ticket]);
  }

  public function update(Request $request,Ticket $ticket) {
        $ticket->reporter_name= $request->reporter_name;
        $ticket->location= $request->mobile_no;
        $ticket->priority= $request->priority;
        $ticket->department= $request->department;
        $ticket->sub_department= $request->sub_department;
        $ticket->problem = $request->problem;

        $ticket->save();

    return redirect(route('tickets.show', ['ticket'=>$ticket]))->with('message', 'Ticket updated successfully');

  }

  public function destroy($id) {
    $ticket = Ticket::find($id);

    $ticket->delete();

    return redirect(route('tickets.index'))->with('message','Ticket deleted successfully');
  }

  public function myTicket() {
      $userId = Auth::id(); //fetch the ticket from the current user

      $ticket = DB::table('tickets')
                ->join('users','users.id', '=','tickets.user_id')
                ->where('tickets.user_id', $userId)
                ->get();

    return view('ticket.myTicket', ['ticket'=>$ticket]);
  }

/*  public function status($id) {
    $ticket = Ticket::find($id);
    return view('dashboard')->with('ticket',$ticket);
  } */

  /*public function notification(Request $request) {
      $notification = Ticket::create([
        'user_id' => Auth::user()->id,
        'priority'=> $request->priority
      ]);

    Ticket::find(Auth::user()->id)->notify(new TicketNotification($notification->priority));

    return redirect()->back()->with('status','You Have a new ticket!');
  }

  public function markAsRead() {
    Auth::user()->unreadNotifications->markAsRead();

    return redirect()->back();
  } */

}
