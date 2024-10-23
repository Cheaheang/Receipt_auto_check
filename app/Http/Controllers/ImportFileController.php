<?php

namespace App\Http\Controllers;

use App\Exports\MainSheet;
use App\Imports\AdiImport;
use App\Imports\BuilderImport;
use App\Imports\CfoImport;
use App\Imports\TctImport;
use App\Imports\TelecomImport;
use App\Imports\UsersImport;
use App\Models\Builder;
use App\Models\Cfo;
use App\Models\User;
use http\Header;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\HeadingRowImport;

class ImportFileController extends Controller
{

    public function verifyData(Request $request)
    {
        $total=0;
        $verification = false;
        $duplicateCount = 0;
        $title="";
        $company = $request->input('company');
        $duplicate = array();
        $notDuplicateCount = 0;
        $notDuplicate= array();
        $builderFile = $request->file("builder");
        $companyFile = $request->file("cfo");
        $validateBuilderHeader = (new HeadingRowImport())->toArray($builderFile);
        $validateCompanyHeader = (new HeadingRowImport())->toArray($companyFile);
        $buildingStoreAsArray = Excel::toArray(new BuilderImport(), $builderFile);
        $notDuplicate = $buildingStoreAsArray[0];
//        dd($storeDuplicateBuilding[0]);
        if ($validateBuilderHeader[0][0][0] == "id" && $validateBuilderHeader[0][0][1] == "name" && $validateBuilderHeader[0][0][2] == "active" &&
            $validateBuilderHeader[0][0][3] == "date" && $validateBuilderHeader[0][0][4] == "infrastructure" && $validateBuilderHeader[0][0][5] == "jobs" &&
            $validateBuilderHeader[0][0][6] == "category" && $validateBuilderHeader[0][0][7] == "installation_order") {
//            dd($validateCompanyHeader[3]);
            $arr = [];
                if ($company == 'cfocn') {
                    $title = "CFOCN";
                    if ($validateCompanyHeader[0][0][0] == "work_order" && $validateCompanyHeader[0][0][1] == "port" &&
                        $validateCompanyHeader[0][0][2] == "pos" && $validateCompanyHeader[0][0][3] == "team_install" &&
                        $validateCompanyHeader[0][0][4] == "create_time") {
                        $cfoStoreAsArray = Excel::toArray(new CfoImport(), $companyFile);
//                        dd($storeDuplicateBuilding);
                        foreach ($buildingStoreAsArray[0] as $key => $builderData) {
//                            dd($builderData[1]['jobs']);
//                            dd($builderStoreAsArray[$key]);
                            foreach ($cfoStoreAsArray[0] as $key2 => $cfoData) {
//                                dd($cfoStoreAsArray[0][0]);
                                if ($builderData['jobs'] != null) {
                                    if ($builderData['jobs'] == $cfoData['Work Order']) {
                                        array_push($duplicate, $builderData);
                                        unset($notDuplicate[$key]);
                                    }
                                }
                            }
                        }

                    }

                }
                elseif ($company == 'tct') {
                    $title = "TCT";
                    if ($validateCompanyHeader[0][0][1] == "tct_cid" && $validateCompanyHeader[0][0][2] == "tct_sid" &&
                        $validateCompanyHeader[0][0][3] == "new_circuit_id" && $validateCompanyHeader[0][0][18] == "total_nrc"){
                        $tctStoreAsArray = Excel::toArray(new TctImport(), $companyFile);
                        foreach ($buildingStoreAsArray[0] as $key => $builderData) {
                            if ($builderData['jobs'] != null) {
                            foreach ($tctStoreAsArray as $key3 => $tctData) {
                                    if ($builderData['jobs'] == $tctData[$key3]["New circuit ID"]) {
                                        array_push($duplicate, $builderData);
                                        unset($notDuplicate[$key]);
                                    }
                                }
                            }
                        }
                    }
                    else {

                        return redirect("/")->with("incorrectCompany", "Invalid Company Column name");

                    }

                }
                elseif ($company == 'adi') {
                    $title = "ADI";
                    if(
                        $validateCompanyHeader[0][0][1] == "aid" && $validateCompanyHeader[0][0][2] == "sid" &&
                        $validateCompanyHeader[0][0][3] == "customer_name" && $validateCompanyHeader[0][0][4] == "qty"  &&
                        $validateCompanyHeader[0][0][5] == "date_start" && $validateCompanyHeader[0][0][6] == "date_to"&&
                        $validateCompanyHeader[0][0][7] == "amount" && $validateCompanyHeader[0][0][8] == "vat" &&
                        $validateCompanyHeader[0][0][9] == "total_amount" && $validateCompanyHeader[0][0][10] == "invoice_description") {
                        $adiStoreAsArray = Excel::toArray(new AdiImport(), $companyFile);
                        foreach ($buildingStoreAsArray[0] as $key => $builderData) {
                            if ($builderData['jobs'] != null) {
                                foreach ($adiStoreAsArray as $key4 => $adiData) {


                                    if ($builderData['jobs'] == $adiData[$key4]['AID']) {
                                        array_push($duplicate, $builderData);
                                        unset($notDuplicate[$key]);
                                    }
                                }
                            }
                        }
                    }else{ return redirect("/")->with("incorrectCompany", "Invalid Company Column name");
                    }
                }
                elseif ($company == 'telecom') {
$title = "Telecom";
                    if ($validateCompanyHeader[0][0][1] == "account_no" && $validateCompanyHeader[0][0][2] == "id" &&
                        $validateCompanyHeader[0][0][3] == "name_customer" && $validateCompanyHeader[0][0][5] == "project" &&
                        $validateCompanyHeader[0][0][6] == "issue_date" && $validateCompanyHeader[0][0][7] == "complete_date") {
                    $telecomStoreAsArray = Excel::toArray(new TelecomImport(), $companyFile);
                    foreach ($buildingStoreAsArray[0] as $key => $builderData) {
                        if ($builderData['jobs'] != null) {
                            foreach ($telecomStoreAsArray as $key5 => $telecom) {

                                if ($builderData['jobs'] == $telecom[$key5]['ID']) {
                                    array_push($duplicate, $builderData);
                                    unset($notDuplicate[$key]);
                                }
                            }
                        }
                    }
                }else{

                        return redirect("/")->with("incorrectCompany", "Invalid Company Column name");
                    }
                }



            } else {
                return redirect("/")->with("incorrectBuilder", "Invalid Builder Name");
            }
//        dd($duplicate, $storeDuplicateBuilding);
                if($request->input('status') =='active'){
                    $fileName = $title." Active List";
                }else{
                    $fileName = $title." Terminated List";

                }
//dd($fileName);/
                    return Excel::download(new MainSheet($duplicate , $notDuplicate),  "$fileName.xlsx");

    }
//        }

}
