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
                    <form action="search_result.php" method="get" class="form form-group">
                        <h4><span class="glyphicon glyphicon-search"></span> Search for Properties </h4>
                        <input type="text" class="form-control" name="search" placeholder="Search by Name/Address">
                        <div class="row">
                            <div class="col-lg-5">
                                <select class="form-control">
                                    <option>Buy</option>
                                    <option>Rent</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <select class="form-control">
                                <option>Property Type</option>
                                <option>Apartment</option>
                                <option>Building</option>
                                <option>Office Space</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary">Find Now</button>
                    </form>
                </div>
                <div class="hot-properties hidden-xs">
                    <h4>Hot Properties</h4>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="../resources/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property_detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="../resources/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property_detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="../resources/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property_detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="../resources/images/properties/1.jpg" class="img-responsive img-circle" alt="properties"></div>
                            <div class="col-lg-8 col-sm-7">
                            <h5><a href="property_detail.php">Integer sed porta quam</a></h5>
                            <p class="price">$300,000</p> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-left result">Showing: 12 of 100 </div>
                    <div class="pull-right">
                        <select class="form-control">
                            <option>Sort by</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- properties -->
                    <?php
                        require_once ('../vendor/autoload.php');
                        use App\Classes\RealEstate\RealEstate;
                        $real_estate = new RealEstate();
                        $all_data = $real_estate->viewAllData();
                        foreach($all_data as $single_data){
                            $image = explode(",", $single_data->images);
                        ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="properties">
                                    <div class="image-holder"><img src="../resources/images/properties/<?=$image[0]?>" class="img-responsive" alt="properties">
                                        <?php if($single_data->status == 0): ?>
                                            <div class="status new">New</div>
                                        <?php else: ?>
                                            <div class="status sold">Sold</div>
                                        <?php endif; ?>
                                    </div>
                                    <h4><a href="property_detail.php?id=<?=$single_data->id?>"><?=$single_data->name?></a></h4>
                                    <p class="price">Price: <?=$single_data->monthly_charge?></p>
                                    <div class="listing-detail">
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?=$single_data->bed_room?></span> 
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?=$single_data->living_room?></span> 
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?=$single_data->parking?></span> 
                                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?=$single_data->kitchen?></span> 
                                    </div>
                                    <a class="btn btn-primary" href="property_detail.php?id=<?=$single_data->id?>">View Details</a>
                                </div>
                            </div>
                        <?php }   ?>
                    <ul class="pagination">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include'footer.php';?>