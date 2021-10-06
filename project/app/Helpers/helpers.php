<?php
 

function ActiveMenus($arr,$returnText,$route=null)
{
     $currentRoute = \Request::route()->getName();
         $i=0;

         if($currentRoute == $route){
             return  $returnText;
         }elseif($route == null){

            for($j=0;$j<count($arr); $j++){
                
                if($arr[$j] == $currentRoute){
                    $i++;
                 }
           }

        }

          

         return $i > 0 ? $returnText : '' ;
}


#------------------------------------------------------------------------------------------------------
#  getDatas
#------------------------------------------------------------------------------------------------------


function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 's@6@#^7528we56sd7wee&&^*##'; // user define private key
    $secret_iv = '5fgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}


#------------------------------------------------------------------------------------------------------
#  getDatas
#------------------------------------------------------------------------------------------------------

function WebsiteSettings($type,$key)
{
     $lang = Session::has('locale') && Session::get('locale') ? Session::get('locale') : 'EN';
     $d = \App\Models\WebsiteSettings::where('type',$type)->where('lang',$lang)->where('key',$key);
     //$w = $d->count() > 0 ? $d->first()->key_value : '';
     $value = '';
     if($d->count() > 0 && !empty($d->first()->key_value)){
            $value = $d->first()->key_value;
          
     }else{
       $d = \App\Models\WebsiteSettings::where('type',$type)->where('lang','EN')->where('key',$key);
       $value = $d->count() > 0 ? $d->first()->key_value : '';


     }
     return $value;
}




 function rattingStar($id){

       

         if($id == 1){
            return "<i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
         }elseif($id == 2){
           return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>"; 
         }elseif($id == 3){
            return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i>";
         }elseif($id == 4){
            return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i>";
         }elseif($id == 5){
            return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
         }
     }



function langText($key)
{
  if((Session::has('locale') && Session::get('locale') == 'AR')){
     $d = \App\Models\WebsiteSettings::where('type','languages')->where('key',$key);
     return $w = $d->count() > 0 ? $d->first()->key_value : $key;

  }else{
    return $key;
  }
}





function _lang($key)
{
  if((Session::has('locale') && Session::get('locale') == 'AR')){
     $d = \App\Models\WebsiteSettings::where('type','languages')->where('key',$key);
     return $w = $d->count() > 0 ? $d->first()->key_value : $key;

  }else{
    return $key;
  }
}







function cartQty()
{
  $cartItems =  Cart::content();
  $i = 0;
  foreach ($cartItems as $item) {
      $i += $item->qty;
  }
  return $i;

}



function custom_format($n, $d = 0) {
    $n = number_format($n, $d, '.','');
    $n = strrev($n);

    if ($d) $d++;
    $d += 3;

    if (strlen($n) > $d)
        $n = substr($n, 0, $d) . ','
            . implode(',', str_split(substr($n, $d), 2));

    return strrev($n);
}


///------------------- Ratting---------------------------------------------

 function rating($product){


             $total=$product->reviews->sum('rating');
             $count=$product->reviews->count();
             if($count !=0){

                  $overall=   $total / $count;
                  return custom_format(round($overall,2),1);
             }
  
}

function ProductRate($product)
{
   $pro = $product->parent > 0 ? $product->getParentProductData : $product;
   $rate = rating($pro);
             $total=$pro->reviews->sum('rating');
             $count=$pro->reviews->count();
             $rat = rating($pro);
  $arr =[
       'count' => $count,
       'total' => $total,
       'rating' => ratingStaring($rat,$count),
       'rate' => custom_format($rat,1),
       'overall' => overAllRating($product)
  ];
  return $arr;
}


function ProductReviewRate($rate)
{
  $text  ='<ul class="list-inline">';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,1).'"></i></li>';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,2).'"></i></li>';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,3).'"></i></li>';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,4).'"></i></li>';
  $text .='<li class="list-inline-item"><i class="fa '.getStarFa($rate,5).'"></i></li>';
  $text .='</ul>';

  return $text;
}

function getStarFa($rate,$no)
{
 return $rate >= $no ? 'fa-star' : 'fa-star-o';
}

function getStarFasChecked($rate,$no)
{
 return $rate >= $no ? 'checked' : '';
}
 
function ratingStaring($rate,$count=0)
{
    $text ='<div class="rating">';

    $text .='<div class="stars">';
    $text  .='<span class="fa fa-star '.getStarFasChecked($rate,1).'"></span>';
    $text .='<span class="fa fa-star '.getStarFasChecked($rate,2).'"></span>';
    $text .='<span class="fa fa-star '.getStarFasChecked($rate,3).'"></span>';
    $text .='<span class="fa fa-star '.getStarFasChecked($rate,4).'"></span>';
    $text .='<span class="fa fa-star '.getStarFasChecked($rate,5).'"></span>';


    $text .='</div>';
    $text .='<span class="review-no">'.$count.' reviews</span>';
    $text .='</div>';
  return $text;
}








function overAllRating($product)
{

 

$five = getTotalAccordingToStar($product,5);
$four = getTotalAccordingToStar($product,4);
$three = getTotalAccordingToStar($product,3);
$two = getTotalAccordingToStar($product,2);
$one = getTotalAccordingToStar($product,1);



  $text  ='<div class="rating-content">';
  $text .='<div class="side"> <div>5 star</div></div>';
  $text .='<div class="middle"> <div class="bar-container"> <div class="bar-5" style="width:'.$five['total'].'%"></div> </div></div>';
  $text .='<div class="side right"><div>'.$five['count'].'</div></div>';
  $text .='<div class="side"><div>4 star</div></div>';
  $text .='<div class="middle"><div class="bar-container"><div class="bar-4" style="width:'.$four['total'].'%"></div></div></div>';
  $text .='<div class="side right"><div>'.$four['count'].'</div></div>';
  $text .='<div class="side"><div>3 star</div></div>';
  $text .='<div class="middle"><div class="bar-container"><div class="bar-3" style="width:'.$three['total'].'%"></div></div></div>';
  $text .='<div class="side right"><div>'.$three['count'].'</div></div>';
  $text .='<div class="side"><div>2 star</div></div>';
  $text .='<div class="middle"><div class="bar-container"><div class="bar-2" style="width:'.$two['total'].'%"></div></div></div>';
  $text .='<div class="side right"><div>'.$two['count'].'</div></div>';
  $text .='<div class="side"><div>1 star</div></div>';
  $text .='<div class="middle"><div class="bar-container"><div class="bar-1" style="width:'.$one['total'].'%"></div></div></div>';
  $text .='<div class="side right"><div>'.$one['count'].'</div></div>';
  $text .='</div>';
  return $text;

}




function getTotalAccordingToStar($product,$rate)
{
    $count = $product->reviews->count();
    $percent = ($count / 100);
    $rating =$product->reviews->where('rating',$rate)->count();
    $total = $rating > 0 ? round($rating / $percent) : 0;
    return [
       'total' => $total,
       'count' => $rating
    ];
}







function ratinffloat($id){
   $rat= rating($id);

    $exp = explode(".", $rat);
     if(count($exp) == 1){

      return $exp[0];

     }else{

          $num1 =$exp[1];
            
             $num =num($num1);

             
           return  checknum($num,$exp);


     }
}



function num($num1)
{
     if($num1 < 25){

              return 0;

            }elseif($num1 >= 25 && $num1 <= 50){

                return 5;

            }elseif($num1 > 50 && $num1 < 75){

              return 5;

            }elseif($num1 >= 75){

              return 1;

            }else{

              return 0;
              
            }
}

function checknum($num,$exp)
{
          if($num == 1){

              return $exp[0] + 1;

             }elseif($num > 0){

              return $exp[0].'.'.$num;

             }else{
              return $exp[0];
             
              }
}


function getRatingAboutCompany($c_id,$val){
  $num = ratinffloat($c_id);
  if($num == $val){
    return "checked";
  }
}


 
///------------------- Ratting---------------------------------------------




















 



 
function getSettings($key,$type,$value=NULL)
{
   $w = \App\Models\WebsiteSettings::where('key',$key)->where('type',$type);
   if($w->count() == 0){
        $c = new \App\Models\WebsiteSettings;
        $c->key = $key;
        $c->type = $type;
        $c->keyValue = $value;
        $c->save();
        return $c->keyValue;
   }else{
        $c = $w->first();
        $c->key = $key;
        $c->type = $type;
        if($value !=NULL): 
          $c->keyValue = $value; 
        endif;
        $c->save();
        return $c->keyValue;
   }
}








function parentCategory2($categories,$data=null){
 $text = '<ul id="treeview" class="hummingbird-base">';


 $ids = $data != null && $data->getparent != null && $data->getparent->count() > 0 ? $data->getparent->getTreeIds() : [];


 foreach($categories as $cate){
          $parent = $cate->label;
          $text .= '<li>';
          $text .= '<div class="accoedion-box">';
          $text .= '<a href="javascript:void(0);" class="acrdn-open">';  
          $text .= in_array($cate->id, $ids) ? '<i class="fa fa-minus"></i>' : '<i class="fa fa-plus"></i>';   
          $text .= '</a>';      
          $text .= '<div class="custom-control custom-checkbox">';
        if($cate->children == null || $cate->children->count() == 0){
             $text .= '<input name="category" class="custom-control-input"
                value="'.$cate->id.'" type="radio" id="label-'.$cate->id.'" data-label="'.$parent.'">';
        }
          $text .= '<label for="label-'.$cate->id.'" class="custom-control-label"> ';
          $text .= $cate->label.'</label>';
          $text .= '</div>';
          $text .= '</div>';
          if($cate->children != null && $cate->children->count() > 0){

              $activeClass = in_array($cate->id, $ids) ? 'active' : '';
              
             
            $text .= subCategory2($cate->children,$ids,$activeClass);
          }
           
          $text .= '</li>';
}

 $text .= '</ul>';
 return $text;

}

function subCategory2($category,$ids,$activeClass){


  $text  = '<ul class="category--list '.$activeClass.'">';
  foreach($category as $key => $cate){
          $parent =  $cate->getTree().' | '.$cate->label;
           $text .= '<li>';
           $text .= '<div class="accoedion-box">';
           $text .= '<a href="javascript:void(0);" class="acrdn-open">';  
           $text .= in_array($cate->id, $ids) ? '<i class="fa fa-minus"></i>' : '<i class="fa fa-plus"></i>';   
           $text .= '</a>';       
           $text .= '<div class="custom-control custom-checkbox">';  
            if($cate->children == null || $cate->children->count() == 0){        
                      $text .= '<input name="category" class="custom-control-input" value="'.$cate->id.'" type="radio" 
                                id="label-'.$cate->id.'" data-label="'.$parent.'">';
            }
           $text .= '<label for="label-'.$cate->id.'" class="custom-control-label"> ';
           $text .= $cate->label.'</label>';
           $text .= '</div>';
           $text .= '</div>';
          if($cate->children != null && $cate->children->count() > 0){
             $parent2 = $parent.$cate->label;
             $activeClass = in_array($cate->id, $ids) ? 'active' : '';
            $text .= subCategory2($cate->children,$ids,$activeClass);
          }

           $text .= '</li>';
 }

 $text .= '</ul>';
return $text;
}









function parentCategory($categories,$data=null){
 $text = '<ul id="treeview" class="hummingbird-base">';


 $ids = $data != null && $data->getparent != null && $data->getparent->count() > 0 ? $data->getparent->getTreeIds() : [];


 foreach($categories as $cate){
          $parent = $cate->label;
          $text .= '<li>';
          $text .= '<div class="accoedion-box">';
          $text .= '<a href="javascript:void(0);" class="acrdn-open">';  
          $text .= in_array($cate->id, $ids) ? '<i class="fa fa-minus"></i>' : '<i class="fa fa-plus"></i>';   
          $text .= '</a>';      
          $text .= '<div class="custom-control custom-checkbox">';
          $text .= '<input name="category" class="custom-control-input"
                value="'.$cate->id.'" type="radio" id="label-'.$cate->id.'" data-label="'.$parent.'">';
          $text .= '<label for="label-'.$cate->id.'" class="custom-control-label"> ';
          $text .= $cate->label.'</label>';
          $text .= '</div>';
          $text .= '</div>';
          if($cate->children != null && $cate->children->count() > 0){

              $activeClass = in_array($cate->id, $ids) ? 'active' : '';
              
             
            $text .= subCategory($cate->children,$ids,$activeClass);
          }
           
          $text .= '</li>';
}

 $text .= '</ul>';

 return $text;
}

function subCategory($category,$ids,$activeClass){


  $text  = '<ul class="category--list '.$activeClass.'">';
 foreach($category as $key => $cate){
          $parent =  $cate->getTree().' | '.$cate->label;
           $text .= '<li>';
           $text .= '<div class="accoedion-box">';
           $text .= '<a href="javascript:void(0);" class="acrdn-open">';  
           $text .= in_array($cate->id, $ids) ? '<i class="fa fa-minus"></i>' : '<i class="fa fa-plus"></i>';   
           $text .= '</a>';       
           $text .= '<div class="custom-control custom-checkbox">';  
           $text .= '<input name="category" class="custom-control-input" value="'.$cate->id.'" type="radio" 
                                id="label-'.$cate->id.'" data-label="'.$parent.'">';
           $text .= '<label for="label-'.$cate->id.'" class="custom-control-label"> ';
           $text .= $cate->label.'</label>';
           $text .= '</div>';
           $text .= '</div>';
          if($cate->children != null && $cate->children->count() > 0){
             $parent2 = $parent.$cate->label;
             $activeClass = in_array($cate->id, $ids) ? 'active' : '';
             $text .= subCategory($cate->children,$ids,$activeClass);
          }

           $text .= '</li>';
}

 $text .= '</ul>';
return $text;
}






function uploadFileWithAjax($path,$file,$type=0)
{
                    $timestamp = time().str_random(20);
                    $hash = explode(' ',$file->getClientOriginalName());
                    $OriginalName = implode("",$hash);
                    $hash2 = explode('-',$OriginalName);
                    $OriginalName2 = implode("",$hash2);
                    $name = $timestamp. '' .$OriginalName2;  
                    if($file->move($path, $name)) { 
                        if($type == 1){                  
                          return $path.$name;
                         }else{
                         return [
                             'url' => $path.$name,
                             'name' => $name,
                             'size' => 1
                         ];
                         }                     
                    }else{
                         return [];
                    }
}




function set_active($new,$text, $route = null) {

    $current = \Request::route()->getname();
    $i=0;
      if($current == $route){
        return $text;
    }
    elseif($route == null)
    {
      for ($x = 0; $x < count($new); $x++) {
        if($new[$x] == $current)
        {
          $i++;
        }
      }
    }
      
      return $i>0 ? $text : '';

  }


  // Check product added in wishlist or not
  function CheckWishlist($product_id){
    if(Auth::user()){
      $wish = Wishlist::where('product_id',$product_id)->where('user_id',Auth::user()->id)->where('status',1);      
      return $wish->count() > 0 ? 1 : 0;
    }else{
      return 0;
    }
  }


  // Calculate Cart Subtotal Value
  function CartSubtotal($user_id){
    return OrderItem::where(['user_id' => Auth::user()->id, 'type' => 'cart', 'status' => 1])->sum('sub_total');
  }

  // Get Product Id using name for Csv
  function GetProductId($cat_name){
    $data = \App\Models\Category::where('label',$cat_name)->first();
    return $data->id;
  }




function combinations($arrays, $i = 0) {
    if (!isset($arrays[$i])) {
        return array();
    }
    if ($i == count($arrays) - 1) {
        return $arrays[$i];
    }

    // get combinations from subsequent arrays
    $tmp = combinations($arrays, $i + 1);

    $result = array();

    // concat each array from tmp with each element from $arrays[$i]
    foreach ($arrays[$i] as $v) {
        foreach ($tmp as $t) {
            $result[] = is_array($t) ? 
                array_merge(array($v), $t) :
                array($v, $t);
        }
    }

    return $result;
}

// print_r(
//     combinations(
//         array(
//             array('A1','A2','A3'), 
//             array('B1','B2','B3'), 
//             array('C1','C2')
//         )
//     )
// );

function textbox($errors,$label, $name,$value=null){
    if($errors->has($name)){
      $border="BORDER";
    }else{
      $border="";
    }
        if(Session::has($name)){
          $ex=Session::get($name);
          $border="BORDER";
        }else{
          $ex="";
        }


    if($value==null){
      $v=old($name);
    }else{
      $v=$value;
    }

    if($v == ""){
      $v1="is-empty";
    }else{
      $v1="is-focused";
    }
    $text = "";
    // $text .= "<div class='form-group'>";
    // $text .="<label>$label</label>";
    // $text .= "<input type='text' class='form-control $border' name='$name' value='".$v."'>";
    // $text .="<label for='".$name."' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
    // $text .="</div>";
        $text .="<div class='form-group $v1'>";
         $text .="<label class='control-label'>$label</label>";
         $text .='<input type="text" class="form-control '.$border.'" name="'.$name.'" value="'.$v.'" id="'.$name.'">';
    $text .="<span class='material-input'></span>";
      $text .="<label for='$name' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
     $text .="</div>";

    echo $text;
  }


  function textnumber($errors,$label, $name,$value=null,$min=null,$max=null){
    if($errors->has($name)){
      $border="BORDER";
    }else{
      $border="";
    }
        if(Session::has($name)){
          $ex=Session::get($name);
          $border="BORDER";
        }else{
          $ex="";
        }


    if($value==null){
      $v=old($name);
    }else{
      $v=$value;
    }

    if($v == ""){
      $v1="is-empty";
    }else{
      $v1="is-focused";
    }
    $text = "";
    // $text .= "<div class='form-group'>";
    // $text .="<label>$label</label>";
    // $text .= "<input type='text' class='form-control $border' name='$name' value='".$v."'>";
    // $text .="<label for='".$name."' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
    // $text .="</div>";
    $text .="<div class='form-group label-floating $v1'>";
    $text .="<label class='control-label'>$label</label>";
    $text .='<input type="number" class="form-control '.$border.'"  min="'.$min.'"   max="'.$max.'" name="'.$name.'" value="'.$v.'" id="'.$name.'">';
    // $text .="<span class='material-input'></span>";
    $text .="<label for='$name' class='error'>".$errors->first($name)."&nbsp;".$ex."</label>";
    $text .="</div>";

    echo $text;
  }






function select3($errors,$label,$name,$col,$select,$array,$value=null){
    if($errors->has($name)){
      $border="BORDER";
    }else{
      $border="";
    }
        if(Session::has($name)){
          $ex=Session::get($name);
          $border="BORDER";
        }else{
          $ex="";
        }
       

    if($value==null){
      $v=0;
    }else{
      $v=$value;
    }

    if($v == ""){
      $v1="is-empty";
    }else{
      $v1="";
    }
     $old=old($name);
     $text = "";
     $text .="<div class='form-group label-floating is-focused'>";
         $text .="<label class='control-label'>$label</label>";

         $text .= "<select class='form-control $border' name='$name' id='$name'>";
         $text .="<option value='".$select."'>Select</option>";    
          foreach ($array as $key) {
                  if($key['id'] == $v || $old == $key['id'] ){
                        
                        $text .="<option value='".$key['id']."' selected>".$key[$col]."</option>";    

                  }else{
                        
                        $text .="<option value='".$key['id']."'>".$key[$col]."</option>";

                  }         
                                

          }

    
  
    $text .="</select>";
    $text .="<span class='material-input'></span>"; 
    $text .="<label class='error' for='".$name."'>".$errors->first($name)."&nbsp;".$ex."</label>";
    $text .="</div>";

    echo $text;
  }





function select($errors,$label,$name,$array,$value=null,$labelcol="",$col=""){
    if($errors->has($name)){
      $border="BORDER";
    }else{
      $border="";
    }
        if(Session::has($name)){
          $ex=Session::get($name);
          $border="BORDER";
        }else{
          $ex="";
        }
       

    if($value==null){
      $v=0;
    }else{
      $v=$value;
    }

    if($v == ""){
      $v1="is-empty";
    }else{
      $v1="";
    }
     $old=old($name);
     $text = "";
     $text .="<div class='form-group label-floating is-focused'>";
         $text .="<label class='control-label $labelcol'>$label</label>";
        // $text .="<div class='$col'>";
         $text .= "<select class='form-control $border' name='$name' id='$name'>";
         $text .="<option value=''>Select</option>";    
          foreach ($array as $key) {
                  if($key['id'] == $v || $old == $key['id'] ){
                        
                        $text .="<option value='".$key['id']."' selected>".$key[$name]."</option>";    

                  }else{
                        
                        $text .="<option value='".$key['id']."'>".$key[$name]."</option>";

                  }         
                                

          }

    
  
    $text .="</select>";
    // $text .="<span class='material-input'></span>";  
    $text .="<label class='error' for='$name'>".$errors->first($name)."&nbsp;".$ex."</label>";
    //$text .="</div>";
    $text .="</div>";

    echo $text;
  }












