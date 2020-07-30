package com.umsa.repoDoc4.repoDoc4.repository;

import com.umsa.repoDoc4.repoDoc4.model.Usuarios;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.data.web.SpringDataWebProperties;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import java.awt.print.Pageable;
import java.util.List;

@Repository
public class UsuariosRepository implements UsuariosRep{
    @Autowired
    private JdbcTemplate jdbcTemplate;

    @Override
    public boolean insert(Usuarios object) {
        try{
            String sql = String.format(
                    "INSERT INTO usuarios(nombre, login, pass, correo, telefono, perfil) " +
                    "VALUES ('%s','%s','%s','%s','%s','%s');",
                    object.getNombre(), object.getLogin(), object.getPass(), object.getCorreo(),
                    object.getTelefono(), object.getPerfil());
            jdbcTemplate.execute(sql);
            return true;
        } catch (Exception e){
            return false;
        }
    }

    @Override
    public boolean update(Usuarios object) {
        if (object.getId() != 0){
            try{
                String sql = String.format(
                        "UPDATE usuarios SET nombre='%s',login='%s',pass='%s',correo='%s',telefono='%s',perfil='%s' " +
                        "WHERE id='%d'",
                        object.getNombre(), object.getLogin(), object.getPass(), object.getCorreo(), object.getTelefono(),
                        object.getPerfil(), object.getId());
                jdbcTemplate.execute(sql);
                return true;
            } catch (Exception e){
                return false;
            }
        }
        return false;
    }

    @Override
    public List<Usuarios> findAll(SpringDataWebProperties.Pageable pageable) {
        return jdbcTemplate.query(
                "SELECT * FROM usuarios",
                new com.umsa.repoDoc4.repoDoc4.mapper.UsuariosMapper()
        );
    }

    @Override
    public Usuarios findById(int id) {
        Object[] params = new Object[]{id};
        return jdbcTemplate.queryForObject(
                "SELECT * FROM usuarios",
                params,
                new com.umsa.repoDoc4.repoDoc4.mapper.UsuariosMapper()
        );
    }
}
