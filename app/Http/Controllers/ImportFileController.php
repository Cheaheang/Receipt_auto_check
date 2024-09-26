<?php

namespace App\Http\Controllers;

use App\Exports\CfoExportController;
use App\Exports\MainSheet;
use App\Imports\BuilderImport;
use App\Imports\CfoImport;
use App\Imports\CreditImport;
use App\Imports\DetailImport;
use App\Imports\UsersImport;
use App\Models\Builder;
use App\Models\Cfo;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class ImportFileController extends Controller
{

//    public function unMergeCell($file){
//       $spreedsheet =  IOFactory::load($file);
//       $sheet = $spreedsheet->getActiveSheet();
//       $mergedCells =$sheet->getMergeCells();
//       foreach ($mergedCells as $mergeCell) {
//           $sheet->unMergeCells($mergeCell);
//       }
//    }
    public function verifyData(Request $request){
        $verification = false;
        $negativeCounter = 0;
        $negativeData= [];
        $positiveCounter = 0;
        $positiveData= [];
        $builderFile =$request->file("builder");
        $cfoFile =$request->file("cfo");
  $builderStoreAsArray = Excel::toArray(new BuilderImport(), $builderFile );
  $cfoStoreAsArray = Excel::toArray(new CfoImport(), $cfoFile);
        if($request->status == 'active'){
            echo "active";
//            dd($builderStoreAsArray[0][0]['jobs']);
            foreach($builderStoreAsArray[0] as $key=>$builderData){
                    foreach ($cfoStoreAsArray as $key2 => $cfoData) {
//                        dd($builderData['jobs']);
                        if ($builderData['jobs'] != $cfoData[0]['Work Order']) {
                            array_push($positiveData,$cfoData);
                            $positiveCounter++;
                        }else{
                            array_push($negativeData,$cfoData);
                            $negativeCounter++;
                        }
                    }
            }

        }else{
            echo "terminate";
        }
if ($negativeCounter>0){
    echo "negative value $negativeCounter";
    return Excel::download(new MainSheet($negativeData,$positiveData),'CfoCn_file.xlsx');
//    $this->export_pdf($negativeData,$positiveData);
//   return redirect('/')->with('success', 'Data have been insert, good!');
}
        echo "positive value $positiveCounter";
    return redirect('/')->with('success', 'Data have been insert, good!');
    }

    public function export_pdf($duplicate, $notDuplicate): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
       return Excel::download(new MainSheet($duplicate,$notDuplicate),'CfoCn_file.xlsx');
    }

//    public function export_excel(array $arrayData): \Symfony\Component\HttpFoundation\BinaryFileResponse
//    {
//        $data = ['Header1', 'Header2'];
//        $data[] = ['data1', 'data2'];
//        $data[] = ['data3', 'data4'];
//        $data[] = ['data5', 'data6'];
//        $array = $data;
//        return Excel::download(new MainSheet($arrayData),'cfo.xlsx');
//        if($result){
//            return redirect('/')->with('success', 'Data have been insert, good!');
//        }
//    }

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
