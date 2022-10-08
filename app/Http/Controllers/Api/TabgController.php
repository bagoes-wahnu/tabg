<?php

namespace App\Http\Controllers\Api;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tabg;
use DataTables;
use Storage;
use File;

class TabgController extends Controller
{
    public function json(Request $request){
        if ($request->ajax()) {
            $data = Tabg::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        // $gid = $data->gid;
                        // dd($gid);
                        $view = route('show', $data);
                        $btn = '<input type="hidden" name="gid" id="gid" value="'.$data->gid.'">';
                        $btn = $btn . '<a href="'.$view.'" target="_blank" onclick="show_json('.$data->gid.')" data-gid="'.$data->gid.'" class="edit btn btn-info btn-sm mr-2 mb-2">
                        View
                        </a>';
                        $btn = $btn . '<a href="javascript:void(0)" onclick="edit_json('.$data->gid.')" data-gid="'.$data->gid.'" data-toggle="modal" data-target="#modal-lg" class="edit btn btn-primary btn-sm mr-2 mb-2">
                        Update
                        </a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('home1');
    }
    public function show_json($gid)
    {
        $aspects = Tabg::find($gid);
        // dd($aspects);
        return response()->json($aspects);
    }
    public function store_json(Request $request)
    {
        if ($request->hasFile('file_gambar_ars')) {
            if (Storage::exists('public/file_gambar_ars/'.$request->emp_file_gambar_ars)) {
                Storage::delete('public/file_gambar_ars/'.$request->emp_file_gambar_ars);
            }
            $image = $request->file('file_gambar_ars');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/file_gambar_ars', $fileName);
        }else {
            $fileName = $request->emp_file_gambar_ars;
        }
        if ($request->hasFile('file_gambar_str')) {
            if (Storage::exists('public/file_gambar_str/'.$request->emp_file_gambar_str)) {
                Storage::delete('public/file_gambar_str/'.$request->emp_file_gambar_str);
            }
            $image2 = $request->file('file_gambar_str');
            $fileName2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->storeAs('public/file_gambar_str', $fileName2);
        }else {
            $fileName2 = $request->emp_file_gambar_str;
        }
        if ($request->hasFile('file_gambar_mep')) {
            if (Storage::exists('public/file_gambar_mep/'.$request->emp_file_gambar_mep)) {
                Storage::delete('public/file_gambar_mep/'.$request->emp_file_gambar_mep);
            }
            $image3 = $request->file('file_gambar_mep');
            $fileName3 = date('YmdHis') . "." . $image3->getClientOriginalExtension();
            $image3->storeAs('public/file_gambar_mep', $fileName3);
        }else {
            $fileName3 = $request->emp_file_gambar_mep;
        }
        if ($request->hasFile('file_laporan_struktur')) {
            if (Storage::exists('public/file_laporan_struktur/'.$request->emp_file_laporan_struktur)) {
                Storage::delete('public/file_laporan_struktur/'.$request->emp_file_laporan_struktur);
            }
            $image4 = $request->file('file_laporan_struktur');
            $fileName4 = date('YmdHis') . "." . $image4->getClientOriginalExtension();
            $image4->storeAs('public/file_laporan_struktur', $fileName4);
        }else {
            $fileName4 = $request->emp_file_laporan_struktur;
        }

        if (Tabg::where('gid', $request->gid)->exists()) {
            $tabg = Tabg::findOrFail($request->gid);
            $tabg->tgl_tabg = $request->tgl_tabg;
            $tabg->no_telp_pemohon = $request->no_telp_pemohon;
            $tabg->nama_kuasa = $request->nama_kuasa;
            $tabg->no_telp_kuasa = $request->no_telp_kuasa;
            $tabg->kode_verifikasi = $request->kode_verifikasi;
            $tabg->nama_proyek = $request->nama_proyek;
            $tabg->penggunaan_bangunan = $request->penggunaan_bangunan;
            $tabg->alamat_persil = $request->alamat_persil;
            $tabg->kelurahan = $request->kelurahan;
            $tabg->kecamatan = $request->kecamatan;
            $tabg->no_imb = $request->no_imb;
            $tabg->tgl_jam_sidang = $request->tgl_jam_sidang;
            $tabg->tempat_sidang = $request->tempat_sidang;
            $tabg->file_gambar_ars = $fileName;
            $tabg->file_gambar_str = $fileName2;
            $tabg->file_gambar_mep = $fileName3;
            $tabg->file_laporan_struktur = $fileName4;
            $tabg->save();
        }else {
            Tabg::create([
            'gid' => Helper::IDGenerator(new Tabg,'gid',5),
            'tgl_tabg' => $request->tgl_tabg,
            'no_telp_pemohon' => $request->no_telp_pemohon,
            'nama_kuasa' => $request->nama_kuasa,
            'no_telp_kuasa' => $request->no_telp_kuasa,
            'kode_verifikasi' => $request->kode_verifikasi,
            'nama_proyek' => $request->nama_proyek,
            'penggunaan_bangunan' => $request->penggunaan_bangunan,
            'alamat_persil' => $request->alamat_persil,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'no_imb' => $request->no_imb,
            'tgl_jam_sidang' => $request->tgl_jam_sidang,
            'tempat_sidang' => $request->tempat_sidang,
            'file_gambar_ars' => $fileName,
            'file_gambar_str' => $fileName2,
            'file_gambar_mep' => $fileName3,
            'file_laporan_struktur' => $fileName4,
            ]);
        }

        return response()->json(['success'=>'Data Tower saved successfully.']);
    }
    public function delete_json($gid)
    {
        $data = Tabg::find($gid);
        // \File::delete('public/scan_imb/'.$data->scan_imb);
        // dd($data->scan_imb);
        if (Storage::exists('public/scan_imb/'.$data->scan_imb)) {
            // dd('exist');
            Storage::delete('public/scan_imb/'.$data->scan_imb);
        }
        // else {
        //     dd('not exist');
        // }
        // Storage::delete('public/scan_imb/'.$data->scan_imb);
        // dd(File::delete(public_path('scan_imb/'.$data->scan_imb)));
        Tabg::find($gid)->delete();
        return response()->json(['success'=>'Data Tower deleted successfully.']);
    }
    public function search_json(Request $request){
        // dd($request->all());
        if ($request->ajax()) {
            // dd($request->kolom);
            $data = Tabg::select('*')->limit(10000);
            if ($request->kolom != '' && $request->nilai != '') {
                // dd($data->where("'$request->kolom'" == 1));
                $data = $data->where($request->kolom, $request->nilai);
                // ->where('nama_lengkap', 'LIKE', '%' . request()->q . '%')
                // dd($data);
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        // $gid = $data->gid;
                        // dd($gid);
                        $view = route('show', $data);
                        $btn = '<input type="hidden" name="gid" id="gid" value="'.$data->gid.'">';
                        $btn = $btn . '<a href="'.$view.'" target="_blank" onclick="show_json('.$data->gid.')" data-gid="'.$data->gid.'" class="edit btn btn-info btn-sm mr-2 mb-2">
                        View
                        </a>';
                        $btn = $btn . '<a href="javascript:void(0)" onclick="edit_json('.$data->gid.')" data-gid="'.$data->gid.'" data-toggle="modal" data-target="#modal-lg" class="edit btn btn-primary btn-sm mr-2 mb-2">
                        Update
                        </a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // return view('home2');
        return response()->json(['success'=>'Data Ditemukan.']);
    }
}
