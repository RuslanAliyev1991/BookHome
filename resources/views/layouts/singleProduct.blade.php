@auth
<div style="display: none;" class="getSingleProduct">
    <div class="singleBook d-flex align-items-center">
        <div class="ring-in k">
            <a href="single.html"><img src="" class="img-responsive singleImage" style="width: 70px; height: 100px;"></a>
        </div>
        <div class="close1">
            <input class="product_single" type="hidden" value="">
        </div>
            <div class="k"><span class="name"></span></div>
            <div class="d-flex align-items-center k">
                <form class="d-flex align-items-center" style="margin: 0px;" method="get">
                    @csrf
                    <input data-product-id="" type="button" value="-" class="minus minusUpdate">
                    <input type="text" data-product-id="" name="quantity" value="" class="input-text qty text quantityUpdate" size="2">
                    <input type="button" data-product-id="" value="+" class="plus plusUpdate">
                </form>  
            </div>
            <div class="k"><span id="priceCart"></span></div>
        <div class="clearfix"> </div>
    </div>

    <div class="getProduct">
        <h2 class="text-center mt-1 mb-5">Get Product</h2>
        <div class="d-flex align-items-center justify-content-around">
            <div class="d-flex align-items-center">
                <label class="col-form-label">FullName:</label>
                <input type="text" value="" class="form-control ml-1">
            </div>
            <div class="d-flex align-items-center ml-2">
                <label class="col-form-label">Phone:</label>
                <input type="text" value="" class="form-control ml-1">
            </div>
            <div class="d-flex align-items-center">
                <label class="col-form-label">Email:</label>
                <input type="email" value="" class="form-control ml-1">
            </div>
        </div>
        <div>
            <div class="d-flex align-items-center mt-5" style="margin-left: 435px;"> 
                <button class="getBook" type="button" class="form-control" style="width:38%;">Get Book</button>
            </div>
        </div>
    </div>
</div>

@endauth
