@if(count($notes) > 0)
    @foreach($notes as $note)
        <div class="noteRow">
                    <span class='noteTitle'>{{$note->title}}</span>
                    <div class='noteIcon'>
                        <span class="glyphicon glyphicon-edit" onClick='Edit(this,{{$note->id}})'></span>
                        <span class='glyphicon glyphicon-trash' onClick='deleteNote({{$note->id}})'></span>
                    </div><br/>
                    <textarea style='display:none' style='width:100%' readonly>{{$note->context}}</textarea>
                    <div class='updateNote' style='display:none'></div>
        </div>
    @endforeach
@else
    <p>No Note found</p>
@endif
