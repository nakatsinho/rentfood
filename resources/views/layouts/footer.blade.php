<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="/"><img src="{{asset('admin/img/logo.png')}}" alt=""></a>
                    </div>
                    <ul>
                        <li>Endereço: Av. de Khongolote, Matola</li>
                        <li>Telefone: +258 825 248 888</li>
                        <li>Email: vendas@rentfood.co.mz</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Navegaçao Rapida</h6>
                    <ul>
                        <li><a href="#">Quem Somos</a></li>
                        <li><a href="#">Sobre Nossa Loja</a></li>
                        <li><a href="#">Loja Segura</a></li>
                        <li><a href="#">Informaçao de Entrega</a></li>
                        <li><a href="#">Politicas de Privacidade</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Nossos Serviços</a></li>
                        <li><a href="#">Projectos</a></li>
                        <li><a href="{{route('contact.index')}}">Contacte-nos</a></li>
                        <li><a href="#">Inovaçao</a></li>
                        <li><a href="#">Testemunhos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Participe da nossa Newsletter</h6>
                    <p>Encontre todas novidades sobre nossas recentes ofertas por E-mail.</p>
                    <form method="POST" action="{{ route('newsletter.store') }}" role="form">
                        @csrf
                        <input type="text" name="email" placeholder="Introduza teu E-mail">
                        <button type="submit" class="site-btn">Subscreva-se</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> Todos Direitos Reservados | Criado & Sustentado por <a href="https://wa.me/+258825248888" target="_blank">Kelton Cumbe.</a>
                        </p>
                    </div>
                    <!-- <div class="footer__copyright__payment"><img src="admin/img/payment-item.png" alt=""></div> -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->