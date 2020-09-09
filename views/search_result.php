<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
    <div class="container"> 
        <span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>
        <h2>Buy, Sale & Rent</h2>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <div class="col-lg-3 col-sm-4 ">
                <div class="search-form">
                    <h4><span class="glyphicon glyphicon-search"></span> Search of Properties</h4>
                    <form action="search-result.php" method="get" class="form form-group">
                        <input type="text" class="form-control" name="search" placeholder="Search by Name/Address">
                        <button class="btn btn-primary">Find Now</button>
                    </form>
                </div>
                <div class="hot-properties hidden-xs"></div>
            </div>
            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-left result"></div>
                </div>
                <div class="row">
                    <?php
                    require_once ('../vendor/autoload.php');
                    use App\Classes\RealEstate\RealEstate;
                    $real_estate = new RealEstate();
                    if(isset($_REQUEST['search'])){
                        $all_data = $real_estate->viewAllData();
                        if(isset($_REQUEST['search']) )$all_data = $real_estate->search($_REQUEST);
                        $available_keywords=$real_estate->getAllKeywords();
                        $comma_separated_keywords= '"'.implode('","', $available_keywords).'"';
                        if(isset($_REQUEST['search']) ) {
                            $some_data = $real_estate->search($_REQUEST);
                            $serial = 1;
                        }
                    if(count($some_data) <= 0){
                        echo "<br>No Result Found";
                    }
                    foreach ($some_data as $single_data){
                        $image = explode(",",$single_data->images);
                    ?>
                    <div class="col-lg-4 col-sm-6">
                    <div class="properties">
                        <div class="image-holder"><img src="../resources/images/properties/<?php echo $image[0];?>" class="img-responsive" alt="properties">
                        </div>
                        <h4><a href="property-detail.php?id=<?php echo $single_data->id;?>"><?php echo $single_data->name;?></a></h4>
                        <p class="price">Price: $<?php echo $single_data->monthly_charges;?></p>
                        <a class="btn btn-primary" href="property-detail.php?id=<?php echo $single_data->id;?>">View Details</a>
                    </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php';?>