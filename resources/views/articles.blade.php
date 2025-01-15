@include('root/header')
    

@foreach ($articles as $a)
<div>
    
    <h4>{{$a->title}}</h4>
    <p>{{$a->description}}</p>
    <div>
       Created By: {{$a->user->getFullName()}}
      Created On: {{$a->created_at}}
    </div>

</div>
@endforeach

@include('root/footer')