<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index(){
  $hero= Hero::all();
$aux=[];
  foreach ($hero as $key => $value) {

     if ($value["id"]>1) {
     
      array_push($aux,$value);
      }
      }
  return $aux;


    }


    public function getOneHero(){
      $hero= Hero::all();
    $aux=[];
      foreach ($hero as $key => $value) {
    
         if ($value["id"]==1) {
         
          array_push($aux,$value);
          }
          }
      return $aux;
    
    
        }
    
    public function show($id){
     $hero= Hero::find($id);
    return $hero;


    }

    public function store(Request $request){
     $hero = new  Hero();
     $hero->name= $request->name;
     $hero->description=  $request->description;
     $hero->status= $request->status;
     $hero->counterLike= $request->counterLike;
     $hero->counterDislike= $request->counterDislike;
     $hero->image= $request->image;
     $hero->save();
     return  $hero;


              }
              
    public function update(Request $request){
   $hero= Hero::find( $request->id);
   $hero->name= $request->name;
     $hero->description=  $request->description;
     $hero->status= $request->status;
     $hero->counterLike= $request->counterLike;
     $hero->counterDislike= $request->counterDislike;
     $hero->image= $request->image;
   $hero->save();
  return  $hero;


                         }
       public function deletehero($id){
        $hero= Hero::find( $id);
        $hero->status= 1;
        $hero->save();
        return  $hero;


       }



       public function LikeHero(Request $request){
       
        $cal=0;
        $div=0;
        $res=0;
        $res2=0;
      $hero= Hero::find( $request->id);
        $num1= $hero["counterLike"];
        $num2= $hero["counterDislike"];
        $num1=$num1+1;

        $cal=$num1+$num2;
        $res=($num1/$cal)*100;
        $res2=($num2/$cal)*100;
        $hero->percentageLike=$res;
        $hero->percentageDisLike=$res2;

        $hero->status= 0;
        $hero->StatusIcon=1;
        $hero->counterLike=$num1;
        $hero->counterDislike=$num2;
        $hero->save();
       return  $hero;


                              }


     public function dislikeHero(Request $request){
      $cal=0;
      $div=0;
      $res=0;
      $res2=0;
      $hero= Hero::find( $request->id);
      $num1= $hero["counterLike"];
      $num2= $hero["counterDislike"];
      $num2=$num2+1;

      $cal=$num1+$num2;
      $res=($num1/$cal)*100;
      $res2=($num2/$cal)*100;
      $hero->percentageLike=$res;
      $hero->percentageDisLike=$res2;
      $hero->StatusIcon=0;

      $hero->status= 0;
   
      $hero->counterLike=$num1;
      $hero->counterDislike=$num2;
      $hero->save();
     return  $hero;


    }

    public function statusHero(Request $request){
      
      $hero= Hero::find( $request->id);
      $hero->status= 1;
      $hero->save();
     return  $hero;


    }
}
