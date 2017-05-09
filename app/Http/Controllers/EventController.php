<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Comment;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
use Redirect;
use Input;
use Validator;
use Carbon\Carbon;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $q = $request->get('q');
        $event = Event::where('judul', 'LIKE', '%'.$q.'%')
            ->orWhere('judul', 'LIKE', '%'.$q.'%')
       ->orderBy('judul')->paginate(10);
        return view('event.index',compact('event','q'));

    }

     public function listku()
    {
        $event = Event::orderBy('id','desc')->paginate(5);
        return view('event.list',compact('event'));

    }


     public function autocomplate(Request $request)
    {
       
        $data = Event::select("judul as name")->where("judul","LIKE","%{$request->input('query')}%")
             ->get();
        return response()->json($data);
    }

    public function showPost(Event $event)
    {
        $comments = $event->comments()->get();
        return view('event.detail',compact('event','comments'));
    }

    public function newComment(Event $event, Request $request )
    {
        $valid = Validator::make($request->all(), [
                    'commenter' => 'required',
                    'email' => 'required',
                    'comment' => 'required',
                    //'tanggal' => 'required',
                                    ]);

        if ($valid->passes()) {
            $input = Input::all();
            $input['event_id'] = $event->id;
            Comment::create($input);
            $event->comment_count = Comment::where('event_id','=',$event->id)->count();
            $event->save();

        \Flash::success( 'Comment diterima');
        return redirect()->route('event.showup',$event->id);

        } else {
            # code...

        \Flash::success( 'Comment tidak diterima');
        return redirect()->route('event.showup',$event->id);
        }
        
    }

    public function create()
    {
        //
        return view('event.create');
    }

   
    public function store(Request $request)
    {
        //
         $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'image' => 'required',
            'tanggal' => 'required',
            
        ]);
        $data = $request->only('judul', 'konten');
        $date = str_replace('.', '-', $request->input('tanggal'));
        $tanggal = Carbon::createFromFormat('d-m-Y', $date)->toDateString();
        $data['tanggal'] = $tanggal;
        $data['read_more'] = (strlen($data['konten']) > 220) ? substr($data['konten'],0, 220) :$data['konten'];
         if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
        }

        $event = Event::create($data);
   
        \Flash::success('Judul '.$event->judul . ' saved.');
        return redirect()->route('event.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
         $event = Event::findOrFail($id);
        return view('event.edit',compact('event'));
    }

   
        public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'tanggal' => 'required',
             'image' => 'mimes:jpeg,jpg,png,PNG|max:10240',
        ]);
          $data = $request->only('judul', 'konten');
         if ($request->input('tanggal') == $event->tanggal) {
             $data['tanggal'] = $request->input('tanggal');
         }else{
        $data = $request->only('judul', 'konten');
        $date = str_replace('.', '-', $request->input('tanggal'));
        $tanggal = Carbon::createFromFormat('d-m-Y', $date)->toDateString();
        $data['tanggal'] = $tanggal;
         }
       

        if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
            if ($event->image !== '') $this->deletePhoto($event->image);
        }

        $event->update($data);
        

        \Flash::success($event->judul . ' updated.');
        return redirect()->route('event.index');
    }
    

    public function destroy($id)
    {
         $event = Event::find($id);
        if ($event->image !== '') $this->deletePhoto($event->image);
        $event->delete();
        \Flash::success('Acara dihapus.');
        return redirect()->route('event.index');
    }

    protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images/event';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }

     public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'images/event'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }


}
