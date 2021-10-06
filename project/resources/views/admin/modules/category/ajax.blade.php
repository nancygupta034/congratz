@php $list = 0; 


$count = \App\Models\Category::where('menu_active', 1)->where('status', 1)->count();

@endphp
  @foreach($categories as $cate)
  <?php $category = Session::has('locale') && Session::get('locale') == 'AR' && !empty($cate->arabic) ? $cate->arabic : $cate; ?>
         <tr data-count="<?=$count?>">
           <td width="50">
                  <div class="myCheckbox">
                     <input type="checkbox" 
                     class="checkFilter" 
                     id="category-{{$cate->id}}" 
                     name="category_ids[]" 
                     data-id="singleDel-{{$cate->id}}"
                     value="{{$cate->id}}">
                      <label for="category-{{$cate->id}}"></label>
                  </div>
           </td>
           <td>
              @if(!empty($cate->image))
                 <img src="{{url($cate->image)}}" class="img-thumbnail" style="width:120px">
              @endif
           </td>
           <td>{{$category->label}}</td>
           <td>{{$category->meta_title}}</td>
           <td>{{$category->meta_tags}}</td>

           <td>
             
             <div class="from-group">
               <div class="switch-holder">
                    
                    <div class="switch-toggle">
                        <input type="checkbox" class="menu_active" id="langSwitch-{{$cate->id}}"
                        data-unchecked="{{route('admin.category.menuLink',['EN',$cate->id,0])}}"
                        data-action="{{route('admin.category.menuLink',['EN',$cate->id,1])}}"
                        <?= $cate->menu_active == 1 ? 'checked' : '' ?>  <?= $count < 12 && $cate->menu_active == 1 ? 'disabled' : '' ?>>
                        <label for="langSwitch"></label>
                    </div>
                </div>
             </div>
           </td>
            <td>
                   
                        @if(Session::has('locale') && Session::get('locale') == 'AR')
                          @if($cate->arabic != null && $cate->arabic->count() > 0)
                          <a class="btn btn-success btn-sm" href="{{route('admin.category.edit',['AR',$cate->arabic->id])}}"><i class="fas fa-edit"></i></a>
                          <!-- ARABIC -->
                          @endif

                        @else
                           <a class="btn btn-success btn-sm" href="{{route('admin.category.edit',['EN',$cate->id])}}"><i class="fas fa-edit"></i></a>
                           <!-- ENGLISH -->
                        @endif
            
                  
                   <button class="btn btn-danger btn-sm btn-all-del"
                    data-action="{{route('admin.category.delete',$cate->id)}}"
                    id="#singleDel-{{$cate->id}}" disabled>
                       <i class="fas fa-trash"></i>
                   </button>

                   
           </td>
         </tr>
  @endforeach


   <tr>
     <td colspan="7">{{$categories->links()}}</td>
   </tr>