<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>前台</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.useso.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Crete+Round' rel='stylesheet' type='text/css'><link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="css/jquery.fancybox.css" rel="stylesheet">
<link href="css/cloud-zoom.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.html">
</head>
<body>
<!-- Header Start -->
<header>
  <div class="headerstrip">
    <div class="container">
      <div class="row">
        <div class="span12">
          <!--<a href="#" class="logo pull-left"><img src="img/logo.png" alt="SimpleOne" title="菜篮子"></a>-->
        </div>
         
      </div>
    </div>
  </div>
  <div class="container">
    <div class="headerdetails">
      
      <div class="pull-right">
        <ul class="nav topcart pull-left">
          <!--<li class="dropdown hover carticon ">
            <a href="#" class="dropdown-toggle" > Shopping Cart <span class="label label-orange font14">1 item(s)</span> - $589.50 <b class="caret"></b></a>
            <ul class="dropdown-menu topcartopen ">
              <li>
                <table>
                  <tbody>
                    <tr>
                      <td class="image"><a href="product.html"><img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product"></a></td>
                      <td class="name"><a href="product.html">MacBook</a></td>
                      <td class="quantity">x&nbsp;1</td>
                      <td class="total">$589.50</td>
                      <td class="remove"><i class="icon-remove"></i></td>
                    </tr>
                    <tr>
                      <td class="image"><a href="product.html"><img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product"></a></td>
                      <td class="name"><a href="product.html">MacBook</a></td>
                      <td class="quantity">x&nbsp;1</td>
                      <td class="total">$589.50</td>
                      <td class="remove"><i class="icon-remove "></i></td>
                    </tr>
                  </tbody>
                </table>
                <table>
                  <tbody>
                    <tr>
                      <td class="textright"><b>Sub-Total:</b></td>
                      <td class="textright">$500.00</td>
                    </tr>
                    <tr>
                      <td class="textright"><b>Eco Tax (-2.00):</b></td>
                      <td class="textright">$2.00</td>
                    </tr>
                    <tr>
                      <td class="textright"><b>VAT (17.5%):</b></td>
                      <td class="textright">$87.50</td>
                    </tr>
                    <tr>
                      <td class="textright"><b>Total:</b></td>
                      <td class="textright">$589.50</td>
                    </tr>
                  </tbody>
                </table>
                <div class="well pull-right buttonwrap">
                  <a class="btn btn-orange" href="#">View Cart</a>
                  <a class="btn btn-orange" href="#">Checkout</a>
                </div>
              </li>
            </ul>
          </li>-->
        </ul>
      </div>
    </div>
    
</header>
<!-- Header End -->

<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <h1 class="heading1" align="center"><a href="video.html" class="maintext">厨房实时展示</a>
      <h1 class="heading1"><span class="maintext"> 菜单</span>
          <div class="pull-right">
              <div class="input-group">
                  <span class="maintext"> 桌号:</span>
                  <input id="desknum" type="text" class="span1" pattern="[0-9]{1,3}" title="只能是数字!" value="0">
              </div>
          </div>
      </h1>
      
      <!-- Cart-->
      <div class="cart-info">
        <table id="menuTable" class="table table-striped table-bordered">
          <tr>
            <th class="image">图片</th>
            <th class="name">菜名</th>
            <th class="model">类型</th>
            <th class="model">描述</th>
            <th class="price">单价</th>
            <th class="quantity">数量</th>
           
          </tr>
          <?php 
              include_once('conn/conn.php');
              $selects=mysql_query("select * from tadayMenu",$conn);
              while($array=mysql_fetch_array($selects)){
          ?>
          <tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="<?php echo $array['image'];?>" height="50" width="50"></a></td>
            <td  class="name"><?php echo $array['foodName'];?></td>            
            <td class="model"><?php echo $array['foodType'];?></td>
            <td class="model"><?php echo $array['description'];?></td>
            <td class="price "><i id="price_<?php echo $array['foodID'];?>"><?php echo $array['price'];?></i>元</td>
            <td class="quantity">
            		
            		  <div class="input-append input-prepend span1">
                      <span type="button" id="addButton_<?php echo $array['foodID'];?>" onclick="addClick('<?php echo $array['foodID'];?>');" class="add-on btn">+</span>
                        <input readonly="readonly" value="0" id="quantityNum_<?php echo $array['foodID'];?>" name="quantityNum_<?php echo $array['foodID'];?>" class="span1" type="text" />
                       <span type="button" id="reductionButton_<?php echo $array['foodID'];?>" onclick="reductionClick('<?php echo $array['foodID'];?>');" class="add-on btn">-</span>
                </div>
            
           <!-- <input type="text" size="1" readonly="readonly" value="1" name="quantity[40]" class="span1">-->
             
             </td>
             <!--<td class="total"> <a href="#"><img class="tooltip-test" data-original-title="Update" src="img/update.png" alt=""></a>
              <a href="#"><img class="tooltip-test" data-original-title="Remove"  src="img/remove.png" alt=""></a></td>-->
            
             
             
          </tr>
          
          
       <?php 
              }
            ?>
          
        </table>
      </div>
     
       


      <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
        <!--      <tr>
                <td><span class="extra bold">Sub-Total :</span></td>
                <td><span class="bold">$101.0</span></td>
              </tr>
              <tr>
                <td><span class="extra bold">Eco Tax (-5.00) :</span></td>
                <td><span class="bold">$11.0</span></td>
              </tr>
              <tr>
                <td><span class="extra bold">VAT (18.2%) :</span></td>
                <td><span class="bold">$21.0</span></td>
              </tr>-->
              <tr>
                <td><span class="extra bold totalamout">总价 :</span></td>
                <td><span id="allPrice" class="bold totalamout" >0</span><i class="bold totalamout">元</i></td>
              </tr>
            </table>
            <input id="submit" type="submit" onclick="checkCart()" value="提交" class="btn btn-orange pull-right">
            <!--<input type="submit" value="取消" class="btn btn-orange pull-right mr10">-->
          </div>
        </div>
        </div>
    </div>
  </section>
</div>


<!-- Footer -->
<footer id="footer">
 
  <section class="copyrightbottom">
    <div class="container">
      <div class="row">
        
        <div class="span6 textright"> &copy; 2015 by sunrise laboratory </div>
      </div>
    </div>
  </section>
</footer>




<script>
function checkCart()
{ 
  var desknum = document.getElementById("desknum");
  if(desknum.value<=0)
    {alert("请填写桌号！(桌号大于0)");
    return false;}

  var table =document.getElementById("menuTable");
  var rows = table.rows.length -1;
  var data={};
  while(rows>0)
  {
    var numValue =document.getElementById("quantityNum_"+rows);
    data[rows-1]=numValue.value;
    rows = rows-1;
  }
  data["桌号"]= (document.getElementById("desknum")).value;
  var tempAllprice = Number((document.getElementById("allPrice")).innerHTML);
  data["总价"]= tempAllprice;
  data["菜数"]=table.rows.length -1;
  alert(data["桌号"]+data["总价"]);


  $.post("success.php",data,function(){
    alert("恭喜您下单成功！");
    location.reload();
  });

  }
  </script>


<script>
function addClick(name)
{ 
  var allName = "quantityNum_"+name;
  var num = document.getElementById(allName);
  var temp = parseInt(num.value);
  num.value = temp+1;

  refreshTotalAdd(name);
  }
  </script>




<script>
  
function refreshTotalAdd(name)
{ 
  var allName = "price_"+name;
  var price = document.getElementById(allName);
  var priceFloat=Number(price.innerHTML);
  var allPrice = document.getElementById("allPrice");
  var allPriceFloat=Number(allPrice.innerHTML);
  allPrice.innerHTML=allPriceFloat+priceFloat;
  //alert(priceFloat);
}
</script>




<script>
function reductionClick(name)
{ 
  var allName = "quantityNum_"+name;
  var num = document.getElementById(allName);
   if(num.value==0)
    {return;}
    num.value -= 1;
    refreshTotalRedu(name);
  }
</script>




<script>
function refreshTotalRedu(name)
{ 
  var allPrice = document.getElementById("allPrice");
  var allPriceFloat=Number(allPrice.innerHTML);
  if(allPriceFloat==0)
    {return;}
  var allName = "price_"+name;
  var price = document.getElementById(allName);
  var priceFloat=Number(price.innerHTML);
  allPrice.innerHTML=allPriceFloat-priceFloat;
  }
</script>





<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/application.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script defer src="js/jquery.fancybox.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/jquery.tweet.js"></script>
<script  src="js/cloud-zoom.1.0.2.js"></script>
<script  type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript"  src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script type="text/javascript"  src="js/jquery.mousewheel.min.js"></script>
<script type="text/javascript"  src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript"  src="js/jquery.ba-throttle-debounce.min.js"></script>
<script defer src="js/custom.js"></script>
</body>
</html>