<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;
use Session;
use PDF;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;



class PrevController extends Controller
{
    public function index()
    {
        $employee =  Employee::paginate(10);
        return view('employee',['title' => 'Pegawai'],compact('employee'));
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
        ],$messages);
        $employee = Employee::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move(public_path('images/'), $request->file('foto')->getClientOriginalName());
            $employee->foto = $request->file('foto')->getClientOriginalName();
            $employee->save();
        }
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
        $employee->address = $request->address;
        $employee->numemp = $request->numemp;
        $employee->foto = $request->foto;
        $employee->position_id = $request->position;
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

    	return view('trashEmployee',['trash' => $trash]);
    }

    public function depall()
    {
        $trash = Employee::onlyTrashed();
    	$trash->forceDelete();
        return redirect('employee/trash');
    }

    // CRUD position

    // Read
    public function position()
    {
        $position = Position::paginate(10);

        return view('position',[
            'position' => $position,
            'title' => 'Jabatan'
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

    // Export
    public function export()
	{
		return Excel::download(new EmployeeExport, 'employee.xlsx');
	}

    // Import
    public function import(Request $request) 
	{
        // validasi
		$this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
		]);
        
		// menangkap file excel
		$file = $request->file('file');
        $path = public_path('/files');

		// membuat nama file unik
		$nama_file = $file->getClientOriginalName();

        
		// upload ke folder file_siswa di dalam folder public
		$file->move($path, $nama_file);
		// import data
		Excel::import(new EmployeeImport, $path.'/'.$nama_file);

 
		// notifikasi dengan session
		Session::flash('sukses','Data Pegawa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/employee');
	}

    public function preReport()
    {
        $employee = Employee::all();
 
    	return view('employee-pdf',['employee'=>$employee]);
    }
    // Report PDF
    public function report()
    {
    	$employee = Employee::all();
 
    	$pdf = PDF::loadview('employee-pdf',['employee'=>$employee]);

    	return $pdf->download('laporan-pegawai-pdf');
    }
}
