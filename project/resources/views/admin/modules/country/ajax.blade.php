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
                                 <td>{{$category->name}}</td>
                                 <td>+{{$category->phonecode}}</td>
                                 <td>{{$category->sortname}}</td>
                                  <td> 
                         @if(Session::has('locale') && Session::get('locale') == 'AR')
                          @if($cate->arabic != null && $cate->arabic->count() > 0)
                           <a class="btn btn-success btn-sm" href="{{route('admin.country.edit',['AR',$cate->arabic->id])}}"><i class="fas fa-edit"></i></a>
                          <!-- ARABIC -->
                          @endif

                        @else
                          <a class="btn btn-success btn-sm" href="{{route('admin.country.edit',['EN',$cate->id])}}"><i class="fas fa-edit"></i></a>
                           <!-- ENGLISH -->
                        @endif 
                                        
                                         <button class="btn btn-danger btn-sm btn-all-del"
                                          data-action="{{route('admin.country.delete',$cate->id)}}"
                                          id="#singleDel-{{$cate->id}}" disabled>
                                             <i class="fas fa-trash"></i>
                                         </button>
                                 </td>
                               </tr>
  @endforeach

<tr>
  <td colspan="6">{{$categories->links()}}</td>
</tr>
