    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">

      <div class="sidebar-heading">
        <img src="../asset/img/logo.png" alt="" class="logo">
      </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action" id="navUsuario" onclick="navUsuario()" value="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            Usuario
        </a>
        <div class="submenu submenu-personal" style="">
          <ul>
            <li>
              <a href="cuentasBancarias.php" id="cuentasBancarias">Cuentas bancarias</a>
            </li>
            <li>
              <a href="datosUser.php" id="datosUser">Datos de usuario</a>
            </li>
            <!-- <li>
              <a href="identidadUser.php" id="identidadUser">Identidad de usuario</a>
            </li> -->
            <li>
              <a href="walletUser.php" id="walletUser" >Wallet de usuario</a>
            </li>
          </ul>
        </div>

        
        <a href="#" class="list-group-item list-group-item-action" id="navOperaciones" onclick="navOperaciones()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            Operaciones
        </a>
        <div class="submenu submenu-operaciones">
          <ul>
            <li>
              <a href="transPendientes.php" id="transPendientes">Transacciones pendientes</a>
            </li>
            <li>
              <a href="depositosPendientes.php" id="depositosPendientes">Depositos pendientes</a>
            </li>
            <li>
              <a href="aggBanco.php" id="aggBanco">Agregar banco</a>
            </li>
            <li>
              <a href="solicExtracion.php" id="solicExtracion">Solicitudes de extraciónes</a>
            </li>
            <li>
              <a href="changeValores.php" id="changeValores">Cambiar valores</a>
            </li>
          </ul>
        </div>
        <form class="m-auto" action='destroySession.php'>
          <input class="btn-sesion btn-get-started-sesion btn-sm mt-5" type="submit" name="sesionDestroy" value="Cerrar sesión"/>
        </form>
        
      </div>
    </div>
    <!-- /#sidebar-wrapper -->


  