
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

$(document).ready(function(){

    /**
     * This Method creates on "#addBuuton" press a new line for ingredients
     *
     * @requriements:    "#addbutton" (Button which needs to be clicked)
     *                  "#ingredients-tabel" (Table for the new line of ingredients)(at least one tr required in table)
     * */
    $('#addButton').click(function(){
        $('#ingredients-table tr:last').after('<tr>' +
        '<td><input type="text" name="amount" placeholder="Amount" class="form-control"></td>' +
        '<td>'+generateSelect('none')+'</td>' +
        '<td><input type="text" name="ingredient" placeholder="Ingredient" class="form-control"></td>' +
        '</tr>');
    });

    /**
     * This Method creates on "#createButton" press a JSON which should be stored in the DB
     *
     * @requriements:   "#createButton" (Button which needs to be clicked)
     *                  "#ingredients-tabel" (Table for all the ingredients)
     *                  "#json-ing" (hidden input field for the complete JSON-String)
     * */
    $('#createButton').click(function(){
        var allIngredients = $("#ingredients-table :input" ).serializeArray();
        var result = [];
        for (let i = 0; i < allIngredients.length; i=i+3) {
            const amount = allIngredients[i].value;
            const unit = allIngredients[i+1].value;
            const ingredient = allIngredients[i+2].value;
            result.push({
                "amount" : amount,
                "unit" : unit,
                "ingredient"  : ingredient
            });
        }
        $('#json-ing').val(JSON.stringify(result));
    });

    /**
     * This Method creates the dropdown for units of the ingredients
     *
     * @param:  the preselected value of the units,
     *          if no unit shoud be selected give 'none' as param
     * */
    function generateSelect(selected){
        var result = '<select name="unit" class="form-control">';
        var options = ["g", "ml", "l"];
        options.forEach(element => {
            if (element == selected) {
                result += '<option selected="selected" value="'+ element +'">'+element+'</option>';
            }
            result += '<option value="'+ element +'">'+element+'</option>';
        });
        result += '</select>';
        return result;
    }

    /**
     * This Method creates the list of the ingredients on the show or copy or edit page
     *
     * @requriements:   "#ingredients-tabel" (Table for the new lines of ingredients)
     *                  "#ingredients-edit" or "#ingredients-show" (hidden input field for the JSON-String from the DB)
     * */
    if ($('#allIngredients-edit').val()) {
        var array = JSON.parse($('#allIngredients-edit').val());
        for (let i = 0; i < array.length; i++) {
            var element = array[i];
            $('#ingredients-table tr:last').after('<tr>' +
            '<td><input type="text" name="amount" class="form-control" value="'+ element['amount']+'"></td>' +
            '<td>'+ generateSelect(element['unit']) + '</td>' +
            '<td><input type="text" name="ingredient" class="form-control" value="'+ element['ingredient']+'"></td>' +
            '</tr>');
        }
    }
    if ($('#allIngredients-show').val()) {
        var array = JSON.parse($('#allIngredients-show').val());
        for (let i = 0; i < array.length; i++) {
            const element = array[i];
            $('#ingredients-table tr:last').after('<tr class="row">' +
            '<td class="col-4 text-right">'+element['amount']+'</td>' +
            '<td class="col-2">'+element['unit']+'</td>' +
            '<td class="col-6">'+element['ingredient']+'</td>' +
            '</tr>');
        }
    }

    /**
     * This Method sends an ajax call to delete a specific recipe
     *
     * @requriements:   ".deleteButton" (Button to activate this method)
     *                  ".recipeId" (to get the recipe id whch needs to be deleted)
     *                  "'#table-row-'+ id" (to remove the tablerow of the recipe)
     * */
    $('.deleteButton').click( function(e) {
        e.preventDefault();
        var id = $(this).find('.recipeId').val();
        console.dir(id);
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type: 'DELETE',
            url: "recipes/delete/" +  id,
            data: {
                "id": id
            },
            success: function (data) {
                $('#table-row-'+ id).remove();
            }
        });
   });
});
