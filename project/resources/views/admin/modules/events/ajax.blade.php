 @foreach($categories as $cate)
 <?php $category = Session::has('locale') && Session::get('locale') == 'AR' && !empty($cate->arabic) ? $cate->arabic : $cate; ?>
                               <tr>

                                 <td width="50">
                                        <div class="myCheckbox">
                                           <input type="checkbox" class="checkFilter" id="category-{{$cate->id}}" name="category_ids[]" 
                                           data-id="singleDel-{{$cate->id}}"
                                           value="{{$cate->id}}">
                                            <label for="category-{{$cate->id}}"></label>
                                        </div>
                                 </td>
                                 <td>{{$category->label}}</td>
                                 
                                  <td>
                                          
                                  <a class="btn btn-success btn-sm" href="{{route('admin.event.edit',[Session::get('locale'),$category->id])}}"><i class="fas fa-edit"></i></a>
                           
                                        
                                         <button class="btn btn-danger btn-sm btn-all-del"
                                          data-action="{{route('admin.event.delete',$cate->id)}}"
                                          id="#singleDel-{{$cate->id}}" disabled>
                                             <i class="fas fa-trash"></i>
                                         </button>
                                 </td>
                               </tr>
  @endforeach

  <tr>
     <td colspan="3">{{$categories->links()}}</td>
   </tr>