 @foreach($categories as $cate)
  <?php $category = Session::has('locale') && Session::get('locale') == 'AR' && !empty($cate->arabic) ? $cate->arabic : $cate;
  $state_name = Session::has('locale') && Session::get('locale') == 'AR' && !empty($cate->country->category) ? $cate->category->arabic : $cate->category; ?>
                               <tr>
                                 <td width="50">
                                        <div class="myCheckbox">
                                           <input type="checkbox" class="checkFilter" id="category-{{$cate->id}}" name="category_ids[]" 
                                           data-id="singleDel-{{$cate->id}}"
                                           value="{{$cate->id}}">
                                            <label for="category-{{$cate->id}}"></label>
                                        </div>
                                 </td>
                                 <td>{{!empty($state_name) ? $state_name->title : '--'}}</td>
                                 <td>
                                  <h5>{{$category->title}}</h5>
                                  <p>{{$category->answer}}</p>
                                 </td>
                                    
                                  <td> 
                                          
                                           
                                              <a class="btn btn-success btn-sm" href="{{route('admin.FAQs.edit',[Session::get('locale'),$category->id])}}"> <i class="fas fa-Edit"></i></a>

                                   </td>
                                 <td> 
                                        
                                         <button class="btn btn-danger btn-sm btn-all-del"
                                          data-action="{{route('admin.FAQs.delete',$cate->id)}}"
                                          id="#singleDel-{{$cate->id}}" disabled>
                                             <i class="fas fa-trash"></i>
                                         </button>
                                 </td>
                               </tr>
  @endforeach

  <tr>
     <td colspan="5">{{$categories->links()}}</td>
   </tr>