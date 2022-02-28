 <script>
     // Categorias Juntyme
     $(function() {

         $("#tipo").change(function() {
                 cat_id = $("#tipo option:selected").attr('value');
                 if (cat_id) {
                     $.ajax({
                         url: $('#linkMarca').val() + '?dep=' + cat_id,
                         type: "get",
                         dataType: "json",
                         success: function(response) {
                             if (response.success == true) {
                                 const data = JSON.parse(response.message);

                                 $('#cat_ml').html('');
                                 $('#subcat_ml').html('');

                                 selectIput = '<option value="">-- Marca --</option>';
                                 //Laço de Repetição
                                 $.each(data, function(i, item) {
                                     title = item['marca'];
                                     selectIput +=
                                         `<option value="${title}">${title}</option>`;
                                 });
                                 selectIput += '</select> </div>';

                                 $('#marca').html(selectIput);
                                 $('#modelo').html('<option value="">-- Modelo --</option>');
                             } else {
                                 $('#marca').html('<option value="">-- Marca --</option>');
                                 $('#modelo').html('<option value="">-- Modelo --</option>');
                             }
                         },
                         error: function() {
                             $('#marca').html('<option value="">-- Marca --</option>');
                             $('#modelo').html('<option value="">-- Modelo --</option>');
                         }
                     });
                 }
             })
             .trigger("change");

         $("#marca").change(function() {
                 cat_id = $("#marca option:selected").attr('value');
                 tip_id = $("#tipo option:selected").attr('value');
                 if (cat_id) {
                     $.ajax({
                         url: $('#linkModelo').val() + '?dep=' + cat_id + '&tipo=' + tip_id,
                         type: "get",
                         dataType: "json",
                         success: function(response) {
                             if (response.success == true) {
                                 const data = JSON.parse(response.message);

                                 $('#cat_ml').html('');
                                 $('#subcat_ml').html('');

                                 selectIput = '<option value="">-- Modelo --</option>';
                                 //Laço de Repetição
                                 $.each(data, function(i, item) {
                                     title = item['modelo'];
                                     selectIput +=
                                         `<option value="${title}">${title}</option>`;
                                 });
                                 selectIput += '</select> </div>';

                                 $('#modelo').html(selectIput);
                             } else {
                                 $('#modelo').html('');
                             }
                         },
                         error: function() {
                             $('#modelo').html('');
                         }
                     });
                 }
             })
             .trigger("change");
     });
 </script>
