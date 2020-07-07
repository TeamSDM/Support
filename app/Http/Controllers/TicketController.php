<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Notifications\CommentEmailNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ConfirmationEmailNotification;

use Illuminate\Database\Eloquent\Model;
use Mail;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    use MediaUploadingTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'author_name'   => 'required',
            'author_email'  => 'required|email',
        ]);

        $request->request->add([
            'category_id'   => 1,
            'status_id'     => 1,
            'priority_id'   => 1
        ]);
        
        $ticket = Ticket::create($request->all());
        
        
        foreach ($request->input('attachments', []) as $file) {
            $ticket->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }
        $author_name = Ticket::where('author_name',$request->input('author_name'))->get('author_name');
        $ticket_title = Ticket::where('title',$request->input('title'))->get('title');
        $author_email = Ticket::where('author_email',$request->input('author_email'))->get('author_email');
        $ticket_id = Ticket::where('title',$request->input('title'))->get('id');
        $email_autor = $author_email[0]->author_email;
        $nombre_autor = $author_name[0]->author_name;
        $asunto_ticket = $ticket_title[0]->title;
        $id_ticket = $ticket_id[0]->id;
       
        // Mail::to($author_email);
        
        
        
        
        $data = [
            'author_name' => $nombre_autor,
            'author_email' => $email_autor,
            'ticket_id' => $id_ticket,
            'ticket_title' => $asunto_ticket,
        ];
        // $comentario = "Funcion4";
        //$ticket->sendCommentNotification($comment);
        
        $notification = new ConfirmationEmailNotification($data);
        Notification::route('mail', $email_autor)->notify($notification);//puede ser para enviar el correo
    //    Notification::send($author_email, new DataChangeEmailNotification($data[$ticket_id[0]->id]));
        // Notification::send($author_email, new DataChangeEmailNotification($ticket_title));
        // $user = $ticket('author_email');

        // Mail::to($user); 
        return redirect()->back()->withStatus('Su Ticket ha sido enviado, estaremos en contacto. Puede ver el estado del Ticket <a href="'.route('tickets.show', $ticket->id).'">Aquí</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $ticket->load('comments');

        return view('tickets.show', compact('ticket'));
    }

    public function storeComment(Request $request, Ticket $ticket)
    {
        $request->validate([
            'comment_text' => 'required'
        ]);

        $comment = $ticket->comments()->create([
            'author_name'   => $ticket->author_name,
            'author_email'  => $ticket->author_email,
            'comment_text'  => $request->comment_text
        ]);

        $ticket->sendCommentNotification($comment);

        return redirect()->back()->withStatus('Su comentario ha sido añadido con éxito');
    }
}
