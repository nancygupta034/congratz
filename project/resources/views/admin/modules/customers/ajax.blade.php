 @foreach($categories as $cate)
         <tr>
           <td>
              @if(!empty($cate->profile_picture))
                 <img src="{{url($cate->profile_picture)}}" class="img-thumbnail" style="width:120px">
              @endif
           </td>
           <td>{{ucfirst($cate->name)}}
            <p>{{$cate->created_at}}</p></td>
           <td>{{ucfirst($cate->role)}}</td>
           <td>
             <div class="from-group">
               <div class="switch-holder">
                    <div class="switch-toggle">
                        <input type="checkbox" class="menu_active" id="langSwitch-{{$cate->id}}"
                        data-unchecked="{{route('admin.customer.active',[$cate->id,0])}}"
                        data-action="{{route('admin.customer.active',[$cate->id,1])}}"
                        <?= $cate->status == 1 ? 'checked' : '' ?>>
                        <label for="langSwitch"></label>
                    </div>
                </div>
             </div>
           </td>
            <td>
              <a class="btn btn-danger btn-sm  "
                 id="#singleDel-{{$cate->id}}">
                   <i class="fas fa-eye"></i>
               </a>
           </td>
         </tr>
  @endforeach

    <tr>
  <td colspan="4">{{$categories->links()}}</td>
</tr>

