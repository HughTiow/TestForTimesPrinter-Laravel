@extends('layouts.app')

@section('content')
<script src="{{ asset('js/todo_note.js') }}" defer></script>
<div class="container">
    <div class="">
        
            <div class="card">
                <div class="card-header">Message
                        <ul id="messageList"></ul>
                </div>
                <div id="inline-block-containter">
                    
                    <div>
                        <table>
                            <tr>
                                <td>@include('content.todo')</td>
                                <td>@include('content.note')</td>
                            </tr>
                        </table>
                        
                        
                    </div>
                </div>
            </div>
        
    </div>
</div>
@endsection
