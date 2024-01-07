<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:member-list|member-create|member-edit|member-delete', ['only' => ['index','store']]);
         $this->middleware('permission:member-create', ['only' => ['create','store']]);
         $this->middleware('permission:member-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:member-delete', ['only' => ['destroy']]);
    }

    public function export()
    {
        return Excel::download(new MemberExport, 'member.xlsx');
    }

    public function index()
    {
        return view ('member.index',[
        "member"=> Member::latest()->filter()->paginate(5)->withQueryString()
        ]);
    }
    public function create()
    {
        return view('member.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $data = Member::latest()->first() ?? new Member();
        $kode_member = (int) $data->kode_member +1;

        $data = new Member();
        $data->kode_member = tambah_nol_didepan($kode_member, 5);
        $data->nama = $request->nama;
        $data->telepon = $request->telepon;
        $data->alamat = $request->alamat;
        
        $data->save();

        return redirect()->route('member.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $member = Member::find($id);
        return view('member.show')->with('member', $member);
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.edit')->with('member', $member);
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $input = $request->all();
        $member->update($input);
        return redirect() ->route('member.index')
                          ->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        Member::destroy($id);
        return redirect('member')->with('success', 'Data berhasil dihapus!');
    }
}
