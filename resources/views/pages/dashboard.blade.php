@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3>Your Recipes</h3></div>
                <div class="card-body">
                    <a href="/recipes/create" class="btn btn-primary btn-block mb-3">Create new recipe</a>
                    @if (count($recipes) > 0)
                    <table class="table table-striped" id='table'>
                        @foreach ($recipes as $recipe)
                        <tr class="row" id="table-row-{{$recipe->id}}">
                                <td class="col-6 pt-4 text-truncate"><a href="/recipes/{{$recipe->id}}" class="text-primary font-weight-bold">{{$recipe->title}}</a></td>
                                <td class="col-3"><a href="/recipes/{{$recipe->id}}/edit" class="btn btn-secondary btn-block">Edit the Recipe</a></td>
                                <td class="col-3">
                                    {!! Form::open(['onsubmit' => 'return false', 'class' => 'deleteButton']) !!}
                                        {{Form::hidden('recipeId', $recipe->id, array('class' => 'recipeId'))}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                                    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                        @else
                            <p>You have no recipes yet</p>
                        @endif
                    </table>
                    <a href="/recipes/create" class="btn btn-primary btn-block mt-3">Create new recipe</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.deleteButton').click( function(e) {
        e.preventDefault();
        $id = $(this).find('.recipeId').val();
        $.ajax({
            type: 'DELETE',
            url: "{!! url('recipes/delete' ) !!}" + "/" + $id,
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $id
            },
            success: function (data) {
                $('#table-row-'+ $id).remove();
            }
        });
   });
});

</script>
@endsection
