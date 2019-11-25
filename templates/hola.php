<?php 

echo "hola mano";

$mail = '<style>
                                @import url("https://fonts.googleapis.com/css?family=Oswald"); </style>
        <div style="font-family:oswald; padding:5%; border: solid 3px navy; border-radius:10px;">
        <p>Hemos recibido una cotización por los siguientes Productos:</p>
        <div style="font-family:oswald; padding:5%; border: solid 3px navy; border-radius:10px;">
        <p>Hemos recibido una cotización por los siguientes Productos:</p>';
                    $mail .= '<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align:left; border: 1px solid #eee;"> Producto </th>
                                        <th scope="col" style="text-align:left; border: 1px solid #eee;"> Cantidad </th>
                                    </tr>
                                </thead>
                                <tbody>';
                                
                        foreach( $args['raq_content'] as $item ):
                            if( isset( $item['variation_id']) ){
                                $_product = wc_get_product( $item['variation_id'] );
                            }else{
                                $_product = wc_get_product( $item['product_id'] );
                            }
    
                            $mail .= '<tr><td scope="col" style="text-align:left;"><a href="';
                            $mail .= get_edit_post_link($_product->get_id());
                            $mail .='">';
                            $mail .=$_product->get_title().'</a>';
                            if( isset($item['variations'])):
                                $mail .='<small>'.yith_ywraq_get_product_meta($item).'</small>'; 
                            endif; 
                            $mail .='</td>';
                            $mail .= '<td scope="col" style="text-align:left;">'.$item['quantity'].'</td></tr>';
                        endforeach;
                     $mail .= '</tbody>';
                     $mail .= '</table>';
                     $mail.= '<p>Uno de nuestros ejecutivos se contactará con usted a la brevedad.</p>
                    			<p>
                    				<b>Formas de Pago:</b><br>
                    			</p><ul>
                    					<li>Efectivo o Transferencias Bancarias.</li>
                    					<li>Tarjetas de Crédito (en nuestra oficina)</li>
                    					<li>Depósito en (En cta. cte. de la empresa)</li>
                    					<li>Pague vía internet a través de webpay</li>
                    					<li>Se aceptan cheques, Previa evaluacion comercial.</li>
                    				</ul>
                    			<p></p>
                    			<p>
                    				<b>Enviamos a todo Chile:</b><br>
                    				Enviamos a todo Chile a través de Turbus Cargo y pulman bus. Costo por parte del comprador o enviamos por pagar.<br>
                    				<b>Calcule el envío de sus productos</b>&nbsp; <a href="https://www.starken.cl/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.starken.cl/&amp;source=gmail&amp;ust=1574439510290000&amp;usg=AFQjCNGBKZNcjgvflP0apWTNqa1sOpQ-3w">Aquí</a>  (Valor Referencial)	
                    			</p>
                    			<p>
                    				<b>Información de Nuestra Empresa:</b><br>
                    				</p><ul>
                    					<li><b>Rut:</b>&nbsp;76.517.901-7</li>
                    					<li><b>Giro:</b>&nbsp;Venta de Maquinas</li>
                    					<li><b>Pagina web: </b><a href="http://www.bitmaq.cl" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.bitmaq.cl&amp;source=gmail&amp;ust=1574439510290000&amp;usg=AFQjCNFSnW9ci2WFE7WK9Ok4ynyeDiFbHQ">www.bitmaq.cl</a></li>
                    					<li><b>Dirección:</b>&nbsp;Chacabuco 615, Santiago Centro, <img src="https://ci6.googleusercontent.com/proxy/vwv1pymfWYruhXnGk0NxgxIvY_Iov56y37KTuTUApTbSTk7MnmPB5CiwRPu0wk4u-nFFNrbMEJUDQx8B=s0-d-e1-ft#http://www.bitmaq.cl/images/metro_24p.png" class="CToWUd">Metro Quinta Normal </li>
                    					<li><b>Contáctenos:</b>&nbsp;<a href="mailto:Contacto@bitmaq.cl" target="_blank">Contacto@bitmaq.<wbr>cl</a> o  +56 9 9484 7775 - +56 2 2682 3284. - +56 2 2682 7402. </li>
                    					</ul>
                    			<p></p>
                    			<div align="center"><img src="https://ci6.googleusercontent.com/proxy/TMioQlzrX4vm4AhTgtwJeo5WXDn_Y8URBBzr1khnP0Acf0EES1IQXLv732PiJwnbUwQTkGbTLw=s0-d-e1-ft#http://www.bitmaq.cl/images/logo.jpg" class="CToWUd"></div><div class="yj6qo"></div><div class="adL">
                    		</div></div></div>';
    echo $mail;
?>