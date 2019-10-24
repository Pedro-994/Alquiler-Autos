			<!-- Page header -->
			<div class="full-box page-header">
                @yield('titulo')
                </div>
    
                <div class="container-fluid">
                    <ul class="full-box list-unstyled page-nav-tabs">
                        <li>
                            <a class="active" href="client-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR
                                CLIENTE</a>
                        </li>
                        <li>
                            <a href="client-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
                                CLIENTES</a>
                        </li>
                        <li>
                            <a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
                        </li>
                    </ul>
                </div>

<!-- Content here-->
    <div class="container-fluid">
            <form action="" class="form-neon" autocomplete="off">
                @yield('formulario')
            </form>
        </div>

    </section>
</main>