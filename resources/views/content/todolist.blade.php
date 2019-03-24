@if(count($todos) > 0)
    @foreach($todos as $todo)
        <div class="well">
            <div class="col-xs-3">
                    <span class="todoTitle">{{$todo->todo}}</span>
                    <div class='noteIcon'>
                        
                        @if ($todo->mark =='1')
                            <span class="glyphicon glyphicon-ok" onClick='Update(this,{{$todo->id}})' val='{{$todo->mark}}'></span>
                        @else
                           <span class="glyphicon glyphicon-remove" onClick='Update(this,{{$todo->id}})' val='{{$todo->mark}}'></span>
                        @endif
                        
                        <span class='glyphicon glyphicon-trash' onClick='deleteTodo({{$todo->id}})'></span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
@else
    <p>No TODO found</p>
@endif
