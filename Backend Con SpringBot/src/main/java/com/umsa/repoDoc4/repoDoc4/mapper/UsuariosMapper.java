package com.umsa.repoDoc4.repoDoc4.mapper;

import com.umsa.repoDoc4.repoDoc4.model.Usuarios;
import org.springframework.jdbc.core.RowMapper;

import java.sql.ResultSet;
import java.sql.SQLException;

public class UsuariosMapper implements RowMapper<Usuarios> {

    @Override
    public Usuarios mapRow(ResultSet rs, int i) throws SQLException {
        Usuarios usuarios = new Usuarios();

        usuarios.setId(rs.getInt("id"));
        usuarios.setNombre(rs.getString("nombre"));
        usuarios.setLogin(rs.getString("login"));
        usuarios.setPass(rs.getString("pass"));
        usuarios.setCorreo(rs.getString("correo"));
        usuarios.setTelefono(rs.getString("telefono"));
        usuarios.setPerfil(rs.getString("perfil"));

        return usuarios;
    }
}
