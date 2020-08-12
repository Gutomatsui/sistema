
<form action="#" method="POST" id="formgeral" enctype="multipart/form-data">

<input type="text" id="hid_id" value="<?php echo $id; ?>" />
<!-- Customer Content -->
<div class="row">
<div class="col-lg-12">
<!-- Orders Block -->
<div class="block">
<!-- Orders Title -->
<div class="block-title text-center ">
<div class="block-options pull-right">

</div>
<h2><i class="fa fa-file"></i> <strong>Serviços</strong></h2>
</div>
<!-- END Orders Title -->

<!-- Orders Content -->
<table class="table table-bordered table-striped table-vcenter">
<tbody>
<tr>
<td class="text-center" style="width: 50%;"><strong>Planos</strong></td>

<td style="color: blue" class="text-center" style="width: 100%;"> <select id="nome_plano" name="nome_plano" class="form-control" size="1">
<option value="" selected>Selecione</option>
<?php
foreach ($listaNomePlano->result()  as $row) 
{
echo '<option  value="' . $row->id_grupo_plano. '">' . $row->nome . '</option>'; 
} 
?>
</select>    </td>


</tr>
<tr>

<td class="text-center" style="width: 50%;"><strong>Tipo do Plano</strong></td>

<td style="color: blue;" class="text-center" style="width: 100%;"> <select id="tipo_plano" name="tipo_plano" class="form-control" size="1">
<option value="" selected>Selecione</option>

</select>    </td>

</tr>
<tr>

<td class="text-center" style="width: 50%;"><strong>Valor do Plano</strong></td>

<td style="color: blue" class="text-center" style="width: 100%;"> <input type="text" id="valor_plano" name="valor_plano" class=" real form-control" placeholder="R$ valor do plano">   </td>

</tr>
<tr>

</tr>
</tbody>
</table>
<!-- END Orders Content -->
</div>
<!-- END Orders Block -->


<div class="col-lg-12">
<!-- Orders Block -->
<div class="block">
<!-- Orders Title -->
<div class="block-title text-center ">
<div class="block-options pull-right">

</div>
<h2><i class="fa fa-file"></i> <strong>Descrição do Serviço</strong></h2>
</div>
<!-- END Orders Title -->

<!-- Orders Content -->
<table class="table table-bordered table-striped table-vcenter">
<tbody>
<tr>
<td class="text-center" style="width: 50%;"><strong>CNAE</strong></td>

<td style="color: blue" class="text-center" style="width: 100%;">  <select id="nome_cnae" name="nome_cnae" class="form-control" size="1">
<option value="" selected>Selecione</option>
<?php
foreach ($ListarCnae->result()  as $row) 
{
echo '<option  value="' . $row->id. '">' . $row->nome_cnae . '  '. $row->numero_cnae . '</option>'; 
} 
?>
</select>    </td>


</tr>
<tr>

<td class="text-center" style="width: 50%;"><strong>Descrição do Serviço</strong></td>

<td style="color: blue;" class="text-center" style="width: 100%;"> <textarea id="descricao_servicos" name="descricao_servicos" class="ckeditor" style="width: 778px; height: 174px;  "></textarea>    </td>

</tr>
<tr>



</tr>
<tr>

</tr>
</tbody>
</table>
<!-- END Orders Content -->
</div>
<!-- END Orders Block -->




<div class="block">
<!-- Orders Title -->
<div class="block-title text-center">
<div class="block-options pull-right">

</div>
<h2><i class="fa fa-bitcoin"></i> <strong>Forma de Pagamento</strong></h2>
</div>
<!-- END Orders Title -->

<!-- Orders Content -->
<table class="table table-bordered table-striped table-vcenter">
<tbody>
<tr>
<td class="text-center" style="width: 50%;"><strong>Banco</strong></td>

<td style="color: blue;" class="text-center" style="width: 100%;">  <select id="nome_banco" name="nome_banco" class="form-control" size="1">
<option value="" selected>Selecione</option>
<?php
            foreach ($ListarBanco->result()  as $row) 
            {
                echo '<option  value="' . $row->id. '">' . $row->nome_banco .  '</option>'; 
            } 
        ?>
</select>   </td>



</tr>


<tr>
<td class="text-center" style="width: 50%;"><strong>Juros</strong></td>

<td style="color: blue;" class="text-center" style="width: 100%;">  <input type="text" id="juros_ativo" name="juros_ativo" class="form-control" placeholder="" readonly>   </td>



</tr>


</tr>


<tr>
<td class="text-center" style="width: 50%;"><strong>Mora</strong></td>

<td style="color: blue;" class="text-center" style="width: 100%;">    <input type="text" id="mora" name="mora" class="form-control" placeholder="" readonly>   </td>



</tr>



</tr>


<tr>
<td class="text-center" style="width: 50%;"><strong>Valor do Boleto</strong></td>

<td style="color: blue;" class="text-center" style="width: 100%;">   <input type="text" id="valor_boleto" name="valor_boleto" class="form-control" placeholder="" readonly >   </td>



</tr>




</tbody>
</table>
<!-- END Orders Content -->
</div>
<!-- END Orders Block -->




<div class="block">
<!-- Orders Title -->
<div class="block-title text-center">
<label style="margin-top: 2%;" class="col-md-5 control-label" for="sel_status"> <span class="text-danger">*</span>Menssalidade</label>
<br><br>
<!-- END Step Info -->
<div class="form-group">

<div class="col-md-2" style="margin-top: -10px; float:left; margin-left: -242px;">
<select id="n-parcelas" class="form-control">
<option></option>
<option value="1">1x</option>
<option value="2">2x</option>
<option value="3">3x</option>
<option value="4">4x</option>
<option value="5">5x</option>
<option value="6">6x</option>
<option value="7">7x</option>
<option value="8">8x</option>
<option value="9">9x</option>
<option value="10">10x</option>
<option value="11">11x</option>
<option value="12">12x</option>
</select>
</div>
</div>


<input type="hidden" min="0" id="valor_total" class="total"  value=""/></td>

<input type="hidden" min="0" id="valor_nome"  /></td>

<input type="hidden" min="0" id="valor_tipo" /></td>






<br>

<!-- Invoice Block -->
<div class="block full">
<!-- Invoice Title -->


<!-- Invoice Content -->

<!-- Table -->
<div class="table-responsive">
<table class="table table-vcenter">
<thead>
<tr>

<th class="text-center">Plano</th>
<th class="text-center">Tipo do Plano</th>
<th class="text-center">Data Emissão</th>
<th class="text-center">Data Vencimento</th>
<th class="text-center">Valor</th>


</tr>
</thead>

<tbody id="parcelas">






<tbody>
<tr class="active">

</tr>
<tr class="active">
<td colspan="5" class="text-right"><span  class="h4">Valor Mensal</span></td>
<td class="text-right"><span id="valorMensal" class="h4 valor1 "></span></td>
</tr>
<tr class="active">

<td colspan="5" class="text-right"><span  class="h4">Quantidade Mensal</span></td>
<td class="text-right"><span id="qtdMensal" class="h4"></span></td>

</tr>
<tr class="active">
<td colspan="5" class="text-right"><span class="h3"><strong>TOTAL Geral</strong></span></td>
<td class="text-right"><span id="valorTotal" class="h3"><strong></strong></span></td>
</tr>






</tbody>





</table>

<tr>

<div class="form-group form-actions">
<div class="col-md-9 col-md-offset-3">
<button type="button" id="btnGravar" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Gravar</button>

</div>


</tr>

</form>

</div>
<!-- END Table -->
</div>




<!-- END Customer Content -->
</div>
<!-- END Page Content -->

</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<script>
$(document).ready(function() {
console.log("ready!");

$("#nome_plano").change(function() {
//  var end = this.value;
// var firstDropVal = $('#pick').val();
var valor = $('#nome_plano').val();


$.ajax({

type: "GET",
url: "<?php echo base_url(); ?>/faturamento/listarTipoPlano/" + valor,
dataType: "json",
error: function(errar) {
// alert(errar);
},
success: function(data) {

if (data.length > 0) {

$('#tipo_plano').find('option').remove();
$('#tipo_plano').append(' <option value="" selected>Selecione</option>');

data.forEach(function(item) 
{

$('#tipo_plano').append(`<option value="${item.id}"> 
${item.tipo_planos} 
</option>`);       


}); // fechamento da função de achar o tipo do plano 



}
}
});

});


$("#tipo_plano").change(function() {
//  var end = this.value;
// var firstDropVal = $('#pick').val();
var pesquisa_plano = $('#tipo_plano').val();







$.ajax({


type: "GET",
url: "<?php echo base_url(); ?>/faturamento/ListarValor/" + pesquisa_plano,
dataType: "json",
error: function(errar) {
// alert("errar");
},
success: function(data) {

$('.real').mask('000.000.000.000.000,00', {reverse: true});





if (data.length > 0) {







$('#valor_total').val(data[0].valor);

$('#valor_nome').val($("#nome_plano option:selected").text());

$('#valor_tipo').val($("#tipo_plano option:selected").text());

$('#valor_plano').val(formatMoney(data[0].valor));



}

function formatMoney(n, c, d, t) {
c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}


}

}); // fechamento fa função 




});



$("#nome_banco").change(function() {
//  var end = this.value;
// var firstDropVal = $('#pick').val();


var pesquisa_juros = $('#nome_banco').val();



$.ajax({


type: "GET",
url: "<?php echo base_url(); ?>/faturamento/ListarJurosBanco/" + pesquisa_juros,
dataType: "json",
error: function(errar) {
// alert("errar");
},
success: function(data) {


if (data.length > 0) {


var juros = data[0].juros_ativo;

var juros = juros_ativo.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}); 



$('#juros_ativo').val(formatMoney(data[0].juros_ativo));



$('#mora').val(formatMoney(data[0].mora));



$('#valor_boleto').val(formatMoney(data[0].valor_boleto));




}

function formatMoney(n, c, d, t) {
c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}






}

}); // fechamento fa função 


});




});
</script>


<script>


//Funcao para atualizar as parcelas e seus valores
function atualizaValores(){
// pegando a quantidade de parcelas
var valor=$("#n-parcelas").val();

var valor_plano =$("#valor_total").val();


var valor_nome = $("#nome_plano option:selected").text();

var valor_tipo = $("#valor_tipo").val();




// Obtém a data/hora atual
var data = new Date();

// Guarda cada pedaço em uma variável
var dia     = data.getDate();           // 1-31
var dia_sem = data.getDay();            // 0-6 (zero=domingo)
var mes     = data.getMonth();          // 0-11 (zero=janeiro)
var ano2    = data.getYear();           // 2 dígitos
var ano4    = data.getFullYear();       // 4 dígitos
var hora    = data.getHours();          // 0-23
var min     = data.getMinutes();        // 0-59
var seg     = data.getSeconds();        // 0-59
var mseg    = data.getMilliseconds();   // 0-999
var tz      = data.getTimezoneOffset(); // em minutos

// Formata a data e a hora (note o mês + 1)
var str_data = dia + '/' + (mes+1) + '/' + ano4;
var str_hora = hora + ':' + min + ':' + seg;

// Mostra o resultado






//variavel que recebe os inputs(HTML)
var geraInputs="";





//Calculando o valor de cada parcela
//var valorParcela=parseFloat($(".total").val()*valor_plano).toFixed(2);
var valorParcela=parseFloat($(".total").val());


//gerando os inputs com os valores de cada parcela
 for(var i=0; i<valor;i++){
     

geraInputs+='<tr> <td class="text-center" ><h4>'+valor_nome+'</h4> </td><td class="text-center"><strong><h4>'+valor_tipo+'</h4></strong></td><td class="text-center"><strong>'+str_data+'</strong></td><td class="text-center"><input type="date" id="example-datepicker5" name="example-datepicker5" class="form-control date" placeholder="mm/dd/yy"></td><td class="text-center"><span class="label label-primary valor ">'+valor_plano+'</td></tr> ';



}

// inserindo as parcelas 
  $("#parcelas").html(geraInputs);

   
 
var i;
var valor_plano; 

$('#qtdMensal').text(i);

$('#valorMensal').text(valor_plano);




var totalGeral = i * valor_plano;


alert(i);

var valorTotal = totalGeral;

var chave = $('#hid_id').val();

alert(chave);



$('#valorTotal').text(formatMoney(valorTotal));

function formatMoney(n, c, d, t) {
c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}



}

$(document).ready(function(e) {
$(".total").on('change keyup keydown keypress',function(){
// ao alterar o valor total, chama a funcao para alterar as parcelas
atualizaValores();


});
$('#condicao-pag').on('change', 'select', function() {
// ao alterar a condicao de pagamento,chama a funcao para alterar as parcelas
atualizaValores();
if($(this).val() == 1){
$('#parcelamento').show();
/*Calcular valor das parcelas (2x, 3x, 4x) e preencher inputs*/
$('#parcelas').show();
}
else{
$('#parcelamento').hide();
$('#parcelas').hide();
 var gerar = $("input[name='parcela[]']").val('');
}
})

$('#n-parcelas').on('change', function() {
/*Calcular valor das parcelas (2x, 3x, 4x) e preencher inputs*/
//Ao alterar a quantidade e parcelas chama a funcao para alterar as parcelas
atualizaValores();




 
});



function formatMoney(n, c, d, t) {
c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}



});


function Gravar()
{


var dados = 
{


id_empresa :$("#hid_id").val(),
plano :$("#valor_nome").val(),
tipo_plano :$("#valor_tipo").val(),
//valor_plano :$("#valor_plano").val(),
//cnae :$("#nome_cnae").val(),
//descricao_servicos :$("#descricao_servicos").val(),
//juros :$("#juros_ativo").val(),
//mora :$("#mora").val(),
//qtd_parcelas :$("#qta").val()



};

$.ajax({

type: "POST",
url: "<?php echo base_url(); ?>faturamento/store",
dataType: "json",
data: dados,
error: function(errar){
alert (errar); 
},

success : function (data){

if(!data_status){
ShowMensagem("erro", "Problema para gravar os dados !");
}else if(data.data_status){
window.location.href ="<?php echo base_url (); ?>Faturamento"; 

}

} 



})




}     


$(document).ready(function()

{
$("#btnGravar").click(function()
{
Gravar();



});











});









</script>





