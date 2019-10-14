<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rtm;
use App\Uraian;
use App\Progres;
use DataTables;

class RtmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('rtm/index');
    }
    public function create()
    {
        return view('rtm/create');
    }

    public function add()
    {
        return view('rtm/add');
    }

    public function saveMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'rtm_ke' => 'required|digits_between:0,100', 'tingkat' => 'required', 'rkt' => 'required',
            'tahun' => 'required', 'document' => 'required'
        ], [
            'rtm_ke.required' => 'RTM harap diisi',
            'rtm_ke.digits_between' => 'RTM harus angka',
            'document.required' => 'Attachment Surat Permintaan Bahan harap diisi'
        ]);

        $rtm = Rtm::Create($validatedData);

        foreach ($request->input('document', []) as $file) {
            $rtm->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }
        return redirect('rtm');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rtm_ke' => 'required|digits_between:0,100', 'tingkat' => 'required', 'rkt' => 'required',
            'tahun' => 'required'
        ]);

        $rtm = Rtm::create($validatedData);
        $h_uraian1 = implode(',', $request->h_uraian);
        $h_uraian2 = explode(',', $h_uraian1);
        for ($count = 0; $count < count($h_uraian2); $count++) {
            $container[] = array(
                'uraian_id' => $h_uraian2[$count]
            );
        }
        $rtm->uraian()->detach([$count]);
        $rtm->uraian()->attach($container);
        return redirect('rtm');
    }
    public function show(Rtm $rtm)
    {
        $json = Rtm::with('uraian.progres')->findOrfail($rtm);
        return view('rtm.show', compact('rtm'));
    }
    public function edit(Rtm $rtm)
    {
        return view('rtm.edit', compact('rtm'));
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($rtm)
    {
        //
    }
    public function jsonrtm($rtm = NULL)
    {
        if ($rtm) {
            $json = Rtm::find($rtm)->uraian;
            return Datatables::of($json)->make(true);
        } else {
            $json = Rtm::all();
            return Datatables::of($json)->make(true);
        }
    }
}
