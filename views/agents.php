<?php 
    include'header.php';
    use App\Classes\Agent\Agent;    
?>
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"><a href="#">Home</a> / Agents</span>
        <h2>Agents</h2>
    </div>
</div>
<div class="container">
    <div class="spacer agents">
        <div class="row">
            <div class="col-lg-8  col-lg-offset-2 col-sm-12">
                <?php
                    require_once ('../vendor/autoload.php');
                    $real_estate = new Agent();
                    $all_data = $real_estate->viewAllAgent();
                    foreach($all_data as $single_data){
                ?>
                <div class="row">
                    <div class="col-lg-2 col-sm-2 "><a href="#"><img src="../resources/images/agents/<?=$single_data->agent_image?>" class="img-responsive"  alt="<?=$single_data->agent_name?>"></a></div>
                    <div class="col-lg-7 col-sm-7 "><h4><?=$single_data->agent_name?></h4><p><?=$single_data->agent_about?></p></div>
                    <div class="col-lg-3 col-sm-3 ">
                        <span class="glyphicon glyphicon-envelope"></span> 
                        <a href="mailto:<?=$single_data->agent_email?>"> <?=$single_data->agent_email?></a><br>
                        <span class="glyphicon glyphicon-earphone"></span> <a href="tel:<?=$single_data->agent_phone?>"><?=$single_data->agent_phone?></a><br> 
                        <span class="glyphicon glyphicon-map-marker"></span> <?=$single_data->agent_address?><br>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php';?>