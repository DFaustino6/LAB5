<?php

include 'db.php';

// put full path to Smarty.class.php
require('libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->cache_dir = 'cache';
$smarty->config_dir = 'configs';


// ligação à base de dados
//$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
/*if($db) {
  // criar query numa string
   $query  = "SELECT microposts.content, microposts.created_at, microposts.updated_at, users.name, microposts.upvotes,microposts.downvotes
             FROM microposts, users
             WHERE microposts.user_id = users.id
             ORDER BY microposts.created_at DESC";*/
 
  // executar a query
 /* if(!($result = @ mysql_query($query,$db )))
   showerror();*/



  // vai buscar o resultado da query

 /* $nrows  = mysql_num_rows($result);
   for($i=0; $i<$nrows; $i++)
     $tuple[$i] = mysql_fetch_array($result,MYSQL_ASSOC);*/
  foreach ($variable as $key => $value) {
       # code...
  }

                    /*---->Error Type&Message>---*/
 switch ($ECode) {
    case 0:
        //Erro resolvido pelo HTML
        $ErrorMsg = "Todos os campos devem ser preenchidos";
        $ErrorType = 0;
        break;
    case 1:
        $ErrorMsg = "Email já existe na base de dados";
        $ErrorType = 1;
        break;
      //Erro resolvido pelo HTML
    case 2:
        $ErrorMsg = "Email tem formato incorrecto";
        $ErrorType = 2;
        break;
    case 3:
        //Erro resolvido pelo HTML
        $ErrorMsg = "Password em branco";
        $ErrorType = 3;
        break;
    case 4:
        $ErrorMsg = "Passwords não coincidem";
        $ErrorType = 4;
        break;
  }

  // faz a atribuição das variáveis do template smarty
  //$smarty->assign('posts',$tuple);
  $smarty->assign('MENU1',"SubForum1");
  $smarty->assign('MENU2',"SubForum2");
  $smarty->assign('MENU3',"SubForum3");
  $smarty->assign('FORUMName',"DAW Lab");
  $smarty->assign('MENU4',"Login");
  $smarty->assign('MENU5',"Register");
  $smarty->assign('Username',$Username);
  $smarty->assign('Email',$Email);
  $smarty->assign('Pwd',$Pwd);
  $smarty->assign('ConfPwd',$ConfPwd);
  $smarty->assign('ErrorMsg',$ErrorMsg);
  $smarty->assign('ErrorType',$ErrorType);
 
  // Mostra a tabela
  $smarty->display('register_template.tpl');

  // fechar a ligação à base de dados
  //mysql_close($db);
 // end if
?>