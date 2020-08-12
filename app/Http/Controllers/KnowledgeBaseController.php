
<?php

// namespace App\Http\Controllers;

use App\KnowledgeBase;
use App\Http\Controllers\Traits\MediaUploadingTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class KnowledgeBaseController extends Controller
{
    use MediaUploadingTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('knowledgebase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title'         => 'required',
    //         'description'   => 'required',
    //     ]);

    //     // $request->request->add([
    //     //     'category_id'   => 1,
    //     //     'status_id'     => 1,
    //     //     'priority_id'   => 1
    //     // ]);
        
    //     $knowledgebase = KnowledgeBase::create($request->all());
        
        
    //     foreach ($request->input('attachments', []) as $file) {
    //         $knowledgebase->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
    //     }
    //     // $author_name = knowledgebase::where('author_name',$request->input('author_name'))->get('author_name');
    //     // $knowledgebase_title = knowledgebase::where('title',$request->input('title'))->get('title');
    //     // $author_email = knowledgebase::where('author_email',$request->input('author_email'))->get('author_email');
    //     // $knowledgebase_id = knowledgebase::where('title',$request->input('title'))->get('id');
    //     // $email_autor = $author_email[0]->author_email;
    //     // $nombre_autor = $author_name[0]->author_name;
    //     // $asunto_knowledgebase = $knowledgebase_title[0]->title;
    //     // $id_knowledgebase = $knowledgebase_id[0]->id;
    //     // dd($author_email);
       
    //     // Mail::to($author_email);
        
    //     // $data = [
    //     //     'author_name' => $nombre_autor,
    //     //     'author_email' => $email_autor,
    //     //     'knowledgebase_id' => $id_knowledgebase,
    //     //     'knowledgebase_title' => $asunto_knowledgebase,
    //     // ];
    //     // $comentario = "Funcion4";
    //     //$knowledgebase->sendCommentNotification($comment);
        
    //     // $notification = new ConfirmationEmailNotification($data);
    //     // Notification::route('mail', $email_autor)->notify($notification);//puede ser para enviar el correo
    // //    Notification::send($author_email, new DataChangeEmailNotification($data[$knowledgebase_id[0]->id]));
    //     // Notification::send($author_email, new DataChangeEmailNotification($knowledgebase_title));
    //     // $user = $knowledgebase('author_email');

    //     // Mail::to($user); 
    //     // return redirect()->back()->withStatus('Su knowledgebase ha sido enviado, estaremos en contacto. Puede ver el estado del knowledgebase <a href="'.route('knowledgebases.show', $knowledgebase->id).'">Aquí</a>');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\knowledgebase  $knowledgebase
     * @return \Illuminate\Http\Response
     */
    public function show(KnowledeBase $knowledgebase)
    {
        $knowledgebase->load('comments');

        return view('knowledgebases.show', compact('knowledgebase'));
    }
}
