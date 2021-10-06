 @foreach($categories as $cate)
 
             <tr>
               
               <td>{{$cate->key}}</td>
               <td>{{$cate->key_value}}</td>
               <td><a href="{{route('admin.website.languages.edit',$cate->id)}}" class="btn btn-warning">{{_lang('Edit')}}</a></td>
               
             </tr>
 
@endforeach

<tr>
	<td colspan="3">{{$categories->links()}}</td>
</tr>

