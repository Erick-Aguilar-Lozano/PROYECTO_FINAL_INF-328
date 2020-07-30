<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
                <div class='col-md-12 right_col'>
                    <div id='information'></div>
                    <table class='table table-bordered table-responsive' id='tableEditoriales'>
                        <thead>
                            <tr>
                                <th scope='col'></th>
                                <th scope='col'>Id</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($editoriales as $editorial):?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $editorial['id'];?></td>
                                    <td><?php echo $editorial['nombre'];?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>editoriales/edit?id=<?php echo $editorial['id'];?>" class="button">Editar<a/>

                                        <a href="<?php echo base_url();?>editoriales/delete?id=<?php echo $editorial['id'];?>" class="button">Eliminar<a/>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>