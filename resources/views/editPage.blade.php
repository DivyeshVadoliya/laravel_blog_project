<!DOCTYPE html>
<html>
<head>
	<title>Post_Page</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body >
	<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    
    </x-slot>
 		<div class="container col-sm-5">
 			
 				<div class="container mt-3 ">
		  			<form method="POST">
		  				@csrf
		  				@method("PUT")
		  		<div class="mb-3 mt-3">
		    		<label for="title" class="form-label">Title</label>
		    		<input type="text" class="form-control"  name="title" value="{{$editdata->tital}}">
		  		</div>
		    	<div class="mb-3 mt-3">
		      		<label for="blog">Comments:</label>
		      		<textarea class="form-control" rows="5" name="blog">{{$editdata->blog}}</textarea>
		    	</div>
		    		<button type="submit" class="btn btn-info">Update</button>
					  </form>
	
			</div>
		</div>
	</x-app-layout>
</body>
</html>