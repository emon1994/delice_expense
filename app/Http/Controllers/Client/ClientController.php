<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ClientDetail;
use App\Models\ClientFile;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store( Request $request){
        $request->validate([
            'clientsDetail.category' => 'required|string|max:255',
            'clientsDetail.date' => 'required|date',
            'clientsDetail.amount' => 'required|numeric',
        ]);


        $client_detail= ClientDetail::create($request->clientsDetail);

        $request->validate([
            'clientsFile.*.name'=> 'required|string|max:255',
            'clientsFile.*.passport'=> 'required|string|max:255',
            'clientsFile.*.nationality'=> 'required|string|max:255',
            'clientsFile.*.appliedCountry'=> 'required|string|max:255',
        ]);

        foreach($request->clientsFile as $file){
            $file['client_detail_id'] = $client_detail->id;
            ClientFile::create($file);
        }
        return response(['message'=> 'success'],201);
    }

}
