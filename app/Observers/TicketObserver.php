<?php
namespace App\Observers;
use App\Models\Ticket;
use Illuminate\Support\Facades\Notification;

class TicketObserver
{
  /*  public function created(Ticket $ticket) {
      User::all()
      ->except($ticket->user->id)  //except the user who created the ticket
      ->each(function (User $user) use ($ticket) {
          $user->notify(new TicketCreated($ticket));
      });
    } */
}
