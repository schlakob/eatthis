<script type="text/javascript">
        function generateSelect(selected){
            $result = '<select name="unit" class="form-control">';
            $options = ["g", "ml", "l"];
            $options.forEach(element => {
                if (element == selected) {
                    $result += '<option selected="selected" value="'+ element +'">'+element+'</option>';
                }
                $result += '<option value="'+ element +'">'+element+'</option>';
            });
            $result += '</select>';
            return $result;
        }
</script>
