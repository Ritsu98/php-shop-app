{extends file="main.html"}
{block name=content}
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    {foreach $products as $p}
                    {strip}
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><a href="{$conf->action_url}itemView/{$p['product_id']}">{$p["name"]}</a></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
{*                                    <span class="text-muted text-decoration-line-through"></span>*}
                                    {$p["prize"]} zł
                                </div>
                            </div>
                            <!-- Product actions-->
                            <form action="{$conf->action_url}addToCart/{$p['product_id']}" method="post">
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" type="submit">Add to cart</button></div>
                            </div>
                                <input type="text" name="item_name" hidden value="{$p["name"]}">
                                <input type="text" name="price" hidden value="{$p["prize"]}">
                                <input type="text" name="quantity" hidden value=1>
                            </form>
                        </div>
                    </div>
                    {/strip}
                    {/foreach}




                </div>
            </div>
        </section>
{/block}

