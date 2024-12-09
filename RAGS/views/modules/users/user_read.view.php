<main class="content">
				<div class="container-fluid p-0">

        <h1>Consultar Roles</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Nombre Rol</th>
                    <th scope="col">Tipo de vehiculo</th>
                    <th scope="col">Tipo de computador</th>
                    <th scope="col text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                      <th scope="row"><?php echo $usuario->getCodigoUser(); ?></th>
                      <th scope="row"><?php echo $usuario->getNombreUser(); ?></th>
                      
                      <th scope="row"><?php echo $usuario->getLastNameUser(); ?></th>
                      <th scope="row"><?php echo $usuario->getCedulaUser(); ?></th>
                      <th scope="row"><?php echo $usuario->getCorreoUser(); ?></th>
                      <!-- <th scope="row"><//?php echo $usuario->getRolName(); ?></th> -->
                      <th scope="row"><?php echo $usuario->getCorreoUser(); ?></th>
                      <th scope="row"><?php echo $usuario->getCorreoUser(); ?></th>
                      <th scope="row"><?php echo $usuario->getCorreoUser(); ?></th>

                      <td class="">
                        <a href="?c=Users&a=rolUpdate&idRol=<?php echo $usuario->getRolCode(); ?>" class="editar">Editar
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="?c=Users&a=rolDelete&idRol=<?php echo $usuario->getRolCode(); ?>" class="eliminar">Eliminar
                          <i class="fa-solid fa-trash-can"></i>
                        </a>
                      </td>
                    </tr>

                  <?php endforeach; ?>
                </tbody>
              </table>
       
				</div>
			</main>         
 
 
 
 
 
 
 