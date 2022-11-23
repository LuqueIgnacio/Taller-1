<h2>Registro de consultas</h3>

        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Mensaje</th>
                    <th>Realizado el</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
            <?php
                    foreach($consultas as $consulta):
                ?>
                    <tr>
                        <td><?php echo $consulta->Consulta_Email?></td>
                        <td class="consulta"><?php echo $consulta->Consulta_Mensaje?></td>
                        <td><?php echo $consulta->created_at?></td>
                        <td>
                            <a onclick="return confirmar(event, 4)" href="<?php echo base_url("/admin/consultas/eliminar?id=$consulta->Consulta_Id")?>" class="btn btn-rojo">Marcar Leído</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>

        </table>
        
    </div>
</main>