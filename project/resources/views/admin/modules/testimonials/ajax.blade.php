 @foreach($categories as $cate)
 <?php
$data = json_decode($cate->key_value);
?>
 <?php $category = Session::has('locale') && Session::get('locale') == 'AR' && !empty($cate->arabic) ? $cate->arabic : $cate; ?>
@if(!empty($data))

             <tr>
               <td width="50">
                      <div class="myCheckbox">
                         <input type="checkbox" class="checkFilter" id="category-{{$cate->id}}" name="category_ids[]" 
                         data-id="singleDel-{{$cate->id}}"
                         value="{{$cate->id}}">
                          <label for="category-{{$cate->id}}"></label>
                      </div>
               </td>
               <td><img src="{{url($data->picture)}}" style="width:50px;"></td>
               <td>{{$category->name}}</td>
               <td>{{$category->testimonial}}</td>

               <td>
                    
                                   <a class="btn btn-danger btn-sm" href="{{route('admin.website.testimonials.edit',[Session::get('locale'),$category->id])}}"><i class="fas fa-edit"></i></a>
                          
                 
                      <button class="btn btn-danger btn-sm btn-all-del"
                        data-action="{{route('admin.website.testimonials.delete',$cate->id)}}"
                        id="#singleDel-{{$cate->id}}" disabled>
                           <i class="fas fa-trash"></i>
                      </button>
               </td>
             </tr>
@endif
@endforeach

 <tr>
     <td colspan="5">{{$categories->links()}}</td>
   </tr>