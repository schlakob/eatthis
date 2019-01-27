<script type="text/javascript">
    $(document).ready(function(){
        $array = JSON.parse($('#allIngredients').val());
        console.dir($array);
        for (let i = 0; i < $array.length; i++) {
            $element = $array[i];
            $('#ingredients-table tr:last').after('<tr>' +
            '<td><input type="text" name="amount" class="form-control" value="'+ $element['amount']+'"></td>' +
            '<td>'+ generateSelect($element['unit']) + '</td>' +
            '<td><input type="text" name="ingredient" class="form-control" value="'+ $element['ingredient']+'"></td>' +
            '</tr>');
        }
    });
</script>
