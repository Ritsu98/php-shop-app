{extends file="main.html"}
{block name=content}
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{$item['name']}</h1>
                    <div class="fs-5 mb-5">
{*                        <span class="text-decoration-line-through"></span>*}
                        <span>{$item['prize']} zł</span>
                    </div>
                    <p class="lead">{$item['description']}</p>
                    <div class="d-flex">
                        <form action="{$conf->action_url}addToCart/{$id}" method="post">
                            <input  name ="item_name"  value={$item['name']} hidden />
                            <input  name ="price"  value={$item['prize']} hidden />
                            <input class="form-control text-center me-3" id="inputQuantity" name ="quantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
{/block}
