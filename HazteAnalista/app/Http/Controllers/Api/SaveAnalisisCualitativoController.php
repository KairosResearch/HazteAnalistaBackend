<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SaveAnalisisCualitativo;

use App\Models\RAnalisis_cualitativo_alianza;
use App\Models\RAnalisis_cualitativo_auditoria;
use App\Models\RAnalisis_cualitativo_caso_uso;
use App\Models\RAnalisis_cualitativo_comunidad;
use App\Models\RAnalisis_cualitativo_financiamiento;
use App\Models\RAnalisis_cualitativo_integrantes_equipo;
use App\Models\RAnalisis_cualitativo_whitepapaer;
use App\Models\RAnalisis_cualitativo_roadmap;


class SaveAnalisisCualitativoController extends Controller
{
    public function saveAnalisisCualitativo(Request $request){
        
        $idUsuario           = $request->idUsuario;
        $idProyecto          = $request->idProyecto;
        $idCasoUso           = $request->idCasoUso;
        $idIntegrantesEquipo = $request->idIntegrantesEquipo; 
        $idAuditoria         = $request->idAuditoria; 
        $id_roadmap          = $request->idRoadmap;
        $id_comunidad        = $request->idComunidad;
        $id_financiamiento   = $request->idFinanciamiento;
        $id_whitepapaers     = $request->idWhitepapaers;
        $id_alianzas         = $request->idAlianzas;
        $suma                = $request->suma;

        $existAnalisis = SaveAnalisisCualitativo::where('id_usuarios',$idUsuario)
        ->where('id_proyecto',$idProyecto)
        ->exists();
        

        if($existAnalisis){
            return response()->json(['message' => 'Ya se registro un Analisis Cualitativo para este usuario'], 401);
        }else{
             $SaveCualitativo = SaveAnalisisCualitativo::create([
                'id_usuarios'           => $idUsuario ,
                'id_proyecto'           => $idProyecto ,
                'suma'                  => $suma
            ]);
            
            foreach($id_alianzas as $key => $value){
                RAnalisis_cualitativo_alianza::create([
                    'id_anasis_cuali' => $SaveCualitativo->id,
                    'id_alianzas' => $value
                ]);
            }
            
            foreach($idAuditoria as $key => $value){
                RAnalisis_cualitativo_auditoria::create([
                    'id_anasis_cuali' => $SaveCualitativo->id,
                    'id_auditorias' => $value
                ]);
            }

            foreach($idCasoUso as $key => $value){
                RAnalisis_cualitativo_caso_uso::create([
                    'id_anasis_cuali' => $SaveCualitativo->id,
                    'id_caso_uso' => $value
                ]);
            }

            foreach($id_comunidad as $key => $value){
                RAnalisis_cualitativo_comunidad::create([
                    'id_anasis_cuali' => $SaveCualitativo->id,
                    'id_comunidades' => $value
                ]);
            }

            foreach($id_financiamiento as $key => $value){
                RAnalisis_cualitativo_financiamiento::create([
                    'id_anasis_cuali' => $SaveCualitativo->id,
                    'id_financiamiento' => $value
                ]);
            }

            foreach($idIntegrantesEquipo as $key => $value){
                RAnalisis_cualitativo_integrantes_equipo::create([
                    'id_anasis_cuali' => $SaveCualitativo->id,
                    'id_integrantes_equipo' => $value
                ]);
            }

            foreach($id_whitepapaers as $key => $value){
                RAnalisis_cualitativo_whitepapaer::create([
                    'id_anasis_cuali' => $SaveCualitativo->id,
                    'id_whitepapper' => $value
                ]);
            }

            foreach($id_roadmap as $key => $value){
                RAnalisis_cualitativo_roadmap::create([
                    'id_anasis_cuanti' => $SaveCualitativo->id,
                    'id_roadmap' => $value
                ]);
            }
            return response()->json(['message' => 'Analisis Cualitativo guardado exitosamente!'], 201);
        }
    }

    public function updateAnalisisCualitativo(Request $request){
        $idUsuario           = $request->idUsuario;
        $idProyecto          = $request->idProyecto;
        $idAnalisis          = $request->idAnalisis;
        $idCasoUso           = $request->idCasoUso;
        $idIntegrantesEquipo = $request->idIntegrantesEquipo; 
        $idAuditoria         = $request->idAuditoria; 
        $id_roadmap          = $request->idRoadmap;
        $id_comunidad        = $request->idComunidad;
        $id_financiamiento   = $request->idFinanciamiento;
        $id_whitepapaers     = $request->idWhitepapaers;
        $id_alianzas         = $request->idAlianzas;
        $suma                = $request->suma;

        $existAnalisis = SaveAnalisisCualitativo::where('id_usuarios',$idUsuario)
        ->where('id_proyecto',$idProyecto)
        ->exists();
        
        if($existAnalisis){
            $updateAnalisiCuantitavivo = SaveAnalisisCualitativo::where('id_usuarios',$idUsuario)
            ->where('id_proyecto',$idProyecto)
            ->update([
                'suma'=> $suma
                ]);
            
            RAnalisis_cualitativo_alianza::where('id_anasis_cuali',$idAnalisis)
            ->delete();

            foreach($id_alianzas as $key => $value){
                RAnalisis_cualitativo_alianza::create([
                    'id_anasis_cuali' => $idAnalisis,
                    'id_alianzas' => $value
                ]);
            }


            RAnalisis_cualitativo_auditoria::where('id_anasis_cuali',$idAnalisis)
            ->delete();

            foreach($idAuditoria as $key => $value){
                RAnalisis_cualitativo_auditoria::create([
                    'id_anasis_cuali' => $idAnalisis,
                    'id_auditorias' => $value
                ]);
            }

            RAnalisis_cualitativo_caso_uso::where('id_anasis_cuali',$idAnalisis)
            ->delete();

            foreach($idCasoUso as $key => $value){
                RAnalisis_cualitativo_caso_uso::create([
                    'id_anasis_cuali' => $idAnalisis,
                    'id_caso_uso' => $value
                ]);
            }

            RAnalisis_cualitativo_comunidad::where('id_anasis_cuali',$idAnalisis)
            ->delete();

            foreach($id_comunidad as $key => $value){
                RAnalisis_cualitativo_comunidad::create([
                    'id_anasis_cuali' => $idAnalisis,
                    'id_comunidades' => $value
                ]);
            }

            
            RAnalisis_cualitativo_financiamiento::where('id_anasis_cuali',$idAnalisis)
            ->delete();

            foreach($id_financiamiento as $key => $value){
                RAnalisis_cualitativo_financiamiento::create([
                    'id_anasis_cuali' => $idAnalisis,
                    'id_financiamiento' => $value
                ]);
            }

            
            RAnalisis_cualitativo_integrantes_equipo::where('id_anasis_cuali',$idAnalisis)
            ->delete();

            foreach($idIntegrantesEquipo as $key => $value){
                RAnalisis_cualitativo_integrantes_equipo::create([
                    'id_anasis_cuali' => $idAnalisis,
                    'id_integrantes_equipo' => $value
                ]);
            }

            RAnalisis_cualitativo_whitepapaer::where('id_anasis_cuali',$idAnalisis)
            ->delete();

            foreach($id_whitepapaers as $key => $value){
                RAnalisis_cualitativo_whitepapaer::create([
                    'id_anasis_cuali' => $idAnalisis,
                    'id_whitepapper' => $value
                ]);
            }

            RAnalisis_cualitativo_roadmap::where('id_anasis_cuanti',$idAnalisis)
            ->delete();
            
            foreach($id_roadmap as $key => $value){
                RAnalisis_cualitativo_roadmap::create([
                    'id_anasis_cuanti' => $idAnalisis,
                    'id_roadmap' => $value
                ]);
            }
            
            return response()->json(['Upadate Analisis Cuantitavivo exitoso¡' => $updateAnalisiCuantitavivo], 200);
        }else{
            return response()->json(['message' => 'No existe el analsis cualitativo'], 401); 
        } 
    }

    public function getAnalisisCualitativo($idAnalisis){
        $array = array();
       
        $array['alianzas']          = $this->getRAlianzas($idAnalisis);
        $array['auditoria']         = $this->getRAuditoria($idAnalisis);
        $array['caso_uso']          = $this->getRCasoUso($idAnalisis);
        $array['comunidad']         = $this->getRComunidad($idAnalisis);
        $array['financiamiento']    = $this->getRFinanciamiento($idAnalisis);
        $array['integrantesEquipo'] = $this->getRIntegrantesEquipo($idAnalisis);
        $array['roadmap']           = $this->getRRoadmap($idAnalisis);
        $array['whitepapaer']       = $this->getRWhitepapaer($idAnalisis);
        $array['suma']              = $this->getRSuma($idAnalisis);
        
        return response()->json( $array, 200);
    }

    public function getRSuma($idAnalisis){
        $arraySuma = array(); 
        $suma = SaveAnalisisCualitativo::where('id',$idAnalisis)->select('suma')->get();
        foreach($suma as $key=>$value){
            $arraySuma[$key] = $value->suma;
        }
        return $arraySuma;
    }

    public function getRAlianzas($idAnalisis){
        $arrayAlianzas = array(); 
        $alianzas = RAnalisis_cualitativo_alianza::where('id_anasis_cuali',$idAnalisis)->select('id_alianzas')->get();
        foreach($alianzas as $key=>$value){
            $arrayAlianzas[$key] = $value->id_alianzas;
        }

        return $arrayAlianzas;
    }

    public function getRAuditoria($idAnalisis){
        $arrayAuditoria = array(); 
        $auditoria = RAnalisis_cualitativo_auditoria::where('id_anasis_cuali',$idAnalisis)->select('id_auditorias')->get();
        foreach($auditoria as $key=>$value){
            $arrayAuditoria[$key] = $value->id_auditorias;
        }
        return $arrayAuditoria;
    }

    public function getRCasoUso($idAnalisis){
        $arrayCasoUso = array(); 
        $casoUso = RAnalisis_cualitativo_caso_uso::where('id_anasis_cuali',$idAnalisis)->select('id_caso_uso')->get();
        foreach($casoUso as $key=>$value){
            $arrayCasoUso[$key] = $value->id_caso_uso;
        }
        return $arrayCasoUso;
    }

    public function getRComunidad($idAnalisis){
        $arrayComunidades = array(); 
        $comunidad = RAnalisis_cualitativo_comunidad::where('id_anasis_cuali',$idAnalisis)->select('id_comunidades')->get();
        foreach($comunidad as $key=>$value){
            $arrayComunidades[$key] = $value->id_comunidades;
        }
        return  $arrayComunidades;
    }

    public function getRFinanciamiento($idAnalisis){
        $arrayFinanciamiento = array(); 
        $financiamiento = RAnalisis_cualitativo_financiamiento::where('id_anasis_cuali',$idAnalisis)->select('id_financiamiento')->get();
        foreach($financiamiento as $key=>$value){
            $arrayFinanciamiento[$key] = $value->id_financiamiento;
        }
        return  $arrayFinanciamiento;
    }

    public function getRIntegrantesEquipo($idAnalisis){
        $arrayIntegrantesEquipo = array(); 
        $integranEquipo = RAnalisis_cualitativo_integrantes_equipo::where('id_anasis_cuali',$idAnalisis)->select('id_integrantes_equipo')->get();
        foreach($integranEquipo as $key=>$value){
            $arrayIntegrantesEquipo[$key] = $value->id_integrantes_equipo;
        }
        return  $arrayIntegrantesEquipo;
    }

    public function getRRoadmap($idAnalisis){
        $arrayRoadmap = array(); 
        $roadmap = RAnalisis_cualitativo_roadmap::where('id_anasis_cuanti',$idAnalisis)->select('id_roadmap')->get();
        foreach($roadmap as $key=>$value){
            $arrayRoadmap[$key] = $value->id_roadmap;
        }
        return  $arrayRoadmap;
    }

    public function getRWhitepapaer($idAnalisis){
        $arrayWhitePapaer = array(); 
        $whitepapaer = RAnalisis_cualitativo_whitepapaer::where('id_anasis_cuali',$idAnalisis)->select('id_whitepapper')->get();
        foreach($whitepapaer as $key=>$value){
            $arrayWhitePapaer[$key] = $value->id_whitepapper;
        }
        return  $arrayWhitePapaer;
    }
}
