<?php
$footer = <<<'EOF'
        <div id="contact">
            <a name="contact"></a>
            <div class="container content" id="contact-container">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10 col-md-offset-0 col-md-6"
                    id="contact-info">
                        <div class="row">
                            <h2 class="col-title">Contato</h2>
                            <div class="row">
                                <div class="col-xs-4 col-md-3">
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <label for="contact-name">
                                                <h4 class="col-title">
                                                    Nome
                                                </h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <input type="text" required 
                                            id="contact-name"></input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <label for="contact-email">
                                                <h4 class="col-title">
                                                    Email
                                                </h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <input type="email" required
                                            id="contact-email"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-offset-1 col-xs-6 
                                            col-md-3" id="msg">
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <label for="contact-message">
                                                <h4 class="col-title">
                                                    Mensagem
                                                </h4>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <textarea 
                                                id="contact-message"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <div class="send-btn">
                                                <span class="send-text">Enviar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-offset-1 col-xs-10 col-md-offset-0 col-md-6"
                    id="footer-info">
                        <div class="row">
                            <div class="col-xs-8 col-sm-4">
                                <h4 class="col-title">Ir para</h4>
                                <ul>
                                    <li><a href="#top">Topo da página</a></li>
                                    <li><a href="#about">Sobre</a></li>
                                    <li><a href="#artists">Artistas</a></li>
                                    <li><a href="#contact">Contato</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-8 col-sm-4">
                                <h4 class="col-title">Promoção</h4>
                                <ul>
                                    <li>
                                        <a class="highslide" 
                                           onclick="return hs.htmlExpand(this,
                                                    { objectType: 'ajax',
                                                    contentId:'highslide-html-8'
                                                    });"
                                            href="assets/html/regulamento.html">
                                            Regulamento
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-8 col-sm-4">
                                <h4 class="col-title">Organizadores</h4>
                                <ul>
                                    <li>
                                    <a href="https://www.facebook.com/festariome?fref=ts">
                                            Rio Me</a>
                                    </li>
                                    <li><a href="http://www.casa20.com/">Casa 20</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr></hr>
                    <div class="row">
                        <div class="col-xs-offset-2 col-xs-8 col-sm-offset-0">
                            <span id="copyright">
                                Copyright 2015 - Rio Me e Casa 20 - Todos os direitos 
                                reservados.
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- closes the contact div -->
EOF;

echo $footer;
?>
