<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\DB;


class PrevController extends Controller
{
    public function index()
    {
        $employee = Employee::paginate(10);
        $position = Position::all();

        return view('employee',
        ['title' => 'Employee']
        
        )->with('position',$position)->with('employee',$employee);
    }

    public function search(Request $request)
    {
        // catch data from input form
        $search = $request->search;
        // matching data catched with data in the table 
        $employee = Employee::where('name','like',"%".$search."%")->paginate(); 

        // Displaying data to view
        return view('employee',[
            'employee' => $employee
        ]);
    }

    public function add()
    {
    $position = Position::all();
        return view('addEmployee',[
            'position' => $position
        ]);
    }
    public function store(Request $request)
    {

        $messages = [
            'required' => ':attribute must be fil',
            'numeric' => ':attribute must be number',
            'size' => 'the :attribute must be exactly :size '

        ];
        $this->validate($request, [
            'name' => 'required',
            'numemp' => 'required',
            'position_id' => 'required'
        ]);
        Employee::create([
            'name' => $request->name,
            'numemp' => $request->numemp,
            'position_id' => $request->position_id
        ]);

        return redirect('/employee');
    }

    public function edit($id)
    {
        $employee = Employee::find(decrypt($id));

        $position = Position::all();
        return view('editEmployee',[
            'position' => $position,
            'employee' => $employee

        ]);

    }

    public function update($id, Request $request)
    {

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->alamat = $request->address;
        $employee->numemp = $request->numemp;
        $employee->position_id = $request->position;
        // dd($request->position);np
        $employee->save();
        return redirect('/employee');

    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->back();
    }

    public function trash()
    {
        $trash = Employee::onlyTrashed()->get();
    	return view('trashEmployee', ['trash' => $trash]);
    }

    public function restore($id)
    {
    	$trash = Employee::onlyTrashed()->where('id',$id);
    	$trash->restore();
    	return redirect('/employee/trash');
    }

    public function deletePermanent($id)
    {
    	$trash = Employee::onlyTrashed()->where('id',$id);
        $trash->forceDelete();
        return redirect('/employee/trash');

    }

    public function restoreAll()
    {
        $trash = Employee::onlyTrashed();
        $trash->restore();
    	return view('trashEmployee', ['trash' => $trash]);
    }

    public function depall()
    {
        $trash = Employee::onlyTrashed();
    	$trash->forceDelete();
        return redirect('employee/trash');
    }

    // Upload file
    public function upload()
    {
        return view('upload');
    }

    public function proccess(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        // Store file data to $file
        $file = $request->file('file');

        // naming file
        echo 'File name: '.$file->getClientOriginalName();
        echo '<br>';

        // file extension
        echo 'File extention: '.$file->getClientOriginalExtension();
        echo '<br>';

        // Get real path
        echo 'File path; '.$file->getRealPath();
        echo '<br>';

        // File size
        echo 'File size: '.$file->getSize();
        echo '<br>';

        // Mime type
        echo 'File mime type: '.$file->getMimeType();

        // Direct store
        $folder = 'public/files';
        $file->move($folder,$file->getClientOriginalName());

    }
    public function image(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
       
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
       
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
       
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
       
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
  
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
              
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    // CRUD position

    // Read
    public function position()
    {
        $position = Position::paginate(10);

        return view('position',[
            'position' => $position,
            'title' => 'Position'
        ]);
    }

    // Create
    public function addPosition()
    {
        return view('addPosition');
    }
    public function storePosition(Request $request)
    {

        $this->validate($request, [
            'position' => 'required',
        ]);

        
        Position::create([
            'position' => $request->position
        ]);
        return redirect('/position');
    }

    // Update
    public function editPosition($id)
    {
        $position = Position::find(decrypt($id));
        return view('editPosition',[
            'position' => $position
        ]);
    }

    public function updatePosition($id, Request $request)
    {
        $position = Position::find($id);
        $position->position = $request->position;
        $position->save();
        return redirect('/position');

    }

    // Delete
    public function deletePosition($id)
    {
        $position = Position::find($id);
        $position->delete();

        return redirect()->back();
    }
}
