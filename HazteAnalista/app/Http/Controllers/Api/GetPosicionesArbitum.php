<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetPosicionesArbitum extends Controller
{
    public function getPositions($wallet){
        
        $valorLOked = $this->getLokedValue($wallet);
        $valorStaked = $this->getStaking($wallet);

        return response()->json(["loked"=>$valorLOked,"staked"=>$valorStaked]);
    }

    public function getLokedValue($wallet){

        $client = new \GuzzleHttp\Client();

        $arrayloked = [];
        
        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=locked&filter[chain_ids]=arbitrum&filter[trash]=only_non_trash&sort=value', [
        'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
                ],
            ]);
        
        $response = json_decode($response->getBody());
        
        foreach($response->data as $key=>$contenido){
             $positions = array(
                "name_protocol"=> $contenido->attributes->name,
                "monto_loked" => $contenido->attributes->quantity->float,
                "simbolo" => $contenido->attributes->fungible_info->symbol,
                "fiat_value" => $contenido->attributes->value,
                "icon_url" => $contenido->attributes->fungible_info->icon
            );

            array_push($arrayloked, $positions);
        }

        return $arrayloked;
    }

    public function getStaking($wallet){
        $client = new \GuzzleHttp\Client();

        $arraystaking = [];
        
        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=staked&filter[chain_ids]=arbitrum&filter[trash]=only_non_trash&sort=value', [
        'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
                ],
            ]);
        
        $response = json_decode($response->getBody());
        
        foreach($response->data as $key=>$contenido){
             $positions = array(
                "name_protocol"=> $contenido->attributes->name,
                "monto_loked" => $contenido->attributes->quantity->float,
                "simbolo" => $contenido->attributes->fungible_info->symbol,
                "fiat_value" => $contenido->attributes->value,
                "icon_url" => $contenido->attributes->fungible_info->icon
            );

            array_push($arraystaking, $positions);
        }

        return $arraystaking;

    }


}
