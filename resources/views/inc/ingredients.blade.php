@include('inc/unitSelect')
<script type="text/javascript">
    $(document).ready(function(){
        $('#addButton').click(function(){
            $('#ingredients-table tr:last').after('<tr>' +
            '<td><input type="text" name="amount" placeholder="Amount" class="form-control"></td>' +
            '<td>'+generateSelect('none')+'</td>' +
            '<td><input type="text" name="ingredient" placeholder="Ingredient" class="form-control"></td>' +
            '</tr>');
        });
        $('#createButton').click(function(){
            $counter = 0;
            $allIngredients = $("#ingredients-table :input" ).serializeArray();
            $result = [];
            for (let i = 0; i < $allIngredients.length; i=i+3) {
                const amount = $allIngredients[i].value;
                const unit = $allIngredients[i+1].value;
                const ingredient = $allIngredients[i+2].value;
                $result.push({
                    "amount" : amount,
                    "unit" : unit,
                    "ingredient"  : ingredient
                });
            }
            $('#json-ing').val(JSON.stringify($result));
        });
    });
</script>

