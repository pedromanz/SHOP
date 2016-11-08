
         <div class="portfolio-modal modal fade" id="<?php echo $valor2->getReferencia();?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2><?php echo $valor2->getNombre();?></h2>
                                <p class="item-intro text-muted"></p>
                                <img class="img-responsive img-centered" src="<?php echo"../img/productos/" .$valor2->getReferencia().".jpg";?>" alt="">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <p>
                                    <strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">RoundIcons.com</a>, or you can purchase the 1500 icon set <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">here</a>.</p>
                                <ul class="list-inline">
                                    <li>Date: July 2014</li>
                                    <li>Client: Round Icons</li>
                                    <li>Category: Graphic Design</li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                <form method="post" action="">
  <fieldset>
    <input type="hidden" name="my-item-id" value="<?php echo $valor2->getReferencia();?>" />
    <input type="hidden" name="my-item-name" value="<?php echo $valor2->getNombre();?>" />
    <input type="hidden" name="my-item-price" value="<?php echo $valor2->getPrecio();?>" />
    <input type="hidden" name="my-item-url" value="#" />

    <ul>
      <li><strong><?php echo $valor2->getNombre();?></strong></li>
      <li>Precio: <?php echo $valor2->getNombre();?></li>
      <li>
        <label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
      </li>
    </ul>

    <input type="submit" name="my-add-button" value="añadir al carrito" class="button" />
  </fieldset>
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
