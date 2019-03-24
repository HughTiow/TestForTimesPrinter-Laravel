$(document).ready(function(){
		todoList();
		noteList();

		$('#createTodo').click(function(){
			event.preventDefault();
			var todoAdd	= $("#todoAdd").val();
			
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	},
                url: "todo/add",
                type: "POST",
                data: "todoAdd="+todoAdd,
                dataType: "json",
                success:function(data) {
		            todoList();
		            $('#messageList').append("<li>"+data+"</li>");
		           showMessage();
		        },
		        error: function (request, status, error) {
			        alert(request.responseText);
			    }
			});

		});

		$('#createNote').click(function(){
			var noteTitle	= $("#noteAdd").val();
			var context 	=$("#context").val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	},
                url: "note/add",
                type: "POST",
                data: "noteTitle="+noteTitle+"&context="+context,
                dataType: "json",
                success:function(data) {
		            noteList();
		             $('#messageList').append("<li>"+data+"</li>");
		           showMessage();
		        },
		        error: function (request, status, error) {
			        alert(request.responseText, status, error);
			    }
			});

		});

		$(document).on('click', ".noteTitle", function(){ 
			cancelNote();
		   var thisNote= $(this).parent().find("textarea");
		   thisNote.is(":hidden") ? thisNote.show() :thisNote.hide();
		});

	});
	function todoList(){
		$.ajax({
                url: "todo/show",
                dataType: "html",
                success:function(data) {
		            	$("#todoList").html(data);
		        },
		        error: function (request, status, error) {
			        alert(request.responseText,status,error);
			    }
			});
	}

	function noteList(){
		$("#noteList").html("");
		$.ajax({
			url: "note/show",
			dataType: "html",
			success:function(data) {
				$("#noteList").append(data);
	
			},
			error: function (request, status, error) {
				alert(request.responseText);
			}
		});
	}

	function Update(elem,todoID){
		event.preventDefault();

		var mark=$(elem).attr('val');
		var update ;
		mark ==0 ? update=1 :update=0;

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "todo/update",
			type: "POST",
			data: "update="+update+"&todoID="+todoID,
			dataType: "json",
			success:function(data) {
				todoList();
				$('#messageList').append("<li>"+data+"</li>");
				showMessage();
			},
			error: function (request, status, error) {
				alert(request.responseText);
			}
		});
	}

	function deleteTodo(todoID){
		event.preventDefault();

		$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "todo/delete",
                type: "POST",
                data: "todoID="+todoID,
                dataType: "json",
                success:function(data) {
		            todoList();
		            $('#messageList').append("<li>"+data+"</li>");
		           showMessage();
		        },
		        error: function (request, status, error) {
			        alert(request.responseText, status, error);
			    }
			});
	}
	function Edit(elem,noteID){
		cancelNote();
		 var thisNote= $(elem).parent().parent().find("textarea");
		   thisNote.show();

		var updateNoteArea= $(elem).parent().parent().find(".updateNote");
		var thisTile =$(elem).parent().parent().find(".noteTitle").text();
		var thisContext =thisNote.text();

		var markup = 
            	"<div style='width:80%'>\
            	<input type='text' name='updateTitle' value='"+thisTile+"'  style='width:100%' class='form-control'/>\
            	<textarea name='updateContext' style='width:100%'>"+thisContext+"</textarea><br/>\
            	<button onClick='updateNote(this,"+noteID+")' class='btn'>Save</button>\
            	<button onClick='cancelNote(this)' class='btn'>Cancel</button>\
            	</div>";

         updateNoteArea.show();
    	updateNoteArea.append(markup);
	}

	function updateNote(elem,noteID){
		var UpdateElems = $(elem).parent();
		var updateTile =UpdateElems.find("input[name='updateTitle']").val();
		var updateContext =UpdateElems.find("textarea[name='updateContext']").val();

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			url: "note/update",
			type: "POST",
			data: "title="+updateTile+"&context="+updateContext+"&noteID="+noteID,
			dataType: "json",
			success:function(data) {
				noteList();
				$('#messageList').append("<li>"+data+"</li>");
				showMessage();
			},
			error: function (request, status, error) {
				alert(request.responseText);
			}
		});

	}

	function cancelNote(){
		$('textarea[readonly]').hide();
		$(".updateNote").html('');
	}

	function deleteNote(noteId){
		event.preventDefault();

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
			url: "note/delete",
			type: "POST",
			data: "noteId="+noteId,
			dataType: "json",
			success:function(data) {
				noteList();
				$('#messageList').append("<li>"+data+"</li>");
				showMessage();
			},
			error: function (request, status, error) {
				alert(request.responseText);
			}
		});
	}

	function showMessage(){
		var listNum = $("#messageList li").length;
		for(var i=0;i<listNum;i++){
			$.when($( "#messageList li:last" ).fadeTo( 4500,0))
	        	.done(function() {
			    $(this).remove();
			});
		}
 		
	}