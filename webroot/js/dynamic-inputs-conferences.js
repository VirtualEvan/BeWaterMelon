$(document).ready(function() {
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        $(wrapper).append('<div class="col-md-6 to_rem_'+x+'"><div class="form-group"><input type="text" name="act_conference_years['+x+'][year]" class="form-control" required="required" maxlength="200" pattern="[0-9]{4}"></div></div>');
        $(wrapper).append('<div class="col-md-6 to_rem_'+x+'"><div class="input-group"><input type="text" name="act_conference_years['+x+'][link]" class="form-control" maxlength="200" pattern = "(((https?)://)?(\\S*?\\.\\S*?))([\\s)\\[\\]{},;\':<]|\\.\\s|$)"><div class="input-group-btn"><button id='+x+' class="btn btn-info btn-sm remove_field"><div class="fa fa-minus"></div></div></div></div>');
        x++;
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(".to_rem_"+this.id).remove();
    })
});
