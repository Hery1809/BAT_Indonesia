        function checkOnlyDigits(e) {
            e = e ? e : window.event;
            
            var charCode = e.which ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                document.getElementById('errorMsg').style.display = 'block';
                document.getElementById('errorMsg').style.color = 'red';
                document.getElementById('errorMsg').innerHTML = 'OOPs! Only digits allowed.';
                return false;
            } else {
                document.getElementById('errorMsg').style.display = 'none';
                return true;
            }
        }

        function checkval (tot, val) 
        {
            let x = tot;
            let y = val;
            if (y > x){
                document.getElementById('submit').style.display = 'none';
                document.getElementById('errorMsg').style.display = 'block';
                document.getElementById('errorMsg').style.color = 'red';
                document.getElementById('errorMsg').innerHTML = 'OOPs! Cant exceed the weekly amount.';
                return false;
            } else {
                document.getElementById('errorMsg').style.display = 'none';
                document.getElementById('submit').style.display = 'initial';
                return true;
            }
        }


                

    $(document).ready(function () {
  
      $('#training').on('keypress', '.digit', function (e) {
            e = e ? e : window.event;
            
            var charCode = e.which ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                document.getElementById('errorMsg').style.display = 'block';
                document.getElementById('errorMsg').style.color = 'red';
                document.getElementById('errorMsg').innerHTML = 'OOPs! Only digits allowed.';
                return false;
            } else {
                document.getElementById('errorMsg').style.display = 'none';
                return true;
            }
        });


      $('#training').on('focus', '.date', function () {
            $('#demo-dp-txtinput input').datepicker(
                    {
                        format: "yyyy-mm-dd",
                        todayBtn: "linked",
                        autoclose: true,
                        todayHighlight: true
                    }
            );

         //    var date=new Date();
            // var year=date.getFullYear();
            // var month=date.getMonth();
   //           $('#demo-dp-txtinput input').datepicker(
         //            {
         //                format: "yyyy-mm-dd",
         //                autoclose: true,
         //                startDate: new Date(year, month, '01'),
   //                   endDate: new Date(year, month, '31')
         //            }
         //    );
        });

      // Denotes total number of rows
      var rowIdx = jQuery('#training >tr').length;
  
      // jQuery button click event to add a row
      $('#addBtn').on('click', function () {
  
        // Adding a row inside the training.
        $('#training').append(`<tr id="R${++rowIdx}">
             <td class="row-index text-center">
             ${rowIdx}
             <input type="hidden" name="t_nomor${rowIdx}" value="${rowIdx}">
             </td>
             <td><input type="text" name="t_name[]" placeholder="Nama Peserta" class="form-control" required></td>
             <td><select name="position_id${rowIdx}" class="form-control">
                    <option value=""></option>
                    <option value="1">Area Manager</option>
                    <option value="2">Supervisor</option>
                    <option value="3">SR WS</option>
                    <option value="4">SR WS Backup</option>
                    <option value="5">SR Others</option>
                    <option value="6">SR Retail</option>
                    <option value="7">SR Retail Backup</option>
                    <option value="8">Driver</option>
                    <option value="9">Cashier</option>
                    <option value="10">Admin</option>
                    <option value="11">Warehouse</option>
                    <option value="12">Office Boy</option>
                    <option value="13">Security</option>
                 </select>
             </td>
             <td></td>
             <td></td>
              <td class="text-center">
                <button class="btn btn-danger remove"
                  type="button"><i class="fa fa-remove"></i></button>
                </td>
             </tr>`);
      });
  
      // jQuery button click event to remove a row.
      $('#training').on('click', '.remove', function () {
  
        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();
  
        // Iterating across all the rows 
        // obtained to change the index
        child.each(function () {
  
          // Getting <tr> id.
          var id = $(this).attr('id');
  
          // Getting the <p> inside the .row-index class.
          var idx = $(this).children('.row-index').children('p');
  
          // Gets the row number from <tr> id.
          var dig = parseInt(id.substring(1));
  
          // Modifying row index.
          idx.html(`Row ${dig - 1}`);
  
          // Modifying row id.
          $(this).attr('id', `R${dig - 1}`);
        });
  
        // Removing the current row.
        $(this).closest('tr').remove();
  
        // Decreasing total number of rows by 1.
        rowIdx--;
      });
    });

$(document).ready(function(){
                
    $('#demo-dp-txtinput input').datepicker(
            {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true
            }
    );

    $('#demo-dp-txtinput2 input').datepicker(
            {
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years",
                autoclose:true
            }
    );

    $('#demo-dp-txtinput3 input').datepicker(
            {
                format: "mm",
                viewMode: "months", 
                minViewMode: "months",
                autoclose:true
            }
    );


    $('#demo-dp-txtinput4 input').datepicker(
            {
                format: "mm-yyyy",
                viewMode: "months", 
                minViewMode: "months",
                autoclose:true
            }
    );

    // CHOSEN
    // =================================================================
    // Require Chosen
    // http://harvesthq.github.io/chosen/
    // =================================================================
    $('#demo-chosen-select').chosen();
    $('#demo-cs-multiselect').chosen({width:'100%'});


    // SELECT2 SINGLE
    // =================================================================
    // Require Select2
    // https://github.com/select2/select2
    // =================================================================
    $("#demo-select2").select2();




    // SELECT2 PLACEHOLDER
    // =================================================================
    // Require Select2
    // https://github.com/select2/select2
    // =================================================================
    $("#demo-select2-placeholder").select2({
        placeholder: "Select a state",
        allowClear: true
    });



    // SELECT2 SELECT BOXES
    // =================================================================
    // Require Select2
    // https://github.com/select2/select2
    // =================================================================
    $("#demo-select2-multiple-selects").select2();


    // SWITCHERY - CHECKED BY DEFAULT
    // =================================================================
    // Require Switchery
    // http://abpetkov.github.io/switchery/
    // =================================================================
    new Switchery(document.getElementById('demo-sw-checked'));
    new Switchery(document.getElementById('demo-sw-checked1'));
    new Switchery(document.getElementById('demo-sw-checked2'));
    new Switchery(document.getElementById('demo-sw-checked3'));
    new Switchery(document.getElementById('demo-sw-checked4'));


    // SWITCHERY - UNCHECKED BY DEFAULT
    // =================================================================
    // Require Switchery
    // http://abpetkov.github.io/switchery/
    // =================================================================
    new Switchery(document.getElementById('demo-sw-unchecked'));


    // SWITCHERY - CHECKING STATE
    // =================================================================
    // Require Switchery
    // http://abpetkov.github.io/switchery/
    // =================================================================
    var changeCheckbox = document.getElementById('demo-sw-checkstate'), changeField = document.getElementById('demo-sw-checkstate-field');
    new Switchery(changeCheckbox)
    changeField.innerHTML = changeCheckbox.checked;
    changeCheckbox.onchange = function() {
        changeField.innerHTML = changeCheckbox.checked;
    };


    // SWITCHERY - COLORED
    // =================================================================
    // Require Switchery
    // http://abpetkov.github.io/switchery/
    // =================================================================
    new Switchery(document.getElementById('demo-sw-clr1'), {color:'#489eed'});
    new Switchery(document.getElementById('demo-sw-clr2'), {color:'#35b9e7'});
    new Switchery(document.getElementById('demo-sw-clr3'), {color:'#44ba56'});
    new Switchery(document.getElementById('demo-sw-clr4'), {color:'#f0a238'});
    new Switchery(document.getElementById('demo-sw-clr5'), {color:'#e33a4b'});
    new Switchery(document.getElementById('demo-sw-clr6'), {color:'#2cd0a7'});
    new Switchery(document.getElementById('demo-sw-clr7'), {color:'#8669cc'});
    new Switchery(document.getElementById('demo-sw-clr8'), {color:'#ef6eb6'});


    // SWITCHERY - SIZES
    // =================================================================
    // Require Switchery
    // http://abpetkov.github.io/switchery/
    // =================================================================
    new Switchery(document.getElementById('demo-sw-sz-lg'), { size: 'large' });
    new Switchery(document.getElementById('demo-sw-sz'));
    new Switchery(document.getElementById('demo-sw-sz-sm'), { size: 'small' });


});