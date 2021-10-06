 @foreach($categories as $cate)
  <?php $category = Session::has('locale') && Session::get('locale') == 'AR' && !empty($cate->arabic) ? $cate->arabic : $cate;
       
       $state_name = Session::has('locale') && Session::get('locale') == 'AR' && !empty($cate->state->arabic) ? $cate->state->arabic : $cate->state;
   ?>
             <tr>
               <td width="50">
                      <div class="myCheckbox">
                         <input type="checkbox" class="checkFilter" id="category-{{$cate->id}}" name="category_ids[]" 
                         data-id="singleDel-{{$cate->id}}"
                         value="{{$cate->id}}">
                          <label for="category-{{$cate->id}}"></label>
                      </div>
               </td>
               <td>{{$category->name}}</td>
               <td>{{!empty($state_name) ? $state_name->name : '--'}}</td>
              
                
                <td>
                       

                         @if(Session::has('locale') && Session::get('locale') == 'AR')
                          @if($cate->arabic != null && $cate->arabic->count() > 0)
                          <!-- ARABIC -->
                           <a class="btn btn-success btn-sm" href="{{route('admin.city.edit',['AR',$cate->arabic->id])}}"><i class="fas fa-edit"></i></a>
                          @endif

                        @else
                          <a class="btn btn-success btn-sm" href="{{route('admin.city.edit',['EN',$cate->id])}}"><i class="fas fa-edit"></i></a>
                           <!-- ENGLISH -->
                        @endif
                       <button class="btn btn-danger btn-sm btn-all-del"
                        data-action="{{route('admin.city.delete',$cate->id)}}"
                        id="#singleDel-{{$cate->id}}" disabled>
                           <i class="fas fa-trash"></i>
                       </button>
               </td>
                
             </tr>
  @endforeach

<tr>
  <td colspan="5">{{$categories->links()}}</td>
</tr>