<?php

namespace App\Http\Controllers;

use App\Imports\CreditImport;
use App\Imports\DetailImport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class ImportFileController extends Controller
{
    //
    public function import(Request $request)
    {

        if ($request->file("creditFile") != null) {

            $creditFile = $request->file("creditFile");

            Excel::import(new CreditImport(), $creditFile);

        }
        $detailFile = $request->file("detailFile");
        Excel::import(new DetailImport(), $detailFile);

        return redirect('/importData')->with('success', 'Data have been insert, good!');
    }

    public function verifyData(Request $request){
//       dd($request->file("builder")) ;
        if($request->status == 'active'){

//    Excel::import(new UsersImport, $request->file("builder") );
            echo "active";
        }else{
            echo "terminate";
        }

    return redirect('/')->with('success', 'Data have been insert, good!');
    }

//    public function model(array $row)
//    {
//        dd($row->test);
//        return new User([
//            'name' => $row[0],
//            'email' => $row[1],
//        ]);
//    }
//    public function chunkSize(): int
//    {
//        return 1000;
//
//        // TODO: Implement chunkSize() method.
//
//    }
}
