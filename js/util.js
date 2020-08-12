function formatarDataUsaBr(data_usa)
{
  //alert(data_usa);

  
  if(data_usa != null)
  {

  var data = data_usa.split("-");  

  return data[2] + '/' + data[1] + '/' + data[0];
  }

  return "";
}



function formatarDataHora(data_usa)
{
  //alert(data_usa);

  
  if(data_usa != null)
  {

  var data = data_usa.split("-");  

  return data[1] + '/' + data[1] + '/' + data[0];
  }

  return "";
}




