
@foreach($contacts as $a)
<p>id : {{$a->id}} => nom : {{$a->nom}}</p>
@endforeach
</br>
</br>
</br>
where 
@foreach($recents as $recent)
<p>{{$recent->nom}}</p>
@endforeach
</br>
</br>
</br>
limit
 @foreach($limits as $limit)
<p>{{$limit->nom}}</p>
@endforeach