@php $list = 0; 


 
@endphp
  @foreach($categories as $cate)


         <tr>
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
           
           <td>{{$cate->title}}</td>
           
           
            <td>
                   
            
            <a class="btn btn-danger btn-sm" href="{{route('admin.emailTemplate.edit',['EN',$cate->id])}}">EDIT</a>
                  
                   <button class="btn btn-danger btn-sm btn-all-del"
                    data-action="{{route('admin.emailTemplate.delete',$cate->id)}}"
                    id="#singleDel-{{$cate->id}}" disabled>
                       <i class="fas fa-trash"></i>
                   </button>

                   
           </td>
         </tr>
  @endforeach


   <tr>
     <td colspan="7">{{$categories->links()}}</td>
   </tr>