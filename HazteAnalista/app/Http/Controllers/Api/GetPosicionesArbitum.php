<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetPosicionesArbitum extends Controller
{
    public function getPositions($wallet){
        $ArbPostion = $this->getAllPositions($wallet,"arbitrum");
        $ScrollPostion = $this->getAllPositions($wallet,"scroll");
        $EthereumPostion = $this->getAllPositions($wallet,"ethereum");

        $BasePostion = $this->getAllPositions($wallet,"polygon");
        $PolygonPostion = $this->getAllPositions($wallet,"polygon");
        $OptimisumPostion = $this->getAllPositions($wallet,"ethereum");
        return response()->json(["ArbPositions"=>[$ArbPostion],"ScrollPositions"=>[$ScrollPostion],"EthereumPositions"=>[$EthereumPostion]]);

    }

    public function getAllPositions($wallet,$network){

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[chain_ids]='.$network.'&filter[trash]=only_non_trash&sort=value', [
        'headers' => [
            'accept' => 'application/json',
            'authorization' => 'Basic emtfZGV2X2I5OWQzOWYwYjk1MjQ4YTU5ODJlMjZlYjYwNTI3YTUwOg==',
        ],
        ]);

        
        $data = json_decode($response->getBody());

        // Inicializamos un arreglo para almacenar los datos agrupados
        $grouped = [];
    
    
        // Iteramos sobre cada elemento del arreglo original
        foreach ($data->data as $item) {

            $protocol = $item->attributes->protocol;
            $name = $item->attributes->name;
            $positionType = $item->attributes->position_type;
            $amount_position = $item->attributes->quantity->float;
            $simbolo =  $item->attributes->fungible_info->symbol;
            $fiat_value = $item->attributes->value;
            $icon_url = $item->attributes->fungible_info->icon;
    
            // Creamos una clave compuesta de protocol y position_type
            //$key = $protocol."-".$name;
            $key = $protocol;
            

            if (!isset($grouped[$key])) {
                $grouped[$key] = [];
            }

            // Añadimos el elemento actual al grupo correspondiente
            
            $position = array(
                "positions"=>[
                "position_name" => $name,
                "name_protocol"=> $protocol,
                "position_type" =>$positionType,
                "monto_loked" => $amount_position,
                "simbolo" => $simbolo,
                "fiat_value" => $fiat_value,
                "icon_url" => $icon_url
                ]
            );

            $grouped[$key][] = $position; 
        }
        return response()->json($grouped);
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

    public function getStakedScroll($wallet){
        $client = new \GuzzleHttp\Client();

        $arraystaking = [];

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=staked&filter[chain_ids]=scroll&filter[trash]=only_non_trash&sort=value', [
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

    public function getLokedScrollValue($wallet){

        $client = new \GuzzleHttp\Client();

        $arraylokedScroll = [];

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=locked&filter[chain_ids]=scroll&filter[trash]=only_non_trash&sort=value', [
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

           array_push($arraylokedScroll, $positions);
       }

       return $arraylokedScroll;
    }

    public function getStakedEthereum($wallet){
        $client = new \GuzzleHttp\Client();

        $arraystaking = [];

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=staked&filter[chain_ids]=ethereum&filter[trash]=only_non_trash&sort=value', [
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

    public function getLokedEthereumValue($wallet){

        $client = new \GuzzleHttp\Client();

        $arraylokedScroll = [];

        $response = $client->request('GET', 'https://api.zerion.io/v1/wallets/'.$wallet.'/positions/?filter[positions]=only_complex&currency=usd&filter[position_types]=locked&filter[chain_ids]=ethereum&filter[trash]=only_non_trash&sort=value', [
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

           array_push($arraylokedScroll, $positions);
       }

       return $arraylokedScroll;
    }


}
